<?php
// Check if the request is a POST request and if the share button was clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["share"])) {
    // Get the flashcard bundle name and data from the POST request
    $bundleName = $_POST["bundleName"];
    $flashcardsData = json_decode($_POST["flashcardsData"], true); // Decode JSON data

    // Establish a database connection
    $link = mysqli_connect("localhost", "root", "", "teachease");
    if (!$link) {
        die("Connection error: " . mysqli_connect_error());
    }

    // Insert the flashcard bundle into the flashcard_bundles table
    $userId = 1; // Assuming you have a user ID for the user sharing the flashcards
    $subject = "Shared Flashcards"; // You can customize this
    $bundleId = insertFlashcardBundle($link, $userId, $subject, $bundleName);

    if ($bundleId) {
        // If the flashcard bundle was successfully inserted, insert each flashcard into the flashcards table
        foreach ($flashcardsData as $flashcard) {
            $question = $flashcard["question"];
            $answer = $flashcard["answer"];
            // Pass the bundleId to the insertFlashcard function
            insertFlashcard($link, $bundleId, $question, $answer);
        }
        echo "Flashcards shared successfully!";
    } else {
        echo "Failed to share flashcards. Please try again.";
    }

    // Close the database connection
    mysqli_close($link);

    // You can add additional error handling or success messages here
}

// Function to insert flashcard bundle into the database
function insertFlashcardBundle($link, $userId, $subject, $bundleName) {
    $userId = mysqli_real_escape_string($link, $userId);
    $subject = mysqli_real_escape_string($link, $subject);
    $bundleName = mysqli_real_escape_string($link, $bundleName);

    $sql = "INSERT INTO flashcard_bundles (user_id, subject, bundle_name) VALUES ('$userId', '$subject', '$bundleName')";
    
    if (mysqli_query($link, $sql)) {
        return mysqli_insert_id($link); // Return the ID of the inserted bundle
    } else {
        return false; // Return false if insertion fails
    }
}

// Function to insert flashcard into the database
function insertFlashcard($link, $bundleId, $question, $answer) {
    $bundleId = mysqli_real_escape_string($link, $bundleId);
    $question = mysqli_real_escape_string($link, $question);
    $answer = mysqli_real_escape_string($link, $answer);

    $sql = "INSERT INTO flashcards (bundle_id, question, answer) VALUES ('$bundleId', '$question', '$answer')";
    
    if (mysqli_query($link, $sql)) {
        return true; // Return true if insertion succeeds
    } else {
        return false; // Return false if insertion fails
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="./css/create.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        
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
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <p>Select the subject and enter the number of flash cards you want to create:</p>
            <select id="flashCardSubject">
                <option value="Math">Science</option>
                <option value="Science">Mathematics</option>
                <option value="History">English</option>
                <option value="History">Sinhala</option>
                <option value="History">Buddhism</option>
                <option value="History">English</option>
                <!-- Add more subjects as needed -->
            </select>
            <input type="number" id="flashCardCount" min="1" value="1">
            <input type="text" id="flashCardBundleName" placeholder="Enter the name for the flashcard bundle">
            <div class="modal-buttons">
                <button onclick="confirmCreation()">Confirm</button>
                <button onclick="closeConfirmationModal()">Cancel</button>
            </div>
        </div>
    </div>

    <!-- Popup modal for table -->
    <div id="tableModal" class="modal">
        <div class="modal-content">
            <h2>Flash Cards Table</h2>
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
        let flashCardSubject = "";
        let flashCardBundleName = "";

        function openConfirmationModal() {
            document.getElementById("confirmationModal").style.display = "block";
        }
        
        function closeConfirmationModal() {
            document.getElementById("confirmationModal").style.display = "none";
        }

        function confirmCreation() {
            flashCardSubject = document.getElementById("flashCardSubject").value;
            flashCardCount = parseInt(document.getElementById("flashCardCount").value);
            flashCardBundleName = document.getElementById("flashCardBundleName").value;
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
                questionInput.setAttribute("placeholder", `Question ${i}`);
                answerTextarea.setAttribute("placeholder", `Answer ${i}`);
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
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert("Flashcards shared successfully!");
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
            textElement.style.fontSize = newFontSize + "px";
        }
    </script>
</body>
</html>
