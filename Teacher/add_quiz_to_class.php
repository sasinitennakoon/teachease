<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>
<?php //$get_id = $_GET['id']; ?>

<?php 
	$query= mysqli_query($link,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
	<link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>

    <link rel="stylesheet" href="./CSS/quiz_dashboard.css">
</head>

	

<body>
			<div class="dropdown" style="float:right;">
			  <div class="dropbtn">
              <img src="./IMG/loginicon.png" alt="User Icon">
                <?php echo $row['firstname']; ?>
				<i class="fa fa-caret-down"></i>
                </div>
			  <div class="dropdown-content">
				<a href="MyProfile.php"><i class="fa fa-fw fa-user"></i>Profile</a>
				<a href="ResetPassword.php"><i class="fa fa-fw fa-unlock-alt"></i>Change Password</a>
				<a href="../logout.php"><i class="fa fa-fw fa-sign-out-alt"></i>Log out</a>
			  </div>
			</div>
    
    

	
	<button><a href="view_quiz.php">Go to Dashboard</a></button>
	<div class="content">
		<h1>Add Quiz To Class</h1>

        <div class="panels1">
            <div class="panel10">
                <form method="post">
                
                <div class="user-details">

                    <div class="input-box">
                        <span class="details">Quiz</span>
                        <select name="quiz_id" required>
							<option></option>
								<?php
									$query = mysqli_query($link,"select * from quiz where teacher_id = '$session_id'")or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)){ $id = $row['quiz_id'];
								?>
									<option value="<?php echo $id; ?>"><?php echo $row['quiz_title']; ?></option>
								<?php } ?>
						</select>
                    </div>

                    <div class="input-box">
                        <span class="details">Test Time (in minutes)</span>
                        <input type="text" name="time" placeholder="Enter Test Time" required>
                    </div>
                   
                </div>

                <table>
			<thead>
				<tr>
					<th></th>
					<th>Class</th>
					<th>Subject</th>
					
					
					<!--<th>Edit</th> -->
				</tr>
			<thead>
			<tbody>	<!-- Populate this section with class and subject data --> 
            <?php $query = mysqli_query($link,"select * from teacher_class
					LEFT JOIN class ON class.class_id = teacher_class.class_id
					LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
					where teacher_id = '$session_id'")or die(mysqli_error());
					$count = mysqli_num_rows($query);
										

					while($row = mysqli_fetch_array($query)){
					$id = $row['teacher_class_id'];
					
			?>
				<tr>
					<td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
					<td><?php echo $row['class_name']; ?></td>
					<td><?php echo $row['subject_code']; ?></td>
					
				</tr>
				<?php
					}
				
				?>
			</tbody>	
				
			
		</table>
                    
                            <button name="save" type="submit" value="save" class="btn btn-info">
                                <i class="fa fa-fw fa-save"></i>&nbsp;Save
                            </button>
                       
                
                </form>
            </div>
        </div>
    </div>

</body>

</html>


		

                    <?php
						if (isset($_POST['save'])){
							$quiz_id = $_POST['quiz_id'];
							$time = $_POST['time'] * 60;
							$id=$_POST['selector'];
											
							$name_notification  = 'Add Practice Quiz file';
													
							$N = count($id);
							for($i=0; $i < $N; $i++)
							{
								mysqli_query($link,"insert into class_quiz (teacher_class_id,quiz_time,quiz_id) values('$id[$i]','$time','$quiz_id')")or die(mysqli_error());
								mysqli_query($link,"insert into notification (teacher_class_id,notification,date_of_notification,link) value('$id[$i]','$name_notification',NOW(),'student_quiz_list.php')")or die(mysqli_error());
					} ?>

        <script>
 		    window.location = 'view_quiz.php';
		</script>

        <?php
            }
        ?>