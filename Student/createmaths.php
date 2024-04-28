<?php
include '../database/db_con.php'; // Include your database connection script

// Check if the request is a POST request and if the share button was clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["share"])) {
    // Get the flashcard bundle name and data from the POST request
    $bundleName = $_POST["bundleName"];
    $flashcardsData = json_decode($_POST["flashcardsData"], true); // Decode JSON data

    // Assuming you have a user ID for the user sharing the flashcards
    $userId = $session_id; // Replace with your actual user ID

    // Insert the flashcard bundle into the scienceflashcrd_bundle table
    $subject = "Mathematics"; // You can customize this
    $sqlBundle = "INSERT INTO scienceflashcrd_bundle (user_id, subject,bundle_name, created_at) VALUES ('$userId', '$subject','$bundleName', NOW())";

    if (mysqli_query($link, $sqlBundle)) {
        $bundleId = mysqli_insert_id($link); // Get the ID of the inserted bundle
        // Insert each flashcard into the scienceflashcrd table
        foreach ($flashcardsData as $flashcard) {
            $question = mysqli_real_escape_string($link, $flashcard["question"]);
            $answer = mysqli_real_escape_string($link, $flashcard["answer"]);
            $sqlFlashcard = "INSERT INTO scienceflashcrd (bundle_id, question, answer, created_at) VALUES ('$bundleId', '$question', '$answer', NOW())";
            if (!mysqli_query($link, $sqlFlashcard)) {
                echo "Error inserting flashcard: " . mysqli_error($link);
                break; // Exit loop on error
            }
        }
        echo "Flashcards shared successfully!";
    } else {
        echo "Error sharing flashcards bundle: " . mysqli_error($link);
    }

    // Close the database connection
    mysqli_close($link);
    exit; // Stop further execution after handling POST request
}

// Additional PHP code can go here for other functionality or page rendering
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="./css/createnew.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Additional CSS styles can be added here */
    </style>
