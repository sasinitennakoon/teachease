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
    <link rel="stylesheet" href="././css/tasks.css">
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
                    <li><a href="Tasks.php"class="active"><i class="far fa-sticky-note"></i> Flash Cards</a></li>
                    <li><a href="Progress.php"><i class="fas fa-chart-line"></i> Progress Report</a></li>
                    <li><a href="ExamR.php"><i class="fas fa-chalkboard"></i> Exam Results</a></li>
                    <li><a href="msg.php"><i class="fas fa-envelope"></i> Messages</a></li>
                    <li><a href="Feedback.php"><i class="fas fa-comment"></i> Feedback Collection</a></li>
    
                </ul>
            </nav>
        </div>

        <div class="content">
            
        <div class="panelsD2">
                <div class="panel9" onclick="window.location.href='scienceflash.html';">
                    <p style="font-size: 50px;"><b>Science</b></p>
                </div>

                <div class="panel10" onclick="window.location.href='mathflash.html';">
                    <p style="font-size: 50px;"><b>Mathematics</b></p>
                </div>

                
            </div>    
            

            <div class="panelsD2">
                <div class="panel9" onclick="window.location.href='engflash.html';">
                    <p style="font-size: 50px;"><b>English</b></p>
                </div>

                <div class="panel10" onclick="window.location.href='sinflash.html';">
                    <p style="font-size: 50px;"><b>Sinhala</b></p>
                </div>

                
            </div>
            <div class="panelsD2">
                <div class="panel9" onclick="window.location.href='budhismflash.html';">
                    <p  style="font-size: 50px;"><b>Buddhism</b></p>
                </div>

                <div class="panel10" onclick="window.location.href='hisflash.html';">
                    <p style="font-size: 50px;"><b>History</b></p>
                </div>

                
            </div>
 
                    
        </div>
</body>
</html>