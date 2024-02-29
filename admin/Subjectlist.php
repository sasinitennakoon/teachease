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
    <link rel="stylesheet" href="./css/subjectslist.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Latest FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.css" integrity="sha384-LiWsxj4vMfsO8uyNnTVqSfeLqqkKD2pwWqFnSa6UqVqwKn9FlnNy5wKb3bYxs84p" crossorigin="anonymous">
</head>
<body>
    <div class="user-info">
        
    </div>
    <button><a href="Subjects.php">Go to Dashboard</a></button>
    <div class="content">
        <!-- Your page content goes here -->
        <h1>Subject List</h1>
        
        
            <form method="post">
				<?php
					$query = mysqli_query($link,"select * FROM subject")or die(mysqli_error());
                    $count = mysqli_fetch_array($query);

					if($count <= 0)
					{
						echo "<b>Currently There is no Subjects Available</b>";
					}
					else
					{?>
					<div class="panels1">
                        <div class="panel10">
						<table>
							<thead>
								<tr>
									<th></th>
									<th>Subject Code</th>
									<th>Subject Title</th>
									<th>Description</th>
									<th></th>
					<!--<th>Edit</th> -->
				</tr>
			<thead>
				<?php
                $query = mysqli_query($link,"select * FROM subject")or die(mysqli_error());
                    while($row = mysqli_fetch_array($query)){
                    $id  = $row['subject_id'];
				?>
			
				
			<tbody>	<!-- Populate this section with class and subject data -->
				<tr>
					<td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
					<td><?php echo $row['subject_code']; ?></td>
					<td><?php echo $row['subject_title']; ?></td>
					<td><?php echo $row['description']; ?></td>
                    
                    <!--<td width="40">
						 <a  data-placement="bottom" title="Download" id="<?php// echo $id; ?>download" href="<?php //echo $row['floc']; ?>"><i class="fa fa-fw fa-download"></i></a>
						 
                    </td>-->
                    <td><a href="edit_subject.php <?php echo '?id='.$id; ?>" style="text-decoration:none;">Edit</a></td>
					
                   
					
				</tr>
				<?php
					}
				}
				?>
			</tbody>	
				
			
		</table>

		<div class="but">
			<button type="submit" name="delete" class="btn btn-info">
				<i class="fa fa-fw fa-trash"></i> Delete
			</button>
		</div>
		</form>
            </div>
        </div>
                
           
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
            $result = mysqli_query($link,"DELETE FROM subject where subject_id='$id[$i]'");
        }
?>
    <script>
        window.location = "subjectlist.php";
    </script>

<?php
    }
?>
