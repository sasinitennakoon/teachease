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
    
    

	
	<button><a href="view_document.php">Go to Dashboard</a></button>
	<div class="content">
		<h1>Add Document</h1>

        <div class="panels1">
            <div class="panel10">
                <form method="post" name="upload" enctype="multipart/form-data">
                
                <div class="user-details">

                    <div class="input-box">
                        <span class="details">File :</span>
                        <input name="uploaded_file" id="fileInput" type="file" required>
                         
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                        <input type="hidden" name="id" value="<?php echo $session_id ?>"/>
                    </div>

                    <div class="input-box">
                        <span class="details">File Name</span>
                        <input type="text" name="name" placeholder="Enter File name" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Description</span>
                        <input type="text" name="desc" placeholder="Enter Description" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Class</span>
                        <select name="class_id" required>
							<option></option>
								<?php
									 $query = mysqli_query($link,"select * from teacher_class
                                     LEFT JOIN class ON class.class_id = teacher_class.class_id
                                     LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                     where teacher_id = '$session_id'")or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)){ $id = $row['teacher_class_id'];
                                        $class_id = $row['class_id'];
								?>
									<option value="<?php echo $class_id; ?>"><?php echo $row['class_name']; ?></option>
								<?php } ?>
						</select>
                    </div>

                </div>
                    
                            <button name="save" type="submit" value="save" class="btn btn-info">
                                <i class="fa fa-fw fa-save"></i>&nbsp;Save
                            </button>
                       
                
                </form>
            </div>
        </div>
    </div>

</body>

</html>



<?php
include '../database/db_con.php';

if(isset($_POST['save'])) {
    $class_id = $_POST['class_id'];
    $errmsg_arr = array();
    // Validation error flag
    $errflag = false;

    // Get the logged-in teacher's details
    $query = mysqli_query($link, "SELECT * FROM teacher WHERE teacher_id = '$session_id'") or die(mysqli_error());
    $row = mysqli_fetch_array($query);
    $uploaded_by = $row['firstname'] . " " . $row['lastname'];

    // Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) {
        global $link;
        $str = trim($str);
        $str = mysqli_real_escape_string($link, $str);
        return $str;
    }

    // Sanitize the POST values
    $filedesc = clean($_POST['desc']);

    if ($filedesc == '') {
        $errmsg_arr[] = 'File description is missing';
        $errflag = true;
    }

    if (isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] == 0) {
        // File upload was successful, proceed with validation
        if ($_FILES['uploaded_file']['size'] >= 1048576 * 5) {
            $errmsg_arr[] = 'File selected exceeds 5MB size limit';
            $errflag = true;
        }
    } else {
        // File upload failed or no file was selected
        $errmsg_arr[] = 'File upload failed or no file selected';
        $errflag = true;
    }

    // Check for any validation errors before proceeding
    if ($errflag) {
        foreach ($errmsg_arr as $msg) {
            echo $msg . '<br>';
        }
        exit();
    } else {
        // Upload the file
        $uploaded_file = $_FILES['uploaded_file'];
        $filename = basename($uploaded_file['name']);
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $new_filename = mt_rand(1000, 9999) . "_File." . $ext;
        $target_dir = "teacher/uploads/";
        $target_file = $target_dir . $new_filename;

        if (move_uploaded_file($uploaded_file['tmp_name'], $target_file)) {
            // File uploaded successfully, insert file details into the database
            $name = clean($_POST['name']);
            mysqli_query($link, "INSERT INTO files (fdesc, floc, fdatein, teacher_id, class_id, fname, uploaded_by)
                                VALUES ('$filedesc', '$target_file', NOW(), '$session_id', '$class_id', '$name', '$uploaded_by')") 
                                or die(mysqli_error($link));

            // Redirect to a success page or perform any other actions
            header("Location: view_document.php");
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    ?>


<script>
    window.location = 'view_document.php';
</script>
<?php
}



/* mysqli_close($conn); */
?>