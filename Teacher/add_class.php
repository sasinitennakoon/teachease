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
                <form method="post">
                
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

</body>

</html>


		

                    <?php
						if (isset($_POST['save'])){
                            $session_id = $_POST['session_id'];
                            $subject_id = $_POST['subject_id'];
                            $grade_id = $_POST['grade_id'];
                            $class_name= $_POST['class_name'];
                            $noofparticipant = $_POST['noofparticipant'];
                            
                            $query = mysqli_query($link,"select * from teacher_class where class_name='$class_name' and subject_id = '$subject_id' and grade_id = '$grade_id' and teacher_id = '$session_id' ")or die(mysqli_error());
                            $count = mysqli_num_rows($query);
                            if ($count > 0){ 
                            echo "true";
                        }else{
                            
                            mysqli_query($link, "INSERT INTO teacher_class (class_name, teacher_id, subject_id, grade_id) VALUES ('$class_name', '$session_id', '$subject_id', '$grade_id')") or die(mysqli_error($link));


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