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
			<?php include 'dropdown.php'; ?>

	<button><a href="ExamResults.php">Go to Dashboard</a></button>
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
									 $query = mysqli_query($link,"select * from teacher_class
                                     LEFT JOIN class ON class.grade_id = teacher_class.grade_id
                                     LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                     where teacher_id = '$session_id'")or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)){ $id = $row['teacher_class_id'];
                                        $class_id = $row['teacher_class_id'];
								?>
									<option value="<?php echo $class_id; ?>"><?php echo $row['class_name']; ?></option>
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
                            
                            
                            $query = mysqli_query($link,"select * from exam_results where subject_id = '$subject_id' and class_id = '$class_id' and teacher_id = '$session_id' ")or die(mysqli_error());
                            $count = mysqli_num_rows($query);
                            if ($count > 0){ 
                            echo "true";
                        }else{
                            
                            mysqli_query($link,"insert into exam_results (teacher_id,subject_id,class_id) values('$session_id','$subject_id','$class_id')")or die(mysqli_error());

                            $exam_results = mysqli_query($link,"select * from exam_results order by exam_id DESC")or die(mysqli_error($link));
                            $teacher_row = mysqli_fetch_array($exam_results);
                            $teacher_id = $teacher_row['exam_id'];


                            /*$insert_query = mysqli_query($link,"select * from student where class_id = '$class_id'")or die(mysqli_error());
                            while($row = mysqli_fetch_array($insert_query)){
                            $id = $row['student_id'];
                            mysqli_query($conn,"insert into exam_results_student (teacher_id,student_id,exam_results_id) value('$session_id','$id','$teacher_id')")or die(mysqli_error());
                            echo "yes";*/
                            }
                            ?>
                            <script>
                                window.location = 'ExamResults.php';
                            </script>
                            
                    <?php
                        }
					?>

       

        <?php
            
        ?>