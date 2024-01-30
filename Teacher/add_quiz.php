<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
		
		<button type="submit" name="delete" class="btn btn-info">
					<i class="fa fa-fw fa-trash"></i> Delete
				</button>
	
	
		<h2>Class List</h2>
		<table id="table1">
			
				<tr>
					<th></th>
					<th>Quiz title</th>
					<th>Description</th>
					<th>Date Added</th>
					<th>Questions</th>
					<th></th>
				</tr>

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
			
				
				<!-- Populate this section with class and subject data -->
				<tr>
					<td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
					<td><?php echo $row['quiz_title']; ?></td>
					<td><?php echo $row['quiz_description']; ?></td>
					<td><?php echo $row['date_added']; ?></td>
					<td><a href="quiz_question.php">Questions</a></td>
					<td><a href="edit_quiz.php<?php echo '?id='.$id; ?>" class="btn btn-info"><i class="fa fa-fw fa-pencil"></i></a></td>
				</tr>
				<?php
					}
				}
				?>
				
				
			
		</table>

			</form>
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
        window.location = "add_quiz.php";
    </script>

<?php
    }
?>