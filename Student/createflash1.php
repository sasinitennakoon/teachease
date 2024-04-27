<?php
include '../database/db_con.php';

// Check if the request is a POST request and if the share button was clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["share"])) {
    // Get the flashcard bundle name and data from the POST request
    $bundleName = $_POST["bundleName"];
    $flashcardsData = json_decode($_POST["flashcardsData"], true); // Decode JSON data

    // Establish a database connection (already included via db_con.php)

    // Insert the flashcard bundle into the flashcard_bundles table
    $userId = 1; // Assuming you have a user ID for the user sharing the flashcards
    $subject = $_POST["subject"]; // Get subject from POST data
    $sqlBundle = "INSERT INTO flashcard_bundles (user_id, subject, bundle_name) VALUES ('$userId', '$subject', '$bundleName')";
    
    if (mysqli_query($link, $sqlBundle)) {
        $bundleId = mysqli_insert_id($link); // Get the inserted bundle ID

        // If the flashcard bundle was successfully inserted, insert each flashcard into the flashcards table
        foreach ($flashcardsData as $flashcard) {
            $question = mysqli_real_escape_string($link, $flashcard["question"]);
            $answer = mysqli_real_escape_string($link, $flashcard["answer"]);
            $sqlFlashcard = "INSERT INTO flashcards (bundle_id, question, answer) VALUES ('$bundleId', '$question', '$answer')";
            mysqli_query($link, $sqlFlashcard);
        }
        echo "Flashcards shared successfully!";
    } else {
        echo "Failed to share flashcards. Please try again.";
    }

    // Close the database connection
    mysqli_close($link);
}
?>
