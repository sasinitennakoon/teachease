<?php
// Check if the bundle ID is set and not empty
if (isset($_POST['bundleId']) && !empty($_POST['bundleId'])) {
    include '../database/db_con.php'; // Include your database connection file

    // Sanitize the bundle ID
    $bundleId = mysqli_real_escape_string($link, $_POST['bundleId']);

    // Start a transaction to ensure atomicity of database operations
    mysqli_autocommit($link, false);

    // Delete related flashcards in 'scienceflashcrd' table first
    $deleteFlashcardsQuery = "DELETE FROM scienceflashcrd WHERE bundle_id = '$bundleId'";

    if (!mysqli_query($link, $deleteFlashcardsQuery)) {
        mysqli_rollback($link);
        echo "Error deleting related flashcards: " . mysqli_error($link);
        exit;
    }

    // Now delete the bundle from 'scienceflashcrd_bundle' table
    $deleteBundleQuery = "DELETE FROM scienceflashcrd_bundle WHERE id = '$bundleId'";

    if (mysqli_query($link, $deleteBundleQuery)) {
        mysqli_commit($link);
        echo "Flashcard bundle and related flashcards deleted successfully.";
    } else {
        mysqli_rollback($link);
        echo "Error deleting flashcard bundle: " . mysqli_error($link);
    }

    // Close the database connection
    mysqli_close($link);
} else {
    echo "Invalid bundle ID.";
}
?>
