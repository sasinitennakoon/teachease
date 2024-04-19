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

	<button><a href="Schedule.php">Go to Dashboard</a></button>
	<div class="content">
		<h1>Add Class Schedule</h1>

        <div class="panels1">
            <div class="panel10">
                <form method="post">

                <div class="user-details">
                <input type="hidden" name="session_id" value="<?php echo $session_id; ?>">
                
                <div class="input-box">
                        <span class="details">Class</span>
                        <select name="class_id" required>
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
                        <span class="details">Date</span>
                            <select name="date" required>
                            <option value=""></option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                        </select>
                    </div>


                    <div class="input-box">
                        <span class="details"> Time</span>
                        <input type="text" name="time" placeholder="Enter Class Start Time->(Format) HH:MM:SS" required>
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
                            $date= $_POST['date'];
                            $time = $_POST['time'];
                            
                            $query = mysqli_query($link,"select * from schedule where subject_id = '$subject_id' and class_id = '$class_id' and teacher_id = '$session_id' and date = '$date' and time = '$time'")or die(mysqli_error());
                            $count = mysqli_num_rows($query);
                            if ($count > 0){ 
                            echo "true";
                        }else{
                            
                            mysqli_query($link, "INSERT INTO schedule (teacher_id, subject_id, class_id,date, time) VALUES ('$session_id', '$subject_id', '$class_id','$date','$time' )") or die(mysqli_error($link));


                            $schedule = mysqli_query($link,"select * from schedule order by schedule_id DESC")or die(mysqli_error($link));
                            $schedule_row = mysqli_fetch_array($schedule);
                            $schedule_id = $teacher_row['schedule_id'];


                            /*$insert_query = mysqli_query($link,"select * from student where class_id = '$class_id'")or die(mysqli_error());
                            while($row = mysqli_fetch_array($insert_query)){
                            $id = $row['student_id'];
                            mysqli_query($conn,"insert into teacher_class_student (teacher_id,student_id,teacher_class_id) value('$session_id','$id','$teacher_id')")or die(mysqli_error());
                            echo "yes";*/
                            }
                            ?>
                            <script>
                                window.location = 'Schedule.php';
                            </script>
                            
                    <?php
                        }
					?>

       

        <?php
            
        ?>