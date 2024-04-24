<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>
<?php
if(isset($_GET['exam_id'])) {
    $exam_id = $_GET['exam_id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./CSS/FirstPage.css">
    <link rel="stylesheet" href="./CSS/ResultAnalysis.css">
    <link rel="stylesheet" href="./CSS/resultanalysischarts.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Latest FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.css" integrity="sha384-LiWsxj4vMfsO8uyNnTVqSfeLqqkKD2pwWqFnSa6UqVqwKn9FlnNy5wKb3bYxs84p" crossorigin="anonymous">
</head>
<body>
<?php include 'dropdown.php'; ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="./IMG/logo1.png" alt="Logo">
        </div>
        <hr color="white">
        <nav>
            <ul>
            <li><a href="FirstPage.php"><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a></li>
                <li><a href="announcements.php"><i class="fas fa-tachometer-alt"></i>&nbsp; Announcements</a></li>
                
                <li><a href="MyClasses.php"><i class="fas fa-chalkboard-teacher"></i>&nbsp; My Classes</a></li>
                <li><a href="Schedule.php"><i class="fas fa-calendar-alt"></i>&nbsp; Schedule</a></li>
                <li><a href="StudyMeterials.php"><i class="fas fa-book"></i>&nbsp; Study Materials</a></li>
                <li><a href="Attendance.php"><i class="fas fa-check-circle"></i>&nbsp; Attendance</a></li>
                <li><a href="ExamResults.php" class="active"><i class="fas fa-poll"></i>&nbsp; Exam Results</a></li>
                <li><a href="Messages.php"><i class="fas fa-envelope"></i>&nbsp;Messages</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i>&nbsp;Feedback</a></li>
            </ul>
        </nav>
    </div>

    <div class="content">
        <!-- Your page content goes here -->
		<h1>Exam Results</h1>

		<form method="post" action="">
				<?php
					$query = mysqli_query($link, "SELECT * FROM result_files 
                    WHERE teacher_id = '$session_id' 
                    AND exam_id = '$exam_id' 
                    ORDER BY fdatein DESC") 
                    or die(mysqli_error());
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
					$query = mysqli_query($link, "SELECT result_files.*, teacher_class.class_name 
                    FROM result_files 
                    INNER JOIN teacher_class ON result_files.class_id = teacher_class.teacher_class_id 
                    INNER JOIN class ON class.grade_id = teacher_class.grade_id 
                    WHERE teacher_class.teacher_id = '$session_id' 
                    AND result_files.exam_id = '$exam_id'
                    ORDER BY result_files.fdatein DESC") or die(mysqli_error($link));
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
			<a href="add_resultanalysis.php?exam_id=<?php echo $exam_id; ?>" style='text-decoration:none;color:white;'>
				<i class="fa fa-fw fa-plus"></i>&nbsp;Add Result</a>
			</button>
			<button type="submit" name="delete" class="btn btn-info">
				<i class="fa fa-fw fa-trash"></i> Delete
			</button>
			
		</div>
		</form>

        <div class="charts">

        
        <div class="charts-card">
            <h2 class="chart-title" style="color: white;">Analysis of Overall Grades</h2>
            <div id="bar-chart"></div>
          </div>

          <div class="charts-card">
            <h2 class="chart-title" style="color: white;">Pass and Fail Rates</h2>
            <div id="pie-chart"></div>
          </div>

        </div>
	</div>

    
	
</body>
</html>

<?php
    include '../database/db_con.php';

    if(isset($_POST['delete'])){
        $exam_id = $_GET['exam_id'];
        $id = $_POST['selector'];
        $N = count($id);
        
        for($i = 0; $i < $N; $i++) {
            $result = mysqli_query($link, "DELETE FROM result_files WHERE file_id='$id[$i]' AND exam_id='$exam_id'");
        }
?>
    <script>
        window.location = "ResultAnalysis.php?exam_id=<?php echo $id; ?>";
    </script>

<?php
    }
?>


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
<script src="js/resultanalytics.js"></script>
</body>
</html>