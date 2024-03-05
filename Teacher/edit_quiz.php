<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>
<?php $get_id = $_GET['id']; ?>

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
   
    <link rel="stylesheet" href="./CSS/quiz_dashboard.css">
</head>

	

<body>
<?php include 'dropdown.php'; ?>
    
			<?php
                $query = mysqli_query($link,"select * from quiz where quiz_id = '$get_id'")or die(mysqli_error());
                $row = mysqli_fetch_array($query);
			?>

	
	<button><a href="view_quiz.php">Go to Dashboard</a></button>
	<div class="content">
		<h1>Add Quiz</h1>

        <div class="panels1">
            <div class="panel10">
                <form id="add_downloadable" method="post" enctype="multipart/form-data">
                
                <div class="user-details">

                    <div class="input-box">
                        <span class="details">Quiz Title</span>
                        <input type="text" name="title" placeholder="Enter Quiz Title" value="<?php echo $row['quiz_title']; ?>" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Quiz Description</span>
                        <input type="text" name="description" placeholder="Enter Description" value="<?php echo $row['quiz_description']; ?>" required>
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
	if(isset($_POST['update']))
	{
		$title = $_POST['title'];
		$description = $_POST['description'];

		$sql = mysqli_query($link,"insert into quiz(quiz_title,quiz_description,date_added,teacher_id) values('$title','$description',NOW(),'$session_id')") or die(mysqli_error($link));
		?>

		<script>
			window.location="view_quiz.php";
		</script>

		<?php
	}
?>