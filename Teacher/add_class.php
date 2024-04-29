<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>
<?php
						if (isset($_POST['save'])){

                            $errmsg_arr = array();
                            $errflag = false;
                            $session_id = $_POST['session_id'];
                            $subject_id = $_POST['subject_id'];
                            $grade_id = $_POST['grade_id'];
                            $class_name= $_POST['class_name'];
                            $noofparticipant = $_POST['noofparticipant'];
                            
                            $query = mysqli_query($link,"select * from teacher_class where class_name='$class_name' and subject_id = '$subject_id' and grade_id = '$grade_id' and teacher_id = '$session_id' ")or die(mysqli_error());
                            $count = mysqli_num_rows($query);
                            if ($count > 0){ 
                                echo "<script>alert(class already exist);</script>";
                        }else{
                            if ($no_of_participants < 0) {
                                $errmsg_arr[] = 'Number of participants cannot be negative';
                                $errflag = true;
                            } elseif ($no_of_participants > 20) {
                                $errmsg_arr[] = 'Maximum number of participants is 20';
                                $errflag = true;
                            }

                            if ($errflag) {
                                // Display errors, redirect back, or handle as needed
                                foreach ($errmsg_arr as $error) {
                                    echo $error . '<br>';  // For example, print errors
                                }
                                exit();
                            } else {

                                mysqli_query($link, "INSERT INTO teacher_class (class_name, teacher_id, subject_id, grade_id) VALUES ('$class_name', '$session_id', '$subject_id', '$grade_id')") or die(mysqli_error($link));
                                $teacher_class = mysqli_query($link,"select * from teacher_class order by teacher_class_id DESC")or die(mysqli_error());
                                $teacher_row = mysqli_fetch_array($teacher_class);
                                $teacher_id = $teacher_row['teacher_class_id'];
                            }
                        
                            
                            


                            
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
	<link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>

    <link rel="stylesheet" href="./CSS/quiz_dashboard.css">
</head>

	

<body>
			<?php include 'dropdown.php'; ?>

	<button><a href="MyClasses.php">Go to Dashboard</a></button>
	<div class="content">
		<h1>Add Class</h1>

        <div class="panels1">
            <div class="panel10">
                <form method="post" onsubmit="return validateForm();">
                
                <div class="user-details">
                <input type="hidden" name="session_id" value="<?php echo $session_id; ?>">
                <div class="input-box">
                        <span class="details">Class Name</span>
                        <input type="text" name="class_name" placeholder="Enter Class Name" required>
                </div>
                <div class="input-box">
                        <span class="details">Grade</span>
                        <select name="grade_id"  class="" required>
                            <option></option>
								<?php
									$query = mysqli_query($link,"select * from class order by grade_name");
									while($row = mysqli_fetch_array($query)){
											
								?>
									<option value="<?php echo $row['grade_id']; ?>"><?php echo $row['grade_name']; ?></option>
									<?php } ?>
                        </select>
                </div>

                <div class="input-box">
                    <span class="details">Subject</span>
                    <select name="subject_id" required>
                    <option></option>
                    <?php
                    $query = mysqli_query($link, "SELECT subject.*
                                       FROM subject 
                                       INNER JOIN teacher ON teacher.subject= subject.subject_title
                                       WHERE teacher.teacher_id = '$session_id'
                                       ORDER BY subject.subject_id");
                    while ($row = mysqli_fetch_array($query)) {
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

<script>
function validateForm() {
  // Collect field values
  var className = document.querySelector('input[name="class_name"]').value.trim();
  var gradeId = document.querySelector('select[name="grade_id"]').value.trim();
  var subjectId = document.querySelector('select[name="subject_id"]').value.trim();
  var noOfParticipants = document.querySelector('input[name="noofparticipant"]').value.trim();

  if (className === '' || gradeId === '' || subjectId === '' || noOfParticipants === '') {
    alert('Please fill in all required fields');
    return false;
  }
  // Check if the class name is empty
  if (className === '') {
    alert('Please fill in the Class Name');
    return false;
  }

  // Check if the grade is empty
  if (gradeId === '') {
    alert('Please select a Grade');
    return false;
  }

  // Check if the subject is empty
  if (subjectId === '') {
    alert('Please select a Subject');
    return false;
  }

  // Check if the number of participants is empty
  if (noOfParticipants === '') {
    alert('Please enter the Number of Participants');
    return false;
  }

  // Validate the number of participants
  var participantNumber = parseInt(noOfParticipants, 10);
  if (isNaN(participantNumber)) {
    alert('Number of participants must be a valid number');
    return false;
  }

  if (participantNumber < 0) {
    alert('Number of participants cannot be negative');
    return false;
  }

  if (participantNumber > 20) {
    alert('Maximum number of participants is 20');
    return false;
  }

  // If all checks pass
  return true;
}
</script>



</body>

</html>


		

                   