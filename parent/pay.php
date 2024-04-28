<?php include '../database/db_con.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="././css/pay.css">
    <link rel="stylesheet" href="././css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
  <?php include 'dropdown3.php'; ?>
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="././img/logo1.png" alt="Logo">
            </div>
            <hr color="white">
            <nav>
                <ul>
                    <li><a href="dashboard.php" ><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="childCourses.php"><i class="fas fa-book-open"></i> My Child Courses</a></li>
                <li><a href="childProgress.php"><i class="fas fa-chart-line"></i> My Child Progress</a></li>
                <li><a href="Inbox.php"><i class="fas fa-inbox"></i> My Inbox</a></li>
                
                <li><a href="pay.php"  class="active"><i class="fas fa-money-bill"></i> Payements</a></li>
                <li><a href="announce.php" ><i class="fas fa-bullhorn"></i> Announcements</a></li>
    
                </ul>
            </nav>
        </div>
       

        <div class="content">
        
            <h1>Your Payments</h1>
            <?php
            $query = mysqli_query($link,"select * from parent where parent_id = '$session_id'") or die(mysqli_error($link));
            $row = mysqli_fetch_array($query) or die(mysqli_error($query));
            $child = $row['childrenname'];
          
            $query1 = mysqli_query($link,"select * from student where firstname = '$child'") or die(mysqli_error($link));
            $row = mysqli_fetch_array($query1) or die($query1);
            $student = $row['firstname'];
            $student_id = $row['student_id'];
          

					$query = mysqli_query($link, "SELECT student_class.*, teacher_class.class_name, subject.subject_title, schedule.date, schedule.time, teacher.firstname
                    FROM student_class 
                    INNER JOIN schedule ON schedule.schedule_id = student_class.schedule_id 
                    INNER JOIN subject ON subject.subject_id = schedule.subject_id 
                    INNER JOIN teacher_class ON teacher_class.teacher_class_id = student_class.class_id 
                    INNER JOIN teacher ON teacher.teacher_id = schedule.teacher_id  
                    WHERE student_class.student_id = '$student_id'
                    AND subject.subject_title = 'Science' 
                    ORDER BY student_class.student_schedule_id DESC") or die(mysqli_error($link));

                    $row = mysqli_fetch_array($query);
                    $count = mysqli_num_rows($query);
                    if($count <= 0)
                    {
                        echo '<b><center>There is no Payments available for you.<center></b>';
                    }
                    else
                    {
				?>
            <div class="panelsD">
            <div class="panel7" onclick="window.location.href='//buy.stripe.com/test_cN2g03alb6wf0OQ7sC';">
                <p><b>Science</b></p>
                
            </div>

            <div class="panel8" onclick="window.location.href='//buy.stripe.com/test_cN229dfFv2fZ4127sB';">
                <p><b>Mathematics</b></p>
            </div>

            <div class="panel9" onclick="window.location.href='//buy.stripe.com/test_aEUcNR3WN3k37de7sA';">
                <p><b>English</b></p>
            </div>
        </div>

        <div class="panelsD2">
            <div class="panel10" onclick="window.location.href='//buy.stripe.com/test_5kAcNRbpf9Ir69aeV6';">
                <p><b>Sinhala</b></p>
            </div>

            <div class="panel11" onclick="window.location.href='//buy.stripe.com/test_00g9BFgJzaMveFGeV5';">
                <p><b>Buddhism</b></p>
            </div>

            <div class="panel12" onclick="window.location.href='//buy.stripe.com/test_dR6g038d33k3eFGcMT';">
                <p><b>History</b></p>
            </div>
        </div>

        <?php } ?>
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