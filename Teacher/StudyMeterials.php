<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="./CSS/FirstPage.css">
    <link rel="stylesheet" href="./CSS/StudyMeterials.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   
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
            <img src="./IMG/logo1.png" alt="Logo">
        </div>
        <hr color="white">
        <nav>
            <ul>
                <li><a href="FirstPage.php"><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a></li>
                <li><a href="MyStudent.php"><i class="fas fa-users"></i>&nbsp;My Students</a></li>
                <li><a href="MyClasses.php"><i class="fas fa-chalkboard-teacher"></i>&nbsp; My Classes</a></li>
                <li><a href="Schedule.php"><i class="fas fa-calendar-alt"></i>&nbsp; Schedule</a></li>
                <li><a href="StudyMeterials.php" class="active"><i class="fas fa-book"></i>&nbsp; Study Materials</a></li>
                <li><a href="Attendance.php"><i class="fas fa-check-circle"></i>&nbsp; Attendance</a></li>
                <li><a href="ExamResults.php"><i class="fas fa-poll"></i>&nbsp; Exam Results</a></li>
                <li><a href="Messages.php"><i class="fas fa-envelope"></i>&nbsp;Messages</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i>&nbsp;Feedback</a></li>
            </ul>
        </nav>
    </div>

    <div class="content">
        <!-- Your page content goes here -->
        <h1>Study Materials</h1>

        <div class="panels2">
            <div class="panel_1">
                <h3>Uploaded Documents</h3>
                <button class="button1">View</button>
                <button class="button1">Edit</button>
            </div>

            <div class="panel_3">
               <h3>Past Papers</h3>
               <button class="button1">View</button>
                <button class="button1">Edit</button>
            </div>
        </div>
        <div class="panels2">
            <div class="panel_4">
                <h3>Uploaded Assignments</h3>
                <button class="button1">View</button>
                <button class="button1">Edit</button>
            </div>

            <div class="panel_5">
               <h3>Quizzes</h3>
               <button class="button1">View</button>
                <button class="button1">Edit</button>
            </div>
        </div>
        <div class="panels2">
            <div class="panel_2">
                <h3>Questionnaries</h3>
                <button class="button1">View</button>
                <button class="button1">Edit</button>
            </div>

            <div class="panel_6">
               <h3>Flashcards</h3>
               <button class="button1">View</button>
                <button class="button1">Edit</button>
             </div>
        </div>
</body>
</html>
