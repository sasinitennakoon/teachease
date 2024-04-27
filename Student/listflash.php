<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Dashboard</title>
    <!--<link rel="stylesheet" href="../admin/css/dashboard.css"> -->
    
    <link rel="stylesheet" href="./css/general2.css">
    <link rel="stylesheet" href="././css/dashboard.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
   

<?php include 'dropdown2.php'; ?>   
    <a href="scienceflash.php"><button>Go to Dashboard</button></a>
    <div class="content">
    <b>The Flash Card List That Created By You</b>

    <table>
        <thead>
          <tr>
            <th>Bundle Name</th>
            <th>Subject</th>
            <th>Other Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include '../database/db_con.php'; // Include your database connection file

            // Fetch flashcard details from the database
            $sql = "SELECT * FROM scienceflashcrd_bundle where user_id = '$session_id'";
            $result = mysqli_query($link, $sql);


                if ($result && mysqli_num_rows($result) > 0) {
                    // Output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["bundle_name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["subject"]) . "</td>";
                        echo "<td>
                                <button onclick='deleteBundle(\"{$row["id"]}\")'>Delete</button>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No  flashcard bundles found.</td></tr>";
                }

                // Close the database connection
                mysqli_close($link);
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
    </script>

</body>
</html>
