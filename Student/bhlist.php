<?php
// Check if session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include your database connection file
include '../database/db_con.php';

// Check if the user is logged in
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    die("User ID not provided. Please log in."); // Handle the case where user is not logged in
}

$userId = $_SESSION['id']; // Retrieve user ID from session

// Fetch flashcard bundles created by the logged-in user
$sql = "SELECT * FROM scienceflashcrd_bundle WHERE subject = 'Buddhism' AND user_id = '$userId'";
$result = mysqli_query($link, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Science Flashcard Bundles</title>
    <link rel="stylesheet" href="./css/listflash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
   
    <?php include 'dropdown2.php'; ?>
    <button class="dashboard-button" onclick="goBack()">Go to Dashboard</button>

    <div class="content">
        <h1>Science Flashcard Bundles</h1>

        <table id="flashcardTable">
            <thead>
                <tr>
                    <th>Bundle Name</th>
                    <th>Subject</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    // Output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["bundle_name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["subject"]) . "</td>";
                        echo "<td>
                                <button class='view-button' onclick='viewBundle(\"{$row["id"]}\")'>View</button>
                                <button onclick='deleteBundle(\"{$row["id"]}\")'>Delete</button>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No Science flashcard bundles found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }

        function deleteBundle(bundleId) {
            if (confirm("Are you sure you want to delete this flashcard bundle?")) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "delete_entry.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        alert(xhr.responseText);
                        // Reload the page to reflect the changes after deletion
                        location.reload();
                    }
                };
                const params = "bundleId=" + encodeURIComponent(bundleId);
                xhr.send(params);
            }
        }

        function viewBundle(bundleId) {
            // Redirect to the view_bundle.php page with the bundle ID
            if (bundleId) {
                window.location.href = `view_bundle.php?bundle_id=${bundleId}`;
            } else {
                alert("Invalid bundle ID.");
            }
        }
    </script>

</body>
</html>

<?php
// Close the database connection
mysqli_close($link);
?>
