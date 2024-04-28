<?php include '../database/db_con.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="././css/courses.css">
    
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
                <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="childCourses.php"  class="active"><i class="fas fa-book-open"></i> My Child Courses</a></li>
                <li><a href="childProgress.php"><i class="fas fa-chart-line"></i> My Child Progress</a></li>
                <li><a href="Inbox.php"><i class="fas fa-inbox"></i> My Inbox</a></li>
                
                <li><a href="pay.php"><i class="fas fa-money-bill"></i> Payements</a></li>
                <li><a href="announce.php"><i class="fas fa-bullhorn"></i> Announcements</a></li>

            </ul>
        </nav>
    </div>
    <?php
    $query = mysqli_query($link,"select * from parent where parent_id = '$session_id'") or die(mysqli_error($link));
  $row = mysqli_fetch_array($query) or die(mysqli_error($query));
  $child = $row['childrenname'];

  $query1 = mysqli_query($link,"select * from student where firstname = '$child'") or die(mysqli_error($link));
  $row = mysqli_fetch_array($query1) or die($query1);
  $student = $row['firstname'];
  $student_id = $row['student_id'];

  ?>
    <div class="content">

        <h1> Course Details</h1>
        <?php
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
                        echo '<b><center>There is no subjects Available for you.<center></b>';
                    }
                    else
                    {
				?>
        <div class="panel">
            <img src="./img/scince.png">
            <h2>Science</h2>
            <p>This course is based on the science syllabus that was recommended by the Ministry of education. Here we are 
                going to cover whole syllabus . Notonly that we are conducting assignmnets and quizes for each and every
            part of this course. </p>
            <p>Grade: 10</p>
            <?php 
                if($row['subject_title'] == 'Science')
                {
            ?>
            <p>Teacher: <?php echo $row['firstname']; ?></a></p>
            <p>Course fee: Rs.1000(pay it on or before the 25th of every month)</p>
           <?php } ?>
        </div>
        <?php
					$query = mysqli_query($link, "SELECT student_class.*, teacher_class.class_name, subject.subject_title, schedule.date, schedule.time, teacher.firstname
                    FROM student_class 
                    INNER JOIN schedule ON schedule.schedule_id = student_class.schedule_id 
                    INNER JOIN subject ON subject.subject_id = schedule.subject_id 
                    INNER JOIN teacher_class ON teacher_class.teacher_class_id = student_class.class_id 
                    INNER JOIN teacher ON teacher.teacher_id = schedule.teacher_id  
                    WHERE student_class.student_id = '$student_id'
                    AND subject.subject_title = 'Maths' 
                    ORDER BY student_class.student_schedule_id DESC") or die(mysqli_error($link));

                    $row = mysqli_fetch_array($query);
				?>
        <div class="panel">
            <img src="./img/math.png">
            <h2>Mathematics</h2>
            <p>Our mathematics course covers the full syllabus as per educational standards. With engaging classes and interactive sessions, we ensure a deep understanding of every topic. Students benefit from a mix of theory, practical applications, and problem-solving strategies, guided by experienced teachers.</p>
            <p>Grade: 10</p>
            <?php 
                if($row['subject_title'] == 'Maths')
                {
            ?>
            <p>Teacher: <?php echo $row['firstname']; ?></p>
            <p>Course fee: Rs.1000(pay it on or before the 25th of every month)</p>
           <?php } ?>
        </div>
        <?php
					$query = mysqli_query($link, "SELECT student_class.*, teacher_class.class_name, subject.subject_title, schedule.date, schedule.time, teacher.firstname
                    FROM student_class 
                    INNER JOIN schedule ON schedule.schedule_id = student_class.schedule_id 
                    INNER JOIN subject ON subject.subject_id = schedule.subject_id 
                    INNER JOIN teacher_class ON teacher_class.teacher_class_id = student_class.class_id 
                    INNER JOIN teacher ON teacher.teacher_id = schedule.teacher_id  
                    WHERE student_class.student_id = '$student_id'
                    AND subject.subject_title = 'English' 
                    ORDER BY student_class.student_schedule_id DESC") or die(mysqli_error($link));

                    $row = mysqli_fetch_array($query);
				?>
        <div class="panel">
            <img src="./img/eng.png">
            <h2>English</h2>
            <p>This course is based on the science syllabus that was recommended by the Ministry of education.Our english
                teachers are highly experienced and highly educated . Your child can get a good knowledge on their school 
                syllabus as well as other practical things
            </p>
            <p>Grade: 10</p>
            <?php 
                if($row['subject_title'] == 'English')
                {
            ?>
            <p>Teacher: <?php echo $row['firstname']; ?></a></p>
            <p>Course fee: Rs.1000(pay it on or before the 25th of each month)</p>
           <?php } ?>
        </div>

        <?php
					$query = mysqli_query($link, "SELECT student_class.*, teacher_class.class_name, subject.subject_title, schedule.date, schedule.time, teacher.firstname
                    FROM student_class 
                    INNER JOIN schedule ON schedule.schedule_id = student_class.schedule_id 
                    INNER JOIN subject ON subject.subject_id = schedule.subject_id 
                    INNER JOIN teacher_class ON teacher_class.teacher_class_id = student_class.class_id 
                    INNER JOIN teacher ON teacher.teacher_id = schedule.teacher_id  
                    WHERE student_class.student_id = '$student_id'
                    AND subject.subject_title = 'Sinhala' 
                    ORDER BY student_class.student_schedule_id DESC") or die(mysqli_error($link));

                    $row = mysqli_fetch_array($query);
				?>
        <div class="panel">
            <img src="./img/Sinhala letter.png">
            <h2>Sinhala</h2>
            <p>This course is based on the science syllabus that was recommended by the Ministry of education. Here we are 
                going to cover whole syllabus . Notonly that we are conducting assignmnets and quizes for each and every
            part of this course. </p>
            <p>Grade: 10</p>
            <?php 
                if($row['subject_title'] == 'Sinhala')
                {
            ?>
            <p>Teacher:<?php echo $row['firstname']; ?></a></p>
            <p>Course fee: Rs.1000(pay it on or before the 25th of each month)</p>
           <?php } ?>
        </div>

        <?php
					$query = mysqli_query($link, "SELECT student_class.*, teacher_class.class_name, subject.subject_title, schedule.date, schedule.time, teacher.firstname
                    FROM student_class 
                    INNER JOIN schedule ON schedule.schedule_id = student_class.schedule_id 
                    INNER JOIN subject ON subject.subject_id = schedule.subject_id 
                    INNER JOIN teacher_class ON teacher_class.teacher_class_id = student_class.class_id 
                    INNER JOIN teacher ON teacher.teacher_id = schedule.teacher_id  
                    WHERE student_class.student_id = '$student_id'
                    AND subject.subject_title = 'Buddhism' 
                    ORDER BY student_class.student_schedule_id DESC") or die(mysqli_error($link));

                    $row = mysqli_fetch_array($query);
				?>
        <div class="panel">
            <img src="./img/lot.png">
            <h2>Buddhism</h2>
            <p>This course is based on the science syllabus that was recommended by the Ministry of education. Here we are 
                going to cover whole syllabus . Notonly that we are conducting assignmnets and quizes for each and every
            part of this course. </p>
            <p>Grade: 10</p>
            <?php 
                if($row['subject_title'] == 'Buddhism')
                {

            ?>
            <p>Teacher:<?php echo $row['firstname']; ?></a></p>
            <p>Course fee: Rs.1000(pay it on or before the 25th of each month)</p>
           <?php } ?>
        </div>

        <?php
					$query = mysqli_query($link, "SELECT student_class.*, teacher_class.class_name, subject.subject_title, schedule.date, schedule.time, teacher.firstname
                    FROM student_class 
                    INNER JOIN schedule ON schedule.schedule_id = student_class.schedule_id 
                    INNER JOIN subject ON subject.subject_id = schedule.subject_id 
                    INNER JOIN teacher_class ON teacher_class.teacher_class_id = student_class.class_id 
                    INNER JOIN teacher ON teacher.teacher_id = schedule.teacher_id  
                    WHERE student_class.student_id = '$student_id'
                    AND subject.subject_title = 'History' 
                    ORDER BY student_class.student_schedule_id DESC") or die(mysqli_error($link));

                    $row = mysqli_fetch_array($query);
				?>
        <div class="panel">
            <img src="./img/his.png">
            <h2>History</h2>
            <p>This course is based on the science syllabus that was recommended by the Ministry of education. Here, we are
                going to provide knowledge to students by interactive and attractive activities and simulations </p>
            <p>Grade: 10</p>
            <?php 
                if($row['subject_title'] == 'History')
                {
            ?>
            <p>Teacher:<?php echo $row['firstname']; ?></a></p>
            <p>Course fee: Rs.1000(pay it on or before the 25th of each month)</p>
           <?php } ?>
        </div>

    </div>

    <?php } ?>

                </body>
                </html>