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
    <link rel="stylesheet" href="././css/courses.css">
    <link rel="stylesheet" href="././css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="dropdown" style="float:right;">
        <div class="dropbtn">
                      <img src="./img/loginicon.png" alt="User Icon">
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
                        <li><a href="studash.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li><a href="MyCourses.php" class="active"><i class="fas fa-book"></i> My Courses</a></li>
                        <li><a href="StudyMaterials.php"><i class="fas fa-book-open"></i> Study Materials</a></li>
                        <li><a href="Tasks.php"><i class="fas fa-tasks"></i> Tasks</a></li>
                        <li><a href="Progress.php"><i class="fas fa-chart-line"></i> Progress Report</a></li>
                        <li><a href="ExamR.php"><i class="fas fa-chalkboard"></i> Exam Results</a></li>
                        <li><a href="msg.php"><i class="fas fa-envelope"></i> Messages</a></li>
                        <li><a href="Feedback.php"><i class="fas fa-comment"></i> Feedback Collection</a></li>
        
                    </ul>
                </nav>
            </div>

    <!--content-->

    <div class="content">
        <!-- Your page content goes here -->
        <h1>MY COURSES</h1>

        
        <!-- firstCalendar Panel -->
        <div class="panelsD">
            <div class="panel7" onclick="window.location.href='science.html';">
                <p><b>Science</b></p>
                
            </div>

            <div class="panel8" onclick="window.location.href='maths.html';">
                <p><b>Mathematics</b></p>
            </div>

            <div class="panel9" onclick="window.location.href='english.html';">
                <p><b>English</b></p>
            </div>
        </div>

        <div class="panelsD2">
            <div class="panel10" onclick="window.location.href='history.html';">
                <p><b>History</b></p>
            </div>

            <div class="panel11" onclick="window.location.href='hindi.html';">
                <p><b>Hindi</b></p>
            </div>

            <div class="panel12" onclick="window.location.href='geo.html';">
                <p><b>Geography</b></p>
            </div>
        </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all course panels
        var panels = document.querySelectorAll('.panelsD .panel1, .panelsD .panel2, .panelsD .panel3, .panelsD2 .panel4, .panelsD2 .panel5, .panelsD2 .panel6');

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

</body>
</html>