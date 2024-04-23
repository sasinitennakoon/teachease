<?php include '../database/db_con.php'; ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!--<link rel="stylesheet" href="../admin/css/dashboard.css"> -->
    <link rel="stylesheet" href="./css/create.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
   
<?php include 'dropdown2.php'; ?>
    <button onclick="goBack()">Go to Dashboard</button>
    <div class="container">
        <h1>Create Your Flash Cards Here!</h1>
        <div class="panel" id="panel1">
            <h2>Panel 1</h2>
            <button class="create-flashcards-button" onclick="openConfirmationModal()">Create Flash Cards</button>
        </div>
        <div id="flashcardContainer" class="flashcard-container"></div>
        <button class="share-button" id="shareButton" onclick="shareFlashCards()">Share with Others</button>
    </div>

    <!-- Popup modal for confirmation -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <p>How many flash cards do you want to create?</p>
            <input type="number" id="flashCardCount" min="1" value="1">
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

        function openConfirmationModal() {
            document.getElementById("confirmationModal").style.display = "block";
        }
        
        function closeConfirmationModal() {
            document.getElementById("confirmationModal").style.display = "none";
        }

        function confirmCreation() {
            flashCardCount = parseInt(document.getElementById("flashCardCount").value);
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
                `;
                flashcard.addEventListener("click", function() {
                    this.classList.toggle("flipped");
                });
                flashcardContainer.insertBefore(flashcard, flashcardContainer.lastElementChild); // Insert before the plus mark
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

        function shareFlashCards() {
            // Implement the sharing functionality here
            alert("Share with others feature will be implemented soon!");
        }



        function goBack() {
                window.history.back();
            }
    </script>
</body>
</html>
