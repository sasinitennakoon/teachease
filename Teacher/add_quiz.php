<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

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
		<h1>Add Quiz</h1>

        <div class="panels1">
            <div class="panel10">
                <form id="add_downloadable" method="post" enctype="multipart/form-data">
                
                <div class="user-details">

                    <div class="input-box">
                        <span class="details">Quiz Title</span>
                        <input type="text" name="title" placeholder="Enter Quiz Title" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Quiz Description</span>
                        <input type="text" name="description" placeholder="Enter Description" required>
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
	if(isset($_POST['save']))
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