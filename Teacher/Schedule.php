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
        <h1>Schedule</h1>
    </script>

										
    <?php
					$query = mysqli_query($link,"select * FROM schedule where teacher_id = '$session_id'  order by schedule_id DESC ")or die(mysqli_error());
                    $count = mysqli_fetch_array($query);

					if($count <= 0)
					{
						echo "<b>Currently you did not upload any documents</b>";
					}
					else
					{?>
                    <div class="panels">
                        <div class="panel8">
                        <form method='post'>

                        <table border="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
       <?php
					$query = mysqli_query($link, "SELECT schedule.*, teacher_class.class_name, subject.subject_title
                    FROM schedule 
                    INNER JOIN teacher_class ON teacher_class.teacher_class_id = schedule.class_id 
                    INNER JOIN subject ON subject.subject_id = schedule.subject_id 
                    WHERE schedule.teacher_id = '$session_id' 
                    ORDER BY schedule.schedule_id DESC") or die(mysqli_error($link));
                    while($row = mysqli_fetch_array($query)){
                    $id  = $row['schedule_id'];
				?>
            
                        <tr>
                            <td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
                            <td><?php echo $row['class_name']; ?></td>
                            <td><?php echo $row['subject_title']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                        </tr>
                    </tbody>
				
                </div>
            </div>
    </div>
    <?php
					}
				}
				?>

                   
                        <div class="but">
                
                            <button class="btn btn-info">
                            <a href="add_schedule.php" style='text-decoration:none;color:white;'>
                                <i class="fa fa-fw fa-plus"></i>&nbsp;Add Class Schedule</a>
                            </button>
                            <button type="submit" name="delete" class="btn btn-info">
                                <i class="fa fa-fw fa-trash"></i> Delete
                            </button>
                
                        </div>
                    </form>
                
            </body>

            </html>


            <?php
                 include '../database/db_con.php';

                 if (isset($_POST['delete'])){
                         $id=$_POST['selector'];
                         $N = count($id);
                         
                     for($i=0; $i < $N; $i++)
                     {
                         $result = mysqli_query($link,"DELETE from schedule
                         where schedule_id='$id[$i]'");
                     }
             ?>
                 <script>
                     window.location = "Schedule.php";
                 </script>
             
             <?php
                 }
             ?>
