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
    <link href="'https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="CSS/analytics.css">
    <link rel="stylesheet" href="./CSS/FirstPage.css">
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
                <li><a href="FirstPage.php" class="active"><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a></li>
                <li><a href="MyStudent.php"><i class="fas fa-users"></i>&nbsp;My Students</a></li>
                <li><a href="MyClasses.php"><i class="fas fa-chalkboard-teacher"></i>&nbsp; My Classes</a></li>
                <li><a href="Schedule.php"><i class="fas fa-calendar-alt"></i>&nbsp; Schedule</a></li>
                <li><a href="StudyMeterials.php"><i class="fas fa-book"></i>&nbsp; Study Materials</a></li>
                <li><a href="Attendance.php"><i class="fas fa-check-circle"></i>&nbsp; Attendance</a></li>
                <li><a href="ExamResults.php"><i class="fas fa-poll"></i>&nbsp; Exam Results</a></li>
                <li><a href="Messages.php"><i class="fas fa-envelope"></i>&nbsp;Messages</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i>&nbsp;Feedback</a></li>
            </ul>
        </nav>
    </div>

    <!-- Content -->
    <div class="content">
      <main class="main-container">
        <div class="main-title">
          <h1>TEACHER ANALYSIS DASHBOARD</h1>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <h3>TOTAL STUDENTS</h3>
              <span class="material-icons-outlined">inventory_2</span>
            </div>
            <h1>272</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>TOTAL CLASSES</h3>
              <span class="material-icons-outlined">category</span>
            </div>
            <h1>5</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>MONTHLY EARNINGS</h3>
              <span class="material-icons-outlined">groups</span>
            </div>
            <h1>150000</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>STUDENT COURSE REMOVAL REQUESTS</h3>
              <span class="material-icons-outlined">notification_important</span>
            </div>
            <h1>16</h1>
          </div>

        </div>

        <!--<div class="charts">

          <div class="charts-card">
            <h2 class="chart-title">Top 5 Scoring Students</h2>
            <div id="bar-chart"></div>
          </div>

          <div class="charts-card">
            <h2 class="chart-title">Average Marks of Students</h2>
            <div id="area-chart"></div>
          </div>

          <div class="charts-card">
            <h2 class="chart-title">Average attendance of Students</h2>
            <div id="attendance-chart"></div>
          </div>

          <div class="charts-card">
            <h2 class="chart-title">Overall Student Assessment Completion Rate</h2>
            <div id="radialBarchart"></div>
          </div>

        </div>-->
        <div class="charts">

          <div class="charts-card">
            <h2 class="chart-title">Attendance Mark Correlation</h2>
            <div id="Scatterchart"></div>
          </div>

          <div class="charts-card">
            <h2 class="chart-title">Average Marks of Students</h2>
            <div id="area-chart"></div>
          </div>

          <div class="charts-card">
            <h2 class="chart-title">Average attendance of Students</h2>
            <div id="attendance-chart"></div>
          </div>

          <div class="charts-card">
            <h2 class="chart-title">Overall Student Assessment Completion Rate</h2>
            <div id="radialBarchart"></div>
          </div>

        </div>
      </main>
      <!-- End Main -->

    </div>
    

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="js/analytics.js"></script>
</body>
</html>
