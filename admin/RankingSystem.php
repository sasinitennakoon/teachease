<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from users where user_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="././css/FirstPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Latest FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.css" integrity="sha384-LiWsxj4vMfsO8uyNnTVqSfeLqqkKD2pwWqFnSa6UqVqwKn9FlnNy5wKb3bYxs84p" crossorigin="anonymous">
</head>
<body>
<?php include 'dropdown1.php'; ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="././img/logo1.png" alt="Logo">
        </div>
        <hr color="white">
        <nav>
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="Announcements.php"><i class="fas fa-bullhorn"></i> Announcements</a></li>
                <li><a href="PaymentDetails.php"><i class="fas fa-dollar-sign"></i> Payment Details</a></li>
                <li><a href="Users.php"><i class="fas fa-users"></i> Users</a></li>
                <li><a href="Subjects.php"><i class="fas fa-flask"></i> Subjects</a></li>
                <li><a href="Classes.php"><i class="fas fa-chalkboard"></i> Classes</a></li>
                
                <li><a href="RankingSystem.php" class="active"><i class="fas fa-trophy"></i> Ranking System</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i> Feedback Collection</a></li>

            </ul>
        </nav>
    </div>
    <div class="content">
        <!-- Your page content goes here -->
        <h1>Ranking System</h1>

        <div class="panelsD">
        
            <div class="panel20" onclick="window.location.href='term1_page.php';">
            
                <h2>Term 1</h2>
              
                 
            </div> 
             
               
           
            <div class="panel23" onclick="window.location.href='term2_page.php';">
            
                <h2>Term 2</h2>
               
            </div>
            
            
            <div class="panel22" onclick="window.location.href='term3_page.php';">
            
                <h2>Term 3</h2>
              
           
            </div>
            
        </div>

        <!--
        <div class="panelsD2">
            <div class="panel30" onclick="window.location.href='term1rank.php';">
            <h2>Term 1 - Rank</h2>
            </div>

            <div class="panel31" onclick="window.location.href='term2rank.php';">
            <h2>Term 2 - Rank</h2>
            </div>

            <div class="panel32" onclick="window.location.href='term3rank.php';">
            <h2>Term 3 - Rank</h2>
            </div>
        </div>
-->
    </div>

   
    
</body>
</html>
