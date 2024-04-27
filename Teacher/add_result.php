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
											$query = mysqli_query($link,"SELECT DISTINCT teacher_class.subject_id,subject.subject_id,subject.subject_title
                                             from teacher_class
                                             INNER JOIN subject ON subject.subject_id=teacher_class.subject_id
                                             WHERE teacher_class.teacher_id=$session_id");
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
if (isset($_POST['save'])) {
    $session_id = $_POST['session_id'];
    $subject_id = $_POST['subject_id'];
    $class_id = $_POST['class_id'];

    // Insert the new exam result
    $insert_query = "INSERT INTO exam_results (teacher_id, subject_id, class_id) 
                     VALUES ('$session_id', '$subject_id', '$class_id')";
    mysqli_query($link, $insert_query) or die(mysqli_error($link));

    // Optionally, retrieve the exam_id for the new result
    $exam_results = mysqli_query($link, "SELECT * FROM exam_results ORDER BY exam_id DESC LIMIT 1") or die(mysqli_error($link));
    $exam_row = mysqli_fetch_array($exam_results);
    $exam_id = $exam_row['exam_id'];

    // Insert associated student results, if needed (uncomment and modify as needed)
    /*
    $students_query = mysqli_query($link, "SELECT * FROM student WHERE class_id = '$class_id'") or die(mysqli_error($link));
    while ($row = mysqli_fetch_array($students_query)) {
        $student_id = $row['student_id'];
        mysqli_query($link, "INSERT INTO exam_results_student (teacher_id, student_id, exam_results_id) 
                             VALUES ('$session_id', '$student_id', '$exam_id')") or die(mysqli_error($link));
    }
    */

    echo "Exam result saved successfully.";
    ?>
    <script>
        window.location = 'ExamResults.php';
    </script>
    <?php
}
?>


       

        <?php
            
        ?>