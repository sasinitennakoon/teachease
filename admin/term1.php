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
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>

    <link rel="stylesheet" href="./css/subjectslist.css">
</head>

	

<body>
		<?php include 'dropdown1.php'; ?>
		
	<button><a href="RankingSystem.php"><i class='fa fa-fw fa arrow-left'></i>Go to Dashboard</a></button>
	<div class="content">
		<h1>Student Marks For Term 1</h1>

        <div class="panels1">
            <div class="panel10">
            <form method='post' onsubmit="return confirmDelete()">
            
            <?php
                $query = mysqli_query($link,"SELECT marks.*, student.firstname, subject.subject_title,
                                             MAX(student.firstname) AS firstname,
                                             MAX(subject.subject_title) AS subject
                                             FROM marks
                                             INNER JOIN student ON student.student_id = marks.student_id
                                             INNER JOIN subject ON subject.subject_id = marks.subject_id
                                             WHERE term_id = '1'
                                             GROUP BY marks.marks_id; ") or die(mysqli_error());
                $count  = mysqli_num_rows($query);
    
                if($count > 0)
                {?>
    
            
                
                        <table border="0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Student</th>
                                    <th>Subject</th>
                                    <th>Marks</th>
                                    <!--<th></th> -->
                                </tr>
                            </thead>
                        <tbody>
                        <?php
                        while($row = mysqli_fetch_array($query)){
                        $id = $row['marks_id'];
    
                        ?>
                        
                        <tr>
                                <td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
                                <td><?php echo $row['firstname']; ?></td>
                                <td><?php echo $row['subject']; ?></td>
                                <td><?php echo $row['marks']; ?></td>
                                <!--<td><a href="marksedit1.php?id=<?php //echo $id; ?>" class="button" style="color:black;"><i class="fa fa-fw fa-pencil">Edit</i></a></td> -->
                                
                            </tr>
                        </tbody>
    
                       
    
                        <?php } }else{ ?>
                            <h3>There is no marks currently available</h3>
                        <?php  } ?>
                    
                <div class="but">
                    <button class="btn btn-info">
                            <a href="addmarks1.php" style='text-decoration:none;color:white;'>
                                <i class="fa fa-fw fa-plus"></i>&nbsp;Add</a>
                            </button>
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
        $result = mysqli_query($link,"DELETE from marks
        where marks_id='$id[$i]'");
    }
?>
<script>
    window.location = "term1.php";
</script>

<?php
}
?>

