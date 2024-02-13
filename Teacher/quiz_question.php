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
		<h1>Quiz Question</h1>

		<form method="post">
			
        <?php
				$query = mysqli_query($link,"select * FROM quiz_question
				LEFT JOIN question_type on quiz_question.question_type_id = question_type.question_type_id
				where quiz_id = '$get_id'  order by date_added DESC ")or die(mysqli_error());
                $count = mysqli_num_rows($query);

                if($count <= 0)
                {
                    echo "<h3>There is no Quiz Questions Currently Available</h3>";
                }
                else
                {
				while($row = mysqli_fetch_array($query)){
				$id  = $row['quiz_question_id'];
			?>  
	
	<div class="panels1">
        <div class="panel10">
		<table>
			<thead>
				<tr>
					<th></th>
					<th>Question Text</th>
					<th>Question Type</th>
					<th>Answer</th>
					<th>Date Added</th>
					<!--<th>Edit</th> -->
				</tr>
			<thead>
			<tbody>	<!-- Populate this section with class and subject data -->

           
				<tr>
					<td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
					<td><?php echo $row['question_text']; ?></td>
					<td><?php echo $row['question_type']; ?></td>
					<td><?php echo $row['answer']; ?></td>
					<td><?php echo $row['date_added']; ?></td> 
					<td><a href="quiz_question.php <?php echo '?id='.$id; ?>" style="text-decoration:none;">Questions</a></td>
					<td><a href="edit_question.php <?php echo '?id='.$get_id; ?>&<?php echo 'quiz_question_id='.$id; ?>" class="button"><i class="fa fa-fw fa-pencil">Edit</i></a></td>
				</tr>
				<?php
					}
                }
            
				?>
			</tbody>	
				
			
		</table>

		<div class="but">
			
			<button class="btn btn-info">
			<a href="add_question.php <?php echo '?id='.$get_id; ?>" style='text-decoration:none;color:white;'>
				<i class="fa fa-fw fa-plus"></i>&nbsp;Add Questions</a>
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
        window.location = "quiz_question.php";
    </script>

<?php
    }
?>