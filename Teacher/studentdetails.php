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
    <link rel="stylesheet" href="./CSS/MyClasses.css">
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
                <li><a href="ExamResults.php" class="active"><i class="fas fa-poll"></i>&nbsp; Exam Results</a></li>
                <li><a href="Messages.php"><i class="fas fa-envelope"></i>&nbsp;Messages</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i>&nbsp;Feedback</a></li>
            </ul>
        </nav>
    </div>

    <div class="content">
        <!-- Your page content goes here -->
		<h1>Student Details</h1>

        <div class="panels1">
            <div class="panel10">
                <form method="post">
                <table>
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Grade</th>
                            <th>Class Name</th>
                        </tr>
                    </thead>
                    <?php
                        $query = mysqli_query(
                            $link,
                            "SELECT student_class.*, teacher_class.teacher_id
                            FROM student_class 
                            INNER JOIN teacher_class ON teacher_class.teacher_class_id = student_class.class_id
                            WHERE teacher_class.teacher_id = $session_id"
                        ) or die(mysqli_error($link));
                        
                        // Get the number of rows returned by the query
                        $count = mysqli_num_rows($query);
                        
                        // Fetch the first row if you want to examine it
                        $first_row = mysqli_fetch_array($query);
                        

                        if($count < 0)
                        {
                            echo "<b>There are no students</b>";
                        }
                        else
                        {
                            $query = mysqli_query(
                                $link,
                                "SELECT student_class.*, 
                                    student.firstname, 
                                    student.lastname, 
                                    student.grade,
                                    MAX(teacher_class.class_name) AS class_name
                            
                                FROM 
                                    student_class
                                INNER JOIN 
                                    student 
                                ON 
                                    student.student_id = student_class.student_id
                                INNER JOIN 
                                    teacher_class 
                                ON 
                                    teacher_class.teacher_class_id = student_class.class_id
                                WHERE 
                                    teacher_class.teacher_id = $session_id
                                GROUP BY student_class.student_schedule_id, student.firstname,student.lastname"
                            ) or die(mysqli_error($link));
                            
                            while($row = mysqli_fetch_array($query))
                            {
                                $id = $row['student_schedule_id'];
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['student_id']; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['grade']; ?></td>
                            <td><?php echo $row['class_name']; ?></td>
                        </tr>
                    </tbody>
                    <?php  } } ?>
                </table>
                            </form>
            </div>
            
        </div>

        <!-- Add Details Form -->
       
</body>
</html>

