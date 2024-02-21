#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <winsock2.h>

#define PORT 8080
#define BUFFER_SIZE 1024

void handle_client(SOCKET client_socket);

int main() {
    WSADATA wsa;
    SOCKET server_socket, client_socket;
    struct sockaddr_in server_addr, client_addr;
    int addr_len = sizeof(client_addr);

    // Initialize Winsock
    if (WSAStartup(MAKEWORD(2, 2), &wsa) != 0) {
        perror("Error initializing Winsock");
        exit(EXIT_FAILURE);
    }

    // Create socket
    server_socket = socket(AF_INET, SOCK_STREAM, 0);
    if (server_socket == INVALID_SOCKET) {
        perror("Error creating socket");
        exit(EXIT_FAILURE);
    }

    // Set up server address
    server_addr.sin_family = AF_INET;
    server_addr.sin_addr.s_addr = INADDR_ANY;
    server_addr.sin_port = htons(PORT);

    // Bind socket to address
    if (bind(server_socket, (struct sockaddr *)&server_addr, sizeof(server_addr)) == SOCKET_ERROR) {
        perror("Error binding");
        exit(EXIT_FAILURE);
    }

    // Listen for incoming connections
    listen(server_socket, 5);
    printf("Server listening on port %d...\n", PORT);

    while (1) {
        // Accept incoming connection
        client_socket = accept(server_socket, (struct sockaddr *)&client_addr, &addr_len);
        if (client_socket == INVALID_SOCKET) {
            perror("Error accepting connection");
            continue;
        }

        // Handle the client
        handle_client(client_socket);
        closesocket(client_socket);
    }

    // Clean up Winsock
    WSACleanup();
    return 0;
}

void handle_client(SOCKET client_socket) {
    char buffer[BUFFER_SIZE];
    memset(buffer, 0, BUFFER_SIZE);

    // Receive request data
    recv(client_socket, buffer, BUFFER_SIZE, 0);
    printf("Received request:\n%s\n", buffer);

    // Extract requested file name (e.g., "GET /index.html HTTP/1.1")
    char *filename = strtok(buffer, " ");
    filename = strtok(NULL, " ");
    filename++; // Remove leading '/'

    // Open requested file
    FILE *file = fopen(filename, "r");
    if (file == NULL) {
        // File not found (404 response)
        char response[] = "HTTP/1.1 404 Not Found\r\n\r\nFile not found.";
        send(client_socket, response, strlen(response), 0);
    } else {
        // File found (200 OK response)
        char response[BUFFER_SIZE];
        snprintf(response, BUFFER_SIZE, "HTTP/1.1 200 OK\r\n\r\n");
        send(client_socket, response, strlen(response), 0);

        // Send file content
        while (fgets(buffer, BUFFER_SIZE, file) != NULL) {
            send(client_socket, buffer, strlen(buffer), 0);
        }
        fclose(file);
    }
}
