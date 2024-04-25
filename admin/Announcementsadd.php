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
		
	<button><a href="Announcements.php"><i class='fa fa-fw fa arrow-left'></i>Go to Dashboard</a></button>
	<div class="content">
		<h1>Add Announcement</h1>

        <div class="panels1">
            <div class="panel10">
                <form method="post">
                
                <div class="user-details">

                    <div class="input-box">
                        <span class="details">Announcement Content</span>
                        <textarea name="content" id="ckeditor_full" required></textarea>
                        <script>
                            CKEDITOR.replace( 'ckeditor_full' );
                        </script>
                    </div>

                    <div class="input-box">
                        <span class="details">Content Type</span>
                        <select id="qtype" name="type" required>
							<option value=""></option>
								
									<option value="For Teachers">For Teachers</option>
                                    <option value="For Students">For Students</option>
                                    <option value="For Parents">For Parents</option>
                                    <option value="For All">For All</option>
						</select>
                    </div>

                    
                
                </div>
                    
                            <button name="save" type="submit" value="save" class="btn btn-info">
                                <i class="fa fa-fw fa-save"></i>&nbsp;Post
                            </button>
                       
                
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php
		if (isset($_POST['save'])){
		$content = $_POST['content'];
		
		$type = $_POST['type'];
		
        $query = mysqli_query($link,"insert into announcement (content,type,date) values('$content','$type',NOW())") or die(mysqli_error());
		
		
		
		
	?>
		<script>
 		window.location = 'Announcements.php';
		</script>

		<?php
		    }
		?>

