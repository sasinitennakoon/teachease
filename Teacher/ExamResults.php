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
                
                <li><a href="MyClasses.php"><i class="fas fa-chalkboard-teacher"></i>&nbsp; My Classes</a></li>
                <li><a href="Schedule.php"><i class="fas fa-calendar-alt"></i>&nbsp; Schedule</a></li>
                <li><a href="StudyMeterials.php"><i class="fas fa-book"></i>&nbsp; Study Materials</a></li>
                <li><a href="Attendance.php"><i class="fas fa-check-circle"></i>&nbsp; Attendance</a></li>
                <li><a href="ExamResults.php" class="active"><i class="fas fa-poll"></i>&nbsp; Exam Results</a></li>
                <li><a href="Messages.php"><i class="fas fa-envelope"></i>&nbsp;Messages</a></li>
                <li><a href="Payment.php"><i class="fas fa-credit-card"></i>&nbsp;Payments</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i>&nbsp;Feedback</a></li>
            </ul>
        </nav>
    </div>
    <div class="content">
        <!-- Your page content goes here -->
        <h1>Exam Results</h1>
        <?php $query = mysqli_query($link,"select * from exam_results
			LEFT JOIN teacher_class ON teacher_class.teacher_class_id = exam_results.class_id
			LEFT JOIN subject ON subject.subject_id = exam_results.subject_id
			where exam_results.teacher_id = '$session_id' ")or die(mysqli_error($link));
			$count = mysqli_num_rows($query);
										
				if ($count > 0){?>
                    <div class="panels">
                        <div class="panel8">
                        <form method='post'>

                        <table border="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Exam No</th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>More Details</th>
                        </tr>
                    </thead>
                    <tbody>
        <?php
				while($row = mysqli_fetch_array($query)){
				$id = $row['exam_id'];
				
		?>
            
                        <tr>
                            <td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
                            <td><?php echo $row['exam_id']; ?></td>
                            <td><?php echo $row['class_name']; ?></td>
                            <td><?php echo $row['subject_title']; ?></td>
                            <td><a href="ResultAnalysis.php?exam_id=<?php echo $id; ?>" style="text-decoration:none;color:white;"><button type='button' class="button1">More</button></a></td>
                        </tr>
                    </tbody>
				
                </div>
            </div>
    </div>
					<?php //include("delete_class_modal.php"); ?>
						<?php } }else{ ?>
                            <h3>No Results Currently Added</h3>
					<?php  } ?>

                   
                        <div class="but">
                
                            <button class="btn btn-info">
                            <a href="add_result.php" style='text-decoration:none;color:white;'>
                                <i class="fa fa-fw fa-plus"></i>&nbsp;Add Results</a>
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
                         $result = mysqli_query($link,"DELETE from exam_results
                         where exam_id='$id[$i]'");
                     }
             ?>
                 <script>
                     window.location = "ExamResults.php";
                 </script>
             
             <?php
                 }
             ?>