</head>
<body>
   
    <?php include 'dropdown2.php'; ?>
    <button onclick="goBack()">Go to Dashboard</button>
    <div class="container">
        <h1>Create Your Flash Cards Here!</h1>
        <div class="panel" id="panel1">
            <button class="create-flashcards-button" onclick="openConfirmationModal()">Create Flash Cards</button>
        </div>
        <div id="flashcardContainer" class="flashcard-container"></div>
        <button class="share-button" id="shareButton" onclick="shareFlashCards()">Share with Others</button>
    </div>

    <!-- Popup modal for confirmation -->
    <div id="confirmationModal" class="modal" style="display: none;">
        <div class="modal-content">
            <h3>Create Flashcard</h3>
            <div class="modal-section">
                <h4>Your Subject:</h4>
                <input type="text" id="flashCardSubject" value="Mathematics" readonly> <!-- Display the subject as "Science" with readonly attribute -->
            </div>
            <div class="modal-section">
                <h4>Enter the number of flashcards:</h4>
                <input type="number" id="flashCardCount" min="1" value="1">
            </div>
            <div class="modal-section">
                <h4>Enter the name for the flashcard bundle:</h4>
                <input type="text" id="flashCardBundleName" placeholder="Flashcard Bundle Name">
            </div>
            <div class="modal-buttons">
                <button onclick="confirmCreation()">Confirm</button>
                <button onclick="closeConfirmationModal()">Cancel</button>
            </div>
        </div>
    </div>
    
    <!-- Popup modal for table -->
    <div id="tableModal" class="modal" style="display: none;">
        <div class="modal-content">
            <h2 id="flashCardBundleNameDisplay"></h2> <!-- Display the flashcard bundle name here -->
            <h3>Flash Cards Table</h3>
            <table id="flashCardsTable">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Answer</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Table rows will be added dynamically -->
                </tbody>
            </table>
            <div class="modal-buttons">
                <button onclick="createFlashCards()">Create</button>
                <button onclick="closeTableModal()">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        let flashCardCount = 1;
        let flashCardSubject = "Science"; // Set the subject to "Science" by default
        let flashCardBundleName = "";

        function openConfirmationModal() {
            document.getElementById("confirmationModal").style.display = "block";
        }
        
        function closeConfirmationModal() {
            document.getElementById("confirmationModal").style.display = "none";
        }

        function confirmCreation() {
            flashCardCount = parseInt(document.getElementById("flashCardCount").value);
            flashCardBundleName = document.getElementById("flashCardBundleName").value;
            document.getElementById("flashCardBundleNameDisplay").innerText = flashCardBundleName; // Display bundle name
            closeConfirmationModal();
            openTableModal();
        }

        function openTableModal() {
            document.getElementById("tableModal").style.display = "block";
            createTableRows();
        }

        function closeTableModal() {
            document.getElementById("tableModal").style.display = "none";
        }

        function createTableRows() {
            const tbody = document.querySelector("#flashCardsTable tbody");
            tbody.innerHTML = ""; // Clear existing rows
            for (let i = 1; i <= flashCardCount; i++) {
                const row = document.createElement("tr");
                const questionCell = document.createElement("td");
                const answerCell = document.createElement("td");
                const questionInput = document.createElement("input");
                const answerTextarea = document.createElement("textarea");
                questionInput.setAttribute("placeholder", "Question " + i);
                answerTextarea.setAttribute("placeholder", "Answer " + i);
                questionCell.appendChild(questionInput);
                answerCell.appendChild(answerTextarea);
                row.appendChild(questionCell);
                row.appendChild(answerCell);
                tbody.appendChild(row);
            }
        }

        function createFlashCards() {
            // Retrieve the table data and process it as needed
            const tableRows = document.querySelectorAll("#flashCardsTable tbody tr");
            const flashCardsData = [];
            tableRows.forEach(row => {
                const question = row.cells[0].querySelector("input").value;
                const answer = row.cells[1].querySelector("textarea").value;
                flashCardsData.push({ question, answer });
            });

            // Create flashcards based on the data
            const flashcardContainer = document.getElementById("flashcardContainer");
            flashCardsData.forEach(data => {
                const flashcard = document.createElement("div");
                flashcard.classList.add("flashcard");
                flashcard.innerHTML = `
                    <div class="front">
                        <p>${data.question}</p>
                    </div>
                    <div class="back">
                        <p>${data.answer}</p>
                    </div>
                    <button class="delete-button" onclick="deleteFlashCard(this)"></button>
                `;
                flashcard.addEventListener("click", function() {
                    this.classList.toggle("flipped");
                });
                flashcardContainer.insertBefore(flashcard, flashcardContainer.lastElementChild);
                resizeTextToFit(flashcard); // Insert before the plus mark
            });

            // Remove existing plus mark
            const existingPlusMark = document.querySelector(".plus-mark");
            if (existingPlusMark) {
                existingPlusMark.remove();
            }

            // Add plus mark after the last flashcard
            const plusMark = document.createElement("div");
            plusMark.classList.add("plus-mark");
            plusMark.innerHTML = "+";
            plusMark.addEventListener("click", function() {
                openConfirmationModal(); // Open confirmation modal to get flash card count
            });
            flashcardContainer.appendChild(plusMark);

            // Close the table modal
            closeTableModal();

            // Hide panel 1
            document.getElementById("panel1").style.display = "none";
        }

        function deleteFlashCard(button) {
            // Get the parent flashcard element and remove it
            const flashcard = button.parentNode;
            flashcard.remove();
        }

        function shareFlashCards() {
            const flashCardsData = JSON.stringify(getFlashCardsData());
            const flashCardBundleName = document.getElementById("flashCardBundleName").value;
            
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "<?php echo $_SERVER['PHP_SELF']; ?>", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
        if (xhr.status === 200) {
            alert("Flashcards shared successfully!");
        } else {
            alert("Error: " + xhr.status + " - " + xhr.statusText);
        }
    }
};

            const params = "share=true&flashcardsData=" + encodeURIComponent(flashCardsData) + "&bundleName=" + encodeURIComponent(flashCardBundleName);
            xhr.send(params);
        }

        function getFlashCardsData() {
            const tableRows = document.querySelectorAll("#flashCardsTable tbody tr");
            const flashCardsData = [];
            tableRows.forEach(row => {
                const question = row.cells[0].querySelector("input").value;
                const answer = row.cells[1].querySelector("textarea").value;
                flashCardsData.push({ question, answer });
            });
            return flashCardsData;
        }

        function goBack() {
            window.history.back();
        }

        function resizeTextToFit(element) {
            const fontSize = 24; // Initial font size
            const maxHeight = 160; // Max height of the flashcard content area
            let textElement = element.querySelector(".front p");
            let contentHeight = textElement.offsetHeight;
            let scaleFactor = maxHeight / contentHeight;
            let newFontSize = Math.min(fontSize * scaleFactor, fontSize);
            textElement.style.fontSize = newFontSize + "px"; // Corrected concatenation
        }
    </script>
</body>
</html>
