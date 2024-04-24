<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>
<?php $get_id = $_GET['id']; ?>

<?php 
	$query= mysqli_query($link,"select * from users where user_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>

    <link rel="stylesheet" href="./css/subjectslist.css">
</head>

	

<body>
		<?php include 'dropdown1.php'; ?>
		
	<button><a href="term1.php"><i class='fa fa-fw fa arrow-left'></i>Go to Dashboard</a></button>
	<div class="content">
		<h1>Edit Student Marks</h1>

        <div class="panels1">
            <div class="panel10">
                <form method="post">
                <?php
                $query = mysqli_query($link,"SELECT marks.*, student.firstname, subject.subject_title,
                                             MAX(student.firstname) AS firstname,
                                             MAX(subject.subject_title) AS subject
                                             FROM marks
                                             INNER JOIN student ON student.student_id = marks.student_id
                                             INNER JOIN subject ON subject.subject_id = marks.subject_id
                                             WHERE marks.term_id = '1' AND marks.student_id = '$get_id'
                                             GROUP BY marks.marks_id; ") or die(mysqli_error());
                $row  = mysqli_fetch_array($query);
    
                
                ?>
                
                    <div class="user-details">

                        <div class="input-box">
                            <span class="details">Student Name</span>
                                        <span><?php echo $row['firstname']; ?></span>
                        </div>

                        <div class="input-box">
                            <span class="details">Science</span>
                            <input type='hidden' name='sc' value='14'>
                            <input type="text" name="science" placeholder="Enter Marks" value='<?php $row['marks'];?>'>
                        </div>

                        <div class="input-box">
                            <span class="details">Maths</span>
                            <input type='hidden' name='ma' value='9'>
                            <input type="text" name="maths" placeholder="Enter Marks" value='<?php $row['marks'];?>'>
                        </div>

                        <div class="input-box">
                            <span class="details">English</span>
                            <input type='hidden' name='eng' value='12'>
                            <input type="text" name="english" placeholder="Enter Marks" value='<?php $row['marks'];?>'>
                        </div>

                        <div class="input-box">
                            <span class="details">History</span>
                            <input type='hidden' name='his' value='11'>
                            <input type="text" name="history" placeholder="Enter Marks" value='<?php $row['marks'];?>'>
                        </div>

                        <div class="input-box">
                            <span class="details">Sinhala</span>
                            <input type='hidden' name='sin' value='16'>
                            <input type="text" name="sinhala" placeholder="Enter Marks" value='<?php $row['marks'];?>'>
                        </div>

                        <div class="input-box">
                            <span class="details">Buddhism</span>
                            <input type='hidden' name='bu' value='15'>
                            <input type="text" name="buddhism" placeholder="Enter Marks" value='<?php $row['marks'];?>'>
                        </div>
                    </div>
                    
                            <button name="update" type="submit" value="update" class="btn btn-info">
                                <i class="fa fa-fw fa-save"></i>&nbsp;Update
                            </button>
                       
                
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php
		if (isset($_POST['save'])){
		$student_id = $_POST['student_id'];
        $science = $_POST['science'];
    $maths = $_POST['maths'];
    $english = $_POST['english'];
    $history = $_POST['history'];
    $sinhala = $_POST['sinhala'];
    $buddhism = $_POST['buddhism'];

   
    mysqli_query($link, "UPDATE marks SET marks = '$science' WHERE subject_id = '14' AND term_id = '1' AND student_id = '$get_id'") or die(mysqli_error($link));
    mysqli_query($link, "UPDATE marks SET marks = '$maths' WHERE subject_id = '9' AND term_id = '1' AND student_id = '$get_id'") or die(mysqli_error($link));
    mysqli_query($link, "UPDATE marks SET marks = '$english' WHERE subject_id = '12' AND term_id = '1' AND student_id = '$get_id'") or die(mysqli_error($link));
    mysqli_query($link, "UPDATE marks SET marks = '$history' WHERE subject_id = '11' AND term_id = '1' AND student_id = '$get_id'") or die(mysqli_error($link));
    mysqli_query($link, "UPDATE marks SET marks = '$sinhala' WHERE subject_id = '16' AND term_id = '1' AND student_id = '$get_id'") or die(mysqli_error($link));
    mysqli_query($link, "UPDATE marks SET marks = '$buddhism' WHERE subject_id = '15' AND term_id = '1' AND student_id = '$get_id'") or die(mysqli_error($link));
    
		
	?>
    
		<script>
 		window.location = 'term1.php';
		</script>

		<?php
		    }
		?>

