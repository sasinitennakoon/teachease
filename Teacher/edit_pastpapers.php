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

        <div class="panels1">
        <div class="panel10">
		<form method="post" action="">
				<?php
					$query = mysqli_query($link,"select * FROM pastpapers where teacher_id = '$session_id'  order by fdatein DESC ")or die(mysqli_error());
                    $count = mysqli_fetch_array($query);

					if($count <= 0)
					{
						echo "<b>Currently you did not upload any documents</b>";
					}
					else
					{?>
					
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
			<thead>
				<?php
					$query = mysqli_query($link, "SELECT pastpapers.*, teacher_class.class_name 
                    FROM pastpapers 
                    INNER JOIN teacher_class ON pastpapers.class_id = teacher_class.teacher_class_id 
                    WHERE teacher_class.teacher_id = '$session_id' 
                    ORDER BY pastpapers.fdatein DESC") or die(mysqli_error($link));
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
                    <!--<td width="40">
						 <a  data-placement="bottom" title="Download" id="<?php echo $id; ?>download" href="<?php echo $row['floc']; ?>"><i class="fa fa-fw fa-download"></i></a>
						 
                    </td>-->
                    <td><a href="edit_document1.php <?php echo '?id='.$id; ?>" style="text-decoration:none;">Edit</a></td>
					
                   
					
				</tr>
				<?php
					}
				}
				?>
			</tbody>	
				
			
		</table>

		
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
            $result = mysqli_query($link,"DELETE FROM pastpapers where file_id='$id[$i]'");
        }
?>
    <script>
        window.location = "view_document.php";
    </script>

<?php
    }
?>

