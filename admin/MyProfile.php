<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from users where user_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<?php
    include '../database/db_con.php';

    if(isset($_POST['update']))
    {
      $errmsg_arr = array();
    // Validation error flag
      $errflag = false;

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $role = "admin";
        
       

          if (isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] == 0) {
            // File upload was successful, proceed with validation
            if ($_FILES['uploaded_file']['size'] >= 1048576 * 5) {
                $errmsg_arr[] = 'File selected exceeds 5MB size limit';
                $errflag = true;
            }
        } if ($_FILES['uploaded_file']['error'] !== UPLOAD_ERR_OK) {
          $errmsg_arr[] = 'File upload failed: ' . $_FILES['uploaded_file']['error'];
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
            $target_dir = "../uploads/";
            $target_file = $target_dir . $new_filename;
    
            if (move_uploaded_file($uploaded_file['tmp_name'], $target_file)) {
           
            $sql = mysqli_query($link,"update users set firstname='$firstname',lastname='$lastname',password='$password',image='$target_file' where user_id='$session_id'") or die(mysqli_error($link));
            $sql1 = mysqli_query($link,"update userlist set firstname='$firstname',lastname='$lastname',role='$role',password='$password' where username='$username'") or die(mysqli_error($link));
           
            ?>

            <script>
                window.location="dashboard.php";
            </script>
            <?php
        }
      }
    }

    
    
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Profile</title>
  <link rel="stylesheet" href="./css/Profile.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    
    .hidden {
      display: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="forms">
      <div class="form-content">
        
        <form id="studentForm" method="post" enctype="multipart/form-data">
          <div class="title"> My Profile</div>
          <script>
         var loadFile = function (event) {
  var image = document.getElementById("output");
  image.src = URL.createObjectURL(event.target.files[0]);
};

</script>

<div class="profile-pic">
  <label class="-label" for="file">
    <span class='span1'>Change Image</span>
  </label>
  <input id="file" type="file" name="uploaded_file" onchange="loadFile(event)"/>
  <?php echo "<img src='" . $row['image'] . "' id='output' width='200' />"; ?>
</div>

          <div class="user-details">
            <div class="input-box">
              <span class="details">First Name</span>
              <input type="text" name="firstname" id="firstname" placeholder="Enter Your First Name" value="<?php echo $row['firstname']; ?>">
            </div>
            <div class="input-box">
              <span class="details">Last Name</span>
              <input type="text" name="lastname" id="lastname" placeholder="Enter Your Last Name" value="<?php echo $row['lastname']; ?>">
            </div>
            
            
            <div class="input-box">
              <span class="details">Username (Email)</span>
              <!--<span id='username' style="text-align:center;"><?php //echo $row['username']; ?></span> -->
              <input type="text" name="username" value="<?php echo $row['username']; ?>">
            </div>
            
            <div class="input-box">
              <span class="details">Password</span>
              <input type="password" name="password" id="password" placeholder="Enter Password" value="<?php echo $row['password']; ?>">
            </div>
            
           
           
          </div>
          <div class="button">
            <input type="submit" name="update" value="update" class="btn">
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>
