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
<div class="dropdown" style="float:right;">
<div class="dropbtn">
              <img src="./IMG/loginicon.png" alt="User Icon">
                <?php echo $row['firstname']; ?>
				<i class="fa fa-caret-down"></i>
                </div>
			  <div class="dropdown-content">
				<a href="MyProfile.php"><i class="fa fa-fw fa-user"></i>Profile</a>
				<a href="ResetPassword.php"><i class="fa fa-fw fa-unlock-alt"></i>Change Password</a>
				<a href="../logout.php"><i class="fa fa-fw fa-sign-out-alt"></i>Log out</a>
			  </div>
			</div> 
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
                <li><a href="Courses.php"><i class="fas fa-book"></i> Courses</a></li>
                <li><a href="Subjects.php"><i class="fas fa-flask"></i> Subjects</a></li>
                <li><a href="Classes.php"><i class="fas fa-chalkboard"></i> Classes</a></li>
                <li><a href="Certificates.php"><i class="fas fa-certificate"></i> Certificates</a></li>
                <li><a href="RankingSystem.php"><i class="fas fa-trophy"></i> Ranking System</a></li>
                <li><a href="Feedback.php" class="active"><i class="fas fa-comment"></i> Feedback Collection</a></li>

            </ul>
        </nav>
    </div>

   
    <!-- Content -->
    <div class="content">
        <!-- Your page content goes here -->
        <h1>Feedback Collection</h1>
        
        <!-- Inserting small panels -->
        <div class="panels">
            <div class="panel">
                <h2>No Of Feedback Forms</h2>
                <p><count>0</count></p>
                <div class="but">
                    <button class="button"><b>View</b></button>
                </div>
            </div>

            <div class="panel">
                <h2>No. Subjects Feedback Added</h2>
                <p><count>0</count></p>
                <div class="but">
                    <button class="button"><b>View</b></button>
                </div>
            </div>

            <div class="panel">
                <h2>Total No. Of Feedbacks</h2>
                <p><count>0</count></p>
                <div class="but">
                    <button class="button"><b>View</b></button>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>