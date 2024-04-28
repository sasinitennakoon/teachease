<?php include '../database/db_con.php'; ?>

<?php include '../session.php'; ?>
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
		
	<button><a href="term1_page.php"><i class='fa fa-fw fa arrow-left'></i>Go to Dashboard</a></button>
	<div class="content">
		<h1>Student Marks For Term 1</h1>

        <div class="panels1">
            <div class="panel10">
            <form method='post' onsubmit="return confirmDelete()">
            
            <?php
                $query = mysqli_query($link,"SELECT marks_new.*, student.firstname, subject.subject_title,
                                             MAX(student.firstname) AS firstname,
                                             MAX(subject.subject_title) AS subject
                                             FROM marks_new
                                             INNER JOIN student ON student.student_id = marks_new.student_id
                                             INNER JOIN subject ON subject.subject_id = marks_new.subject_id
                                             WHERE term_id = '1'
                                             GROUP BY marks_new.marks_id; ") or die(mysqli_error());
                $count  = mysqli_num_rows($query);
                $total = 0;
                if($count > 0)
                {?>
    
            
                
                        <table border="0" id='#dataTable'>
                            <thead>
                                <tr>
                                    <th class="check">Check All <input type="checkbox"  name="selectAll" id="checkAll" /></th>
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
                                <td><?php echo $row['firstname'];
                                $name = $row['firstname']; ?></td>
                                <td><?php echo $row['subject']; ?></td>
                                <td><?php echo $row['marks'];
                                $marks = $row['marks']; ?></td>
                               
                                <!--<td><a href="marksedit1.php?id=<?php //echo $id; ?>" class="button" style="color:black;"><i class="fa fa-fw fa-pencil">Edit</i></a></td> -->
                                
                            </tr>
                        </tbody>
    
                        
                        <?php } }else{ ?>
                            <h3>There is no marks currently available</h3>
                        <?php  } ?>
                        
                <div class="but">
                
                            <button type="submit" name="delete" class="btn btn-info">
                                <i class="fa fa-fw fa-trash"></i> Delete
                            </button>

                    </div>
                    
                       
                    </table>
                </form>
            </div>
        </div>
    </div>
    



</body>

</html>

<script>
								$("#checkAll").click(function () {
									$('input:checkbox').not(this).prop('checked', this.checked);
								});
								</script>	

<?php
include '../database/db_con.php';

if (isset($_POST['delete'])){
        $id=$_POST['selector'];
        $N = count($id);
        
    for($i=0; $i < $N; $i++)
    {
        $result = mysqli_query($link,"DELETE from marks_new
        where marks_id='$id[$i]'");
       
    }
?>
<script>
    window.location = "term1.php";
</script>

<?php
}
?>

