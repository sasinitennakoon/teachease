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
    <link rel="stylesheet" href="././css/studymaterials.css">
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
                    <li><a href="StudyMaterials.php" class="active"><i class="fas fa-book-open"></i> Study Materials</a></li>
                    <li><a href="Tasks.php"><i class="far fa-sticky-note"></i> Flash Cards</a></li>
                    <li><a href="Progress.php"><i class="fas fa-chart-line"></i> Progress Report</a></li>
                    <li><a href="ExamR.php"><i class="fas fa-chalkboard"></i> Exam Results</a></li>
                    <li><a href="msg.php"><i class="fas fa-envelope"></i> Messages</a></li>
                    <li><a href="Feedback.php"><i class="fas fa-comment"></i> Feedback Collection</a></li>
    
                </ul>
            </nav>
        </div>

<div class="content">
    
    <h1>STUDY MATERIALS</h1>
    <div class="panelsD">
            <div class="panel7" onclick="window.location.href='sciencemate.html';">
                <p><b>Science</b></p>
                
            </div>

            <div class="panel8" onclick="window.location.href='mathsmate.html';">
                <p><b>Mathematics</b></p>
            </div>

            <div class="panel9" onclick="window.location.href='englishmate.html';">
                <p><b>English</b></p>
            </div>
        </div>

        <div class="panelsD2">
            <div class="panel10" onclick="window.location.href='sinhalamate.html';">
                <p><b>Sinhala</b></p>
            </div>

            <div class="panel11" onclick="window.location.href='buddhismmate.html';">
                <p><b>Buddhism</b></p>
            </div>

            <div class="panel12" onclick="window.location.href='historymate.html';">
                <p><b>History</b></p>
            </div>
        </div>
        </div>

        
</div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get all course panels
            var panels = document.querySelectorAll(' .panelst1,.panelst2,.panelst3,.panelst4,.panelst5,  .panelst6');

            // Add event listeners for hover effect on each panel
            panels.forEach(function (panel) {
                panel.addEventListener('mouseover', function () {
                    panel.style.transform = 'translateY(-5px)';
                    panel.style.boxShadow = '0 8px 16px rgba(0, 0, 0, 0.2)';
                });

                panel.addEventListener('mouseout', function () {
                    panel.style.transform = 'translateY(0)';
                    panel.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
                });
            });
        });
    </script>

</div>
</body>
</html>