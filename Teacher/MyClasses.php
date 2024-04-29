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
   
    <!-- Include the external JavaScript file -->
    <script src="https://sdk.videosdk.live/js-sdk/0.0.78/videosdk.js"></script>
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
                <li><a href="announcements.php"><i class="fas fa-bullhorn"></i>&nbsp; Announcements</a></li>
               
                <li><a href="MyClasses.php" class="active"><i class="fas fa-chalkboard-teacher"></i>&nbsp; My Classes</a></li>
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
        <h1>My Classes</h1>
    </script>
        <?php $query = mysqli_query($link,"select * from teacher_class
			LEFT JOIN class ON class.grade_id = teacher_class.grade_id
			LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
			where teacher_id = '$session_id' ")or die(mysqli_error());
			$count = mysqli_num_rows($query);
										
				if ($count > 0){?>
                    <div class="panels">
                        <div class="panel8">
                        <form method='post'>

                        <table border="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Class Name</th>
                            <th>Grade</th>
                            <th>Subject</th>
                            <th>Number of Students</th>
                            <th>More Details</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
        <?php
				while($row = mysqli_fetch_array($query)){
				$id = $row['teacher_class_id'];
				
		?>
            
                        <tr>
                            <td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
                            <td><?php echo $row['class_name']; ?></td>
                            <td><?php echo $row['grade_name']; ?></td>
                            <td><?php echo $row['subject_title']; ?></td>
                            <td><?php echo $row['noofparticipant']; ?></td>
                            <td><a href="MyClasses1.php?teacher_class_id=<?php echo $id; ?>" style="text-decoration:none;color:white;"><button type='button' class="button1">More</button></a></td>
                            <td><a href="edit_class.php?teacher_class_id=<?php echo $id; ?>" style="text-decoration:none;color:white;">
                            <button type='button' class="button1">Edit</button></a></td>
                        </tr>
                    </tbody>
				
                </div>
            </div>
    </div>
					<?php //include("delete_class_modal.php"); ?>
						<?php } }else{ ?>
                            <h3>No Class Currently Added</h3>
					<?php  } ?>

                   
                        <div class="but">
                
                            <button class="btn btn-info">
                            <a href="add_class.php" style='text-decoration:none;color:white;'>
                                <i class="fa fa-fw fa-plus"></i>&nbsp;Add Class</a>
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
                         $result = mysqli_query($link,"DELETE from teacher_class
                         where teacher_class_id='$id[$i]'");
                     }
             ?>
                 <script>
                     window.location = "MyClasses.php";
                 </script>
             
             <?php
                 }
             ?>
