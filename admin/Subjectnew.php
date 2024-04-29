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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="../ckeditor/ckeditor.js"></script>
    <!-- Latest FullCalendar CSS -->
    
</head>
<body>
<?php include 'dropdown1.php'; ?> 
    <button><a href="subjects.php">Go to Dashboard</a></button>
    <div class="content">
        <!-- Your page content goes here -->
        <h1>Create Subject</h1>
        
        <div class="panels1">
            <div class="panel10">
                <form method="post" onsubmit = "return validateForm()">
                
                <div class="user-details">

                    <div class="input-box">
                        <span class="details">Subject Code</span>
                        <input type="text" name="subject_code" id="subject_code" placeholder="Enter Subject Code">
                    </div>

                    <div class="input-box">
                        <span class="details">Subject Title</span>
                        <input type="text" name="subject_title" id="subject_title" placeholder="Enter Subject title">
                    </div>

                    <div class="input-box">
                        <span class="details">Description</span>
                        <textarea name="description" id="ckeditor_full"></textarea>
                        <script>
                            CKEDITOR.replace( 'ckeditor_full' );
                        </script>
                    </div>

                </div>
                    
                            <button name="save" type="submit" value="save" class="btn btn-info">
                                <i class="fa fa-fw fa-save"></i>&nbsp;Create
                            </button>
                       
                
                </form>
                
           
    </div>
    
   
</body>
</html>

<?php
    if(isset($_POST['save']))
    {
        $subject_code = $_POST['subject_code'];
        $subject_title = $_POST['subject_title'];
        $description = $_POST['description'];

        
	

		$sql = mysqli_query($link,"insert into subject(subject_code,subject_title,description) values('$subject_code','$subject_title','$description')") or die(mysqli_error($link));
        
	?>

		<script>
            alert('Subject Successfully added');
			window.location="subjects.php";
		</script>

		<?php
	}
?>
        

        <script>
    function validateForm() {
      var content = document.getElementById('ckeditor_full').value.trim();
      var code = document.getElementById('subject_code').value.trim();
      var title = document.getElementById('subject_title').value.trim();
     

      // Check if any field is empty
      if (content === '' || code ===''|| title ===  null) {
        alert('Please fill in all fields');
        return false;
      }

      if (isNaN(code)) {
        alert('Subject Code must be a number');
        return false;
    }

      // Validate email format
      

      // Validate password length
      

      // Add additional checks as needed
      return true;
    }
  </script>
    

