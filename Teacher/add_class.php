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
		<h1>Add Class</h1>

        <div class="panels1">
            <div class="panel10">
                <form method="post">
                
                <div class="user-details">
                <input type="hidden" name="session_id" value="<?php echo $session_id; ?>">
                <div class="input-box">
                        <span class="details">Class name</span>
                        <select name="class_id"  class="" required>
                            <option></option>
								<?php
									$query = mysqli_query($link,"select * from class order by class_name");
									while($row = mysqli_fetch_array($query)){
											
								?>
									<option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
									<?php } ?>
                        </select>
                </div>

                    <div class="input-box">
                        <span class="details">Subject</span>
                        <select name="subject_id" required>
							<option></option>
                            <?php
											$query = mysqli_query($link,"select * from subject order by subject_code");
											while($row = mysqli_fetch_array($query)){
											
											?>
											<option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_title']; ?></option>
											<?php } ?>
						</select>
                    </div>

                
                    <div class="input-box">
                        <span class="details">No of Students</span>
                        <input type="text" name="noofparticipant" placeholder="Enter No.of students" required>
                </div>
                </div>

               
                    
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
                            $session_id = $_POST['session_id'];
                            $subject_id = $_POST['subject_id'];
                            $class_id = $_POST['class_id'];
                            
                            
                            $noofparticipant = $_POST['noofparticipant'];
                            
                            $query = mysqli_query($link,"select * from teacher_class where subject_id = '$subject_id' and class_id = '$class_id' and teacher_id = '$session_id' ")or die(mysqli_error());
                            $count = mysqli_num_rows($query);
                            if ($count > 0){ 
                            echo "true";
                        }else{
                            
                            mysqli_query($link,"insert into teacher_class (teacher_id,subject_id,class_id) values('$session_id','$subject_id','$class_id')")or die(mysqli_error());

                            $teacher_class = mysqli_query($link,"select * from teacher_class order by teacher_class_id DESC")or die(mysqli_error());
                            $teacher_row = mysqli_fetch_array($teacher_class);
                            $teacher_id = $teacher_row['teacher_class_id'];


                            /*$insert_query = mysqli_query($link,"select * from student where class_id = '$class_id'")or die(mysqli_error());
                            while($row = mysqli_fetch_array($insert_query)){
                            $id = $row['student_id'];
                            mysqli_query($conn,"insert into teacher_class_student (teacher_id,student_id,teacher_class_id) value('$session_id','$id','$teacher_id')")or die(mysqli_error());
                            echo "yes";*/
                            }
                            ?>
                            <script>
                                window.location = 'MyClasses.php';
                            </script>
                            
                    <?php
                        }
					?>

       

        <?php
            
        ?>