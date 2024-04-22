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
	<link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   
    <link rel="stylesheet" href="./css/subjectslist.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="../ckeditor/ckeditor.js"></script>
</head>

	

<body>
			
    
			<?php
                $query = mysqli_query($link,"select * from subject where subject_id = '$get_id'")or die(mysqli_error());
                $row = mysqli_fetch_array($query);
			?>

	
	<button><a href="subjectlist.php">Go to Dashboard</a></button>
	<div class="content">
		<h1>Edit Subject</h1>

        <div class="panels1">
            <div class="panel10">
                <form method="post">
                
                <div class="user-details">

                    <div class="input-box">
                        <span class="details">Subject Code</span>
                        <input type="text" name="subject_code" placeholder="Enter Subject Code" value="<?php echo $row['subject_code']; ?>" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Subject  Title</span>
                        <input type="text" name="subject_title" placeholder="Enter Subject Title" value="<?php echo $row['subject_title']; ?>" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Description</span>
                        <textarea name="description" id="ckeditor_full" required><?php echo $row['description']; ?></textarea>
                        <script>
                            CKEDITOR.replace( 'ckeditor_full' );
                        </script>
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
        $code = $_POST['subject_code'];
		$title = $_POST['subject_title'];
		$description = $_POST['description'];

		$sql = mysqli_query($link,"update subject set subject_code='$code',subject_title='$title',description='$description' where subject_id='$get_id' ") or die(mysqli_error($link));
		?>

		<script>
			window.location="subjectlist.php";
		</script>

		<?php
	}
?>