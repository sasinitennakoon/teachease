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
    
    

	
	<button><a href="StudyMeterials.php">Go to Dashboard</a></button>
	<div class="content">
		<h1>Quiz</h1>

		<form method="post">
			
				
	
	<div class="panels1">
        <div class="panel10">
		<table>
			<thead>
				<tr>
					<th></th>
					<th>Quiz title</th>
					<th>Description</th>
					<th>Date Added</th>
					<th>Questions</th>
					<!--<th>Edit</th> -->
				</tr>
			<thead>

				<?php
					$sql = "select * from quiz";
					$result = mysqli_query($link,$sql) or die(mysqli_error($link));
					$count = mysqli_num_rows($result);

					if($count <= 0)
					{
						echo "<b>There is no Quiz currently Available</b>";
					}
					else
					{
					while($row = mysqli_fetch_array($result))
					{
						$id = $row['quiz_id'];
				?>
			
				
			<tbody>	<!-- Populate this section with class and subject data -->
				<tr>
					<td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
					<td><?php echo $row['quiz_title']; ?></td>
					<td><?php echo $row['quiz_description']; ?></td>
					<td><?php echo $row['date_added']; ?></td>
					<td><a href="quiz_question.php <?php echo '?id='.$id; ?>" style="text-decoration:none;">Questions</a></td>
					<!--<td><a href="edit_quiz.php <?php //echo '?id='.$id; ?>" class="button"><i class="fa fa-fw fa-pencil">Edit</i></a></td>-->
				</tr>
				<?php
					}
				}
				?>
			</tbody>	
				
			
		</table>

		<div class="but">
			
			<button class="btn btn-info">
			<a href="add_quiz.php" style='text-decoration:none;color:white;'>
				<i class="fa fa-fw fa-plus"></i>&nbsp;Add Quiz</a>
			</button>
			<button type="submit" name="delete" class="btn btn-info">
				<i class="fa fa-fw fa-trash"></i> Delete
			</button>
			
		</div>
		</form>
	</div>

	
</body>
</html>

<?php
    include '../database/db_con.php';

    if (isset($_POST['delete'])){
            $id=$_POST['selector'];
            $N = count($id);
            
        for($i=0; $i < $N; $i++)
        {
            $result = mysqli_query($link,"DELETE FROM quiz where quiz_id='$id[$i]'");
        }
?>
    <script>
        window.location = "view_quiz.php";
    </script>

<?php
    }
?>