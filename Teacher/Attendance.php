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
    <link rel="stylesheet" href="./CSS/Schedule.css">
    <link rel="stylesheet" href="./CSS/FirstPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                <li><a href="Attendance.php" class="active"><i class="fas fa-check-circle"></i>&nbsp; Attendance</a></li>
                <li><a href="ExamResults.php"><i class="fas fa-poll"></i>&nbsp; Exam Results</a></li>
                <li><a href="Messages.php"><i class="fas fa-envelope"></i>&nbsp;Messages</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i>&nbsp;Feedback</a></li>
            </ul>
        </nav>
</div>
    <div class="content">
        <!-- Your page content goes here -->
        <h1>Student Attendance</h1>

        <div class="panels1">
            <div class="panel10">
                <form method="post">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Student ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Grade</th>
                            <th>Attendance</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                        $query = mysqli_query($link,"select * from student_attendance  where teacher_id = '$session_id'") or die(mysqli_error($link));
                        $count = mysqli_fetch_array($query);

                        if($count < 0)
                        {
                            echo "<b>There is No Students Currently Enroll to the course</b>";
                        }
                        else
                        {
                            $query = mysqli_query($link,"select * from student_attendance where teacher_id = '$session_id'") or die(mysqli_error($link));
                            while($row = mysqli_fetch_array($query))
                            {
                                $id = $row['student_id'];
                    ?>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
                            <td><?php echo $row['student_id']; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['grade']; ?></td>
                            <td><?php echo $row['status']; ?>
                            <?php
                                {?>
                                <td><button type='submit' name="Present" class="button" style="background-color:#055305;">Present</button></a></td>
                                <td><button type='submit' name="Absent" class="button" style="background-color:#850404;">Absent</button></a></td>
                                <?php
                                }
                            ?>
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

<?php


    if (isset($_POST['remove'])) {
        $id = $_POST['selector'];
        $N = count($id);
            
        for($i=0; $i < $N; $i++)
        {
            $result = mysqli_query($link,"UPDATE `userlist` SET status = 'unregistered' WHERE userlistid ='$id[$i]'");
            $result1 = mysqli_query($link,"UPDATE `student` SET status = 'unregistered' WHERE student_id = '$id[$i]' ");
        }

        ?>
        <script>
        window.location = 'studentdashboard.php';
        </script>
    <?php
    }
    
    else if (isset($_POST['approve'])) {
        $id = $_POST['selector'];
        $N = count($id);
            
        for($i=0; $i < $N; $i++)
        {
            $result1 = mysqli_query($link,"UPDATE `student_attendance` SET status = 'present' WHERE student_id = '$id[$i]' ");
        }
    ?>
        <script>
        window.location = 'schedule.php';
    </script>
    <?php
    }
    ?>
       
    

