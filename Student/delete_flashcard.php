<?php
    // Include your database connection file
    include '../database/db_con.php';

    // Check if flashcard_id is set in the URL
    if(isset($_GET['flashcard_id'])) {
        $flashcard_id = $_GET['flashcard_id'];

        // Delete the flashcard from the database
        $sql = "DELETE FROM scienceflashcards WHERE id='$flashcard_id'";
        $result = mysqli_query($link, $sql);

        if ($result) {
            echo "<p>Flashcard deleted successfully.</p>";
        } else {
            echo "<p>Error deleting flashcard.</p>";
        }
    } else {
        echo "<p>Flashcard ID not specified.</p>";
    }

    // Close the database connection
    mysqli_close($link);
?>
