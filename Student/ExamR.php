<?php include '../database/db_con.php'; ?>


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
            <li><a href="announcements.php"><i class="fas fa-tachometer-alt"></i> Announcements</a></li>
            <li><a href="MyCourses.php"><i class="fas fa-book"></i> My Courses</a></li>
            <li><a href="StudyMaterials.php"><i class="fas fa-book-open"></i> Study Materials</a></li>
            <li><a href="Tasks.php"><i class="far fa-sticky-note"></i></i> Flash Cards</a></li>
            <li><a href="Progress.php"><i class="fas fa-chart-line"></i> Progress Report</a></li>
            <li><a href="ExamR.php"  class="active"><i class="fas fa-chalkboard"></i> Exam Results</a></li>
            <li><a href="msg.php"><i class="fas fa-envelope"></i> Messages</a></li>
            <li><a href="Feedback.php"><i class="fas fa-comment"></i> Feedback Collection</a></li>
    
                </ul>
            </nav>
        </div>

        <div class="content">
        <h2>Term Tests Results</h2>


            <div class="panelsD">
                <div class="panelsub1">
                    
                    <button class="but2" onclick="window.location.href='1stterm.php';">1 st Term</button>
                    <button class="but2" onclick="window.location.href='2ndterm.php';">2 nd Term</button>
                    <button class="but2" onclick="window.location.href='3rdterm.php';">3 rd Term</button>
                </div>

                
            </div>


        <h2> Assignments and Quizes</h2>
        
            <div class="panelsD2">
                <div class="panelsub2">
                <button class="but3" onclick="window.location.href='scienceassignment.php';">SCIENCE</button>
                <button class="but3" onclick="window.location.href='mathsassignment.php';">MATHEMATICS</button>
                <button class="but3" onclick="window.location.href='engassignment.php';">ENGLISH</button>
                <button class="but3" onclick="window.location.href='sinhalaassignment.php';">SINHALA</button>
                <button class="but3" onclick="window.location.href='buddhismassignment.php';">BUDDHISM</button>
                <button class="but3" onclick="window.location.href='hisassignment.php';">HISTORY</button>
                </div>
            </div>

        
       </div>