<?php
// Include database connection file
include '../database/db_con.php';

// Check if bundle_id parameter is set in the URL
if (isset($_GET['bundle_id'])) {
    $bundleId = $_GET['bundle_id'];

    // Fetch the bundle details
    $bundleQuery = "SELECT * FROM scienceflashcrd_bundle WHERE id = '$bundleId'";
    $bundleResult = mysqli_query($link, $bundleQuery);

    if ($bundleResult && mysqli_num_rows($bundleResult) > 0) {
        $bundle = mysqli_fetch_assoc($bundleResult);
        $bundleName = htmlspecialchars($bundle["bundle_name"]);
        $subject = htmlspecialchars($bundle["subject"]);

        // Fetch flashcards associated with the bundle
        $flashcardsQuery = "SELECT * FROM scienceflashcrd WHERE bundle_id = '$bundleId'";
        $flashcardsResult = mysqli_query($link, $flashcardsQuery);

        // Display the bundle name and subject
        echo "<h1>Flashcards - $bundleName</h1>";
        echo "<h2>Subject: $subject</h2>";

        // Display flashcards in a list or table
        if ($flashcardsResult && mysqli_num_rows($flashcardsResult) > 0) {
            echo "<ul>";
            while ($flashcard = mysqli_fetch_assoc($flashcardsResult)) {
                $question = htmlspecialchars($flashcard["question"]);
                $answer = htmlspecialchars($flashcard["answer"]);
                echo "<li><strong>Question:</strong> $question<br><strong>Answer:</strong> $answer</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No flashcards found for this bundle.</p>";
        }
    } else {
        echo "<p>Bundle not found.</p>";
    }

    // Close the database connection
    mysqli_close($link);
} else {
    echo "<p>Bundle ID parameter is missing.</p>";
}
?>
