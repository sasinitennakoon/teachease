<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>


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
		<h1>Add Student Marks</h1>

        <div class="panels1">
            <div class="panel10">
                <form method="post">
                
                    <div class="user-details">

                        <div class="input-box">
                            <span class="details">Student Name</span>
                                    <select name="student_id" required>
                                        <option></option>
                                                <?php
                                                $query = mysqli_query($link, "SELECT student.*
                                                                FROM student            
                                                                WHERE status = 'registered'");
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                        <option value="<?php echo $row['student_id']; ?>"><?php echo $row['firstname']; ?></option>
                                    <?php } ?>
                                    </select>
                        </div>

                        <div class="input-box">
                            <span class="details">Science</span>
                            <input type='hidden' name='sc' value='14'>
                            <input type="text" name="science" placeholder="Enter Marks" required>
                        </div>

                        <div class="input-box">
                            <span class="details">Maths</span>
                            <input type='hidden' name='ma' value='9'>
                            <input type="text" name="maths" placeholder="Enter Marks" required>
                        </div>

                        <div class="input-box">
                            <span class="details">English</span>
                            <input type='hidden' name='eng' value='12'>
                            <input type="text" name="english" placeholder="Enter Marks" required>
                        </div>

                        <div class="input-box">
                            <span class="details">History</span>
                            <input type='hidden' name='his' value='11'>
                            <input type="text" name="history" placeholder="Enter Marks" required>
                        </div>

                        <div class="input-box">
                            <span class="details">Sinhala</span>
                            <input type='hidden' name='sin' value='16'>
                            <input type="text" name="sinhala" placeholder="Enter Marks" required>
                        </div>

                        <div class="input-box">
                            <span class="details">Buddhism</span>
                            <input type='hidden' name='bu' value='15'>
                            <input type="text" name="buddhism" placeholder="Enter Marks" required>
                        </div>
                    </div>
                    
                            <button name="save" type="submit" value="save" class="btn btn-info">
                                <i class="fa fa-fw fa-save"></i>&nbsp;Add
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

    $average = ($science + $maths + $english + $history + $sinhala + $buddhism) / 6;

    $query = mysqli_query($link,"INSERT INTO marks (student_id, subject_id, term_id, marks) VALUES ('$student_id', '14', '1', '$science')") or die(mysqli_error($link));
    mysqli_query($link,"INSERT INTO marks (student_id, subject_id, term_id, marks) VALUES ('$student_id', '9', '1', '$maths')") or die(mysqli_error($link));
    mysqli_query($link,"INSERT INTO marks (student_id, subject_id, term_id, marks) VALUES ('$student_id', '12', '1', '$english')") or die(mysqli_error($link));
    mysqli_query($link,"INSERT INTO marks (student_id, subject_id, term_id, marks) VALUES ('$student_id', '11', '1', '$history')") or die(mysqli_error($link));
    mysqli_query($link,"INSERT INTO marks (student_id, subject_id, term_id, marks) VALUES ('$student_id', '16', '1', '$sinhala')") or die(mysqli_error($link));
    mysqli_query($link,"INSERT INTO marks (student_id, subject_id, term_id, marks) VALUES ('$student_id', '15', '1', '$buddhism')") or die(mysqli_error($link));
		
	mysqli_query($link,"INSERT INTO average (student_id,average_marks,term_id) VALUES ('$student_id','$average','1')") or die(mysqli_error($link));
		
	?>
    
		<script>
 		window.location = 'term1.php';
		</script>

		<?php
		    }
		?>

