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
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./CSS/FirstPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Latest FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.css" integrity="sha384-LiWsxj4vMfsO8uyNnTVqSfeLqqkKD2pwWqFnSa6UqVqwKn9FlnNy5wKb3bYxs84p" crossorigin="anonymous">
</head>
<body>
<?php include 'dropdown.php'; ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="./IMG/logo1.png" alt="Logo">
        </div>
        <hr color="white">
        <nav>
            <ul>
            <li><a href="FirstPage.php"><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a></li>
                <li><a href="announcements.php"><i class="fas fa-tachometer-alt"></i>&nbsp; Announcements</a></li>
                
                <li><a href="MyClasses.php"><i class="fas fa-chalkboard-teacher"></i>&nbsp; My Classes</a></li>
                <li><a href="Schedule.php"><i class="fas fa-calendar-alt"></i>&nbsp; Schedule</a></li>
                <li><a href="StudyMeterials.php"><i class="fas fa-book"></i>&nbsp; Study Materials</a></li>
                <li><a href="Attendance.php"><i class="fas fa-check-circle"></i>&nbsp; Attendance</a></li>
                <li><a href="ExamResults.php"><i class="fas fa-poll"></i>&nbsp; Exam Results</a></li>
                <li><a href="Messages.php"><i class="fas fa-envelope"></i>&nbsp;Messages</a></li>
                <li><a href="Feedback.php" class="active"><i class="fas fa-comment"></i>&nbsp;Feedback</a></li>
            </ul>
        </nav>
    </div>
    <div class="content">
        <!-- Your page content goes here -->
        <h1>Feedback</h1>

</body>
</html>
