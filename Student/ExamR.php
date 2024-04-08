<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from student where student_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="././css/ExamR.css">
    <link rel="stylesheet" href="././css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
  <?php include 'dropdown2.php'; ?>
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="././img/logo1.png" alt="Logo">
            </div>
            <hr color="white">
            <nav>
                <ul>
                    <li><a href="studash.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="MyCourses.php"><i class="fas fa-book"></i> My Courses</a></li>
                    <li><a href="StudyMaterials.php"><i class="fas fa-book-open"></i> Study Materials</a></li>
                    <li><a href="Tasks.php"><<i class="far fa-sticky-note"></i> Flash Cards</a></li>
                    <li><a href="Progress.php"><i class="fas fa-chart-line"></i> Progress Report</a></li>
                    <li><a href="ExamR.php" class="active"><i class="fas fa-chalkboard"></i> Exam Results</a></li>
                    <li><a href="msg.php"><i class="fas fa-envelope"></i> Messages</a></li>
                    <li><a href="Feedback.php" ><i class="fas fa-comment"></i> Feedback Collection</a></li>
    
                </ul>
            </nav>
        </div>

        <div class="content">
        <h2>Term Tests Results</h2>


            <div class="panelsD">
                <div class="panelsub1">
                    
                    <button class="but2" onclick="window.location.href='1stterm.html';">1 st Term</button>
                    <button class="but2" onclick="window.location.href='2ndterm.html';">2 nd Term</button>
                    <button class="but2" onclick="window.location.href='3rdterm.html';">3 rd Term</button>
                </div>

                
            </div>


        <h2> Assignments and Quizes</h2>
        
            <div class="panelsD2">
                <div class="panelsub2">
                <button class="but3" onclick="window.location.href='scienceassignment.html';">SCIENCE</button>
                <button class="but3" onclick="window.location.href='mathsassignment.html';">MATHEMATICS</button>
                <button class="but3" onclick="window.location.href='engassignment.html';">ENGLISH</button>
                <button class="but3" onclick="window.location.href='sinhalaassignment.html';">SINHALA</button>
                <button class="but3" onclick="window.location.href='buddhismassignment.html';">BUDDHISM</button>
                <button class="but3" onclick="window.location.href='hisassignment.html';">HISTORY</button>
                </div>
            </div>

        
       </div>