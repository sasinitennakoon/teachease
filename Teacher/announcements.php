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
    <link rel="stylesheet" href="./CSS/MyStudent.css">
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
                <li><a href="MyStudent.php"><i class="fas fa-users"></i>&nbsp;My Students</a></li>
                <li><a href="MyClasses.php"><i class="fas fa-chalkboard-teacher"></i>&nbsp; My Classes</a></li>
                <li><a href="Schedule.php"><i class="fas fa-calendar-alt"></i>&nbsp; Schedule</a></li>
                <li><a href="StudyMeterials.php"><i class="fas fa-book"></i>&nbsp; Study Materials</a></li>
                <li><a href="Attendance.php"><i class="fas fa-check-circle"></i>&nbsp; Attendance</a></li>
                <li><a href="ExamResults.php"><i class="fas fa-poll"></i>&nbsp; Exam Results</a></li>
                <li><a href="Messages.php"><i class="fas fa-envelope"></i>&nbsp;Messages</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i>&nbsp;Feedback</a></li>
            </ul>
        </nav>
    </div>
    <div class="content">
            
    <h1>Announcements</h1>

<h3>Recent Announcements</h3>

 
   
<div class="panels1">
    <div class="panel10">
    <form method='post'>
    
<?php
    $query = mysqli_query($link, "SELECT * FROM announcement WHERE type = 'For Teachers' OR type = 'for all'") or die(mysqli_error($link));

    $count  = mysqli_num_rows($query);

    if($count > 0)
    {?>


    
            <table border="0">
                <thead>
                    <tr>
                        <th>Content</th>
                        <th>Type</th>
                    </tr>
                </thead>
            <tbody>
            <?php
            while($row = mysqli_fetch_array($query)){
            $id = $row['announcement_id'];

            ?>
            
            <tr>
                    <td><?php echo $row['content']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    
                </tr>
            </tbody>

           

            <?php } }else{ ?>
                <h3>There is no announcements currently available</h3>
            <?php  } ?>

            </table>

            </form>  
    </div>
</div>
    </div>

    
</body>
</html>
