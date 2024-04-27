<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!--<link rel="stylesheet" href="../admin/css/dashboard.css"> -->
    <link rel="stylesheet" href="./css/flash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<?php include 'dropdown2.php'; ?>
    
<a href="Tasks.php"><button>Go to Dashboard</button></a>

<div class="content">
<h1>Study with Flash Cards&#128516;</h1>

<br>

<div class="panel1">
    <!-- Your recent flashcard bundles here -->
</div> 

<h2>Newly Added Flash Cards</h2>

<div class="panel1">
    <?php
        include '../database/db_con.php'; // Include your database connection file

        // Fetch newly added flashcard bundles from the database
        $sql = "SELECT * FROM scienceflashcrd_bundle where user_id='$session_id' ORDER BY id DESC LIMIT 4"; // Assuming you want to display the latest 4 bundles
        $result = mysqli_query($link, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                // Assuming the 'created_date' and 'created_time' columns are in 'Y-m-d' and 'H:i:s' format respectively
                //$created_date = isset($row["created_date"]) ? date("Y-m-d", strtotime($row["created_date"])) : "$session_id";
                //$created_time = isset($row["created_time"]) ? date("H:i:s", strtotime($row["created_time"])) : "$session_id";
                $created_date = $row['created_at'];
                echo "<div class='card1' onclick=\"redirectToFlashPage(" . $row['id'] . ")\">";
                echo "<p>" . $row["subject"] . "</p>";
                echo "<p>Created by you</p>"; // You can customize this based on your user data
                echo "<p>" . $created_date . "</p>"; // Display the formatted date and time
                echo "</div>";
            }
        } else {
            echo "<p>No newly added flashcards found.</p>";
        }

        // Close the database connection
        mysqli_close($link);
    ?>
</div>
<br>
<br>

<div class="panel2">
    <div class="card3" onclick="window.location.href='createscience.php';">
        <img src="./img/8-HhP2gIjmnHbB4FK.png">
        <p>Create Flash Cards</p>
    </div>

    <div class="card3" onclick="window.location.href='sciencelist.php';">
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
</script>

</body>
</html>
