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
    <title>Document</title>
	<link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   
    <link rel="stylesheet" href="./CSS/quiz_dashboard.css">
</head>

	

<body>
<?php include 'dropdown.php'; ?>
	<button><a href="StudyMeterials.php">Go to Dashboard</a></button>
	<div class="content">
		<h1>Documents</h1>

		<form method="post" action="">
				<?php
					$query = mysqli_query($link,"select * FROM files where teacher_id = '$session_id'  order by fdatein DESC ")or die(mysqli_error());
                    $count = mysqli_fetch_array($query);

					if($count <= 0)
					{
						echo "<b>Currently you did not upload any documents</b>";
					}
					else
					{?>
					<div class="panels1">
        				<div class="panel10">
						<table>
			<thead>
				<tr>
					<th></th>
					<th>Date Upload</th>
					<th>File name</th>
					<th>Description</th>
					<th>Uploaded by</th>
                    <th>Class Name</th>
                    <th></th>
					<!--<th>Edit</th> -->
				</tr>
					</thead>

				<?php
					$query = mysqli_query($link, "SELECT files.*, class.class_name 
                    FROM files 
                    INNER JOIN teacher_class ON files.class_id = teacher_class.class_id 
                    INNER JOIN class ON class.class_id = teacher_class.class_id 
                    WHERE teacher_class.teacher_id = '$session_id' 
                    ORDER BY files.fdatein DESC") or die(mysqli_error($link));
                    while($row = mysqli_fetch_array($query)){
                    $id  = $row['file_id'];
				?>
			
				
			<tbody>	<!-- Populate this section with class and subject data -->
				<tr>
					<td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
					<td><?php echo $row['fdatein']; ?></td>
					<td><?php echo $row['fname']; ?></td>
					<td><?php echo $row['fdesc']; ?></td>
                    <td><?php echo $row['uploaded_by']; ?></td>
                    <td><?php echo $row['class_name']; ?></td>
                    <td width="40">
					<a  data-placement="bottom" title="Download" id="<?php echo $id; ?>download" href="<?php echo $row['floc']; ?>"><i class="fa fa-fw fa-download"></i></a>
						 
                    </td>
					
                    <script type="text/javascript">
						$(document).ready(function(){
						$('#<?php echo $id; ?>download').tooltip('show');
						$('#<?php echo $id; ?>download').tooltip('hide');
						});
					</script>
					
				</tr>
				<?php
					}
				}
				?>
			</tbody>	
				
			
		</table>

		<div class="but">
			
			<button class="btn btn-info">
			<a href="add_document.php" style='text-decoration:none;color:white;'>
				<i class="fa fa-fw fa-plus"></i>&nbsp;Add Document</a>
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
            $result = mysqli_query($link,"DELETE FROM files where file_id='$id[$i]'");
        }
?>
    <script>
        window.location = "view_document.php";
    </script>

<?php
    }
?>

