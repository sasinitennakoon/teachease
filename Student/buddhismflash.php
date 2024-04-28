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
$sql = "SELECT * FROM scienceflashcrd_bundle WHERE subject = 'Science' AND user_id = '$userId'";
$result = mysqli_query($link, $sql);

?>



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
    
    <button onclick="goBack()">Go to Dashboard</button>

    <div class="content">
    <h1>Study with Flash Cards&#128516;</h1>

    <br>
    

    
        <div class="panel2">
            <div class="card3" onclick="window.location.href='createbuddhism.php';">
                <img src="./img/8-HhP2gIjmnHbB4FK.png">
                <p>Create Flash Cards</p>
            </div>

            <div class="card3" onclick="window.location.href='buddhismother.php';">
            <img src="./img/8-Mcv73IvIqSwXbno.png">
            <p>Let's Learn With Others</p>
        </div>

            <div class="card3" onclick="window.location.href='bhlist.php';">
                <img src="./img/8-o225juUjxVlOy4l (1).png">
                <p>See What You Created</p>
            </div>

            

            
        </div> 

    </div>















    <script>
        function goBack() {
                window.history.back();
            }
    </script>

    </body>
    </html>