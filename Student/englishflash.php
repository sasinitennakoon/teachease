<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="./css/flash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<?php include 'dropdown2.php'; ?>
    
<a href="Tasks.php"><button>Go to Dashboard</button></a>

<div class="content">
    <h1>Study with Flash Cards&#128516;</h1>

    <br>

    <div class="panel1" id="flashcardPanel">
        <?php
        include '../database/db_con.php'; // Include your database connection file

        // Function to display flashcard bundles
        function displayFlashcards() {
            global $link;
            $userId = $_SESSION['id'];
            $sql = "SELECT b.*, u.username AS creator_name
                    FROM scienceflashcrd_bundle b

                    LEFT JOIN student u ON b.user_id = u.student_id
                   

                  
                    WHERE b.user_id = '$userId'

                    ORDER BY b.created_at DESC
                    LIMIT 4";

            $result = mysqli_query($link, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='card1' onclick=\"redirectToFlashPage(" . $row['id'] . ")\">";
                    echo "<p>" . $row["bundle_name"] . "</p>";
                    if ($row['creator_name'] != null) {
                        echo "<p>Created by " . $row['creator_name'] . "</p>";
                    } else {
                        echo "<p>Created by Unknown User</p>";
                    }
                    echo "<p>" . date("Y-m-d H:i:s", strtotime($row['created_at'])) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No newly added flashcards found.</p>";
            }

            // Close the database connection
            mysqli_close($link);
        }

        displayFlashcards(); // Initially display flashcards
        ?>
    </div>

    <br>
    <br>

    <div class="panel2">
        <div class="card3" onclick="window.location.href='createenglish.php';">
            <img src="./img/8-HhP2gIjmnHbB4FK.png">
            <p>Create Flash Cards</p>
        </div>

        <div class="card3" onclick="window.location.href='englishother.php';">
            <img src="./img/8-Mcv73IvIqSwXbno.png">
            <p>Let's Learn With Others</p>
        </div>

        <div class="card3" onclick="window.location.href='listflash.php';">
            <img src="./img/8-o225juUjxVlOy4l (1).png">
            <p>See What You Created</p>
        </div>
    </div>
</div>

<script>
    function goBack() {
        window.history.back();
    }

    function redirectToFlashPage(bundleId) {
        window.location.href = 'viewflash.php?bundle_id=' + bundleId;
    }

    // Function to refresh the flashcard panel content
    function refreshFlashcards() {
        var panel = document.getElementById('flashcardPanel');
        panel.innerHTML = ''; // Clear existing content
        // Fetch updated flashcard content using AJAX
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                panel.innerHTML = xhr.responseText; // Update panel with new content
            }
        };
        xhr.open('GET', 'refresh_flashcards.php', true); // PHP script to fetch updated flashcards
        xhr.send();
    }

    // Example: Call refreshFlashcards() after creating a new flashcard to update the panel
    // This could be triggered after a successful creation operation
    // e.g., refreshFlashcards() inside the success callback of your AJAX request for creating a new flashcard
</script>

</body>
</html>
