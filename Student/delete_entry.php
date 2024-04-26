<?php
// Check if the bundle ID is set and not empty
if (isset($_POST['bundle_id']) && !empty($_POST['bundle_id'])) {
    include '../database/db_con.php'; // Include your database connection file

    // Sanitize the bundle ID
    $bundleId = mysqli_real_escape_string($link, $_POST['bundle_id']);

    // SQL query to delete the entry with the specified bundle ID
    $sql = "DELETE FROM flashcard_bundles WHERE id = '$bundleId'";

    // Execute the SQL query
    if (mysqli_query($link, $sql)) {
        echo "Entry deleted successfully.";
    } else {
        echo "Error deleting entry: " . mysqli_error($link);
    }

    // Close the database connection
    mysqli_close($link);
} else {
    echo "Invalid bundle ID.";
}
?>
