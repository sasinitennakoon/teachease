<?php
    include '../database/db_con.php';

    if(isset($_POST['signup']))
    {
      $errmsg_arr = array();
    // Validation error flag
      $errflag = false;

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $city = $_POST['city'];
        $language = $_POST['language'];
        $childrenname = $_POST['childrenname'];
        $role = 'parent';

        $sql = "select * from parent where username = '$username'";

        $result = mysqli_query($link,$sql) or die(mysqli_error($link));
        $count = mysqli_num_rows($result);

        if($count > 0)
        {
            echo "<script>alert(username already exist);</script>";
        }
        else
        {
            $status = 'unregistered';

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
              $target_dir = "uploads/";
              $target_file = $target_dir . $new_filename;
      
              if (move_uploaded_file($uploaded_file['tmp_name'], $target_file)) {
            $sql = mysqli_query($link,"insert into parent(firstname,lastname,username,password,city,status,childrenname,language,image) values('$firstname','$lastname','$username','$password','$city','$status','$childrenname','$language','$target_file')") or die(mysqli_error($link));
            $sql1 = mysqli_query($link,"insert into userlist(firstname,lastname,role,status,username,password) values('$firstname','$lastname','$role','$status','$username','$password')") or die(mysqli_error($link));
            echo "<script>alert(Waiting for the admin permission);</script>";
            ?>

            <script>
                window.location="../index.php";
            </script>
            <?php
        }

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
  <title>Login and Registration</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <div class="container">
    <div class="forms">
      <div class="form-content">
        <div class="signup-form">
          <!-- Add an image here -->
          <img src="50632.png" height="400" width="380" alt="signupImage" class="signup-image">
          
        </div>
            <form method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
              <div class="title"> Parent Sign Up</div>

              <div class="user-details">
                <div class="input-box">
                  <span class="details">First Name</span>
                  <input type="text" id='firstname' name="firstname" placeholder="Enter Your First Name">
                </div>
                <div class="input-box">
                  <span class="details">Last Name</span>
                  <input type="text" id='lastname' name="lastname" placeholder="Enter Your Last Name">
                </div>
                <div>
                    <label for="language" class="text1">Language:</label>
                    <select id="language" name="language" class="select">
                        <option value="english">English</option>
                        <option value="sinhala">Sinhala</option>
                        <option value="Tamil">Tamil</option>
                    </select>
                </div>
                <div class="input-box">
                  <span class="details">City</span>
                  <input type="text" id='city' name="city" placeholder="Enter Your City">
                </div>
                <div class="input-box">
                        <span class="details">Image</span>
                        <input name="uploaded_file" id="fileInput" type="file">
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                        <input type="hidden" name="id" value="<?php echo $session_id ?>"/>
              </div>
                <div class="input-box">
                  <span class="details">Children Name</span>
                  <input type="text" id='childrenname' name="childrenname" placeholder="Enter Children Name">
                </div>
                <div class="input-box">
                  <span class="details">Username (Email)</span>
                  <input type="text" id='username' name="username" placeholder="Enter Your Username">
                </div>
                <div class="input-box">
                  <span class="details">Password</span>
                  <input type="password" id='password' name="password" placeholder="Enter Password">
                </div>
              </div>
              <label><input type="checkbox">I hereby declare that the above information provided is true</label>
              <div class="button">
                <input type="submit" name="signup" value="Signup" class="btn">
              </div>
            </form>
      
    </div>
  </div>

  <script>
    function validateForm() {
      var firstname = document.getElementById('firstname').value.trim();
      var lastname = document.getElementById('lastname').value.trim();
      var city = document.getElementById('city').value.trim();
      var username = document.getElementById('username').value.trim();
      var password = document.getElementById('password').value.trim();
      var fileInput = document.getElementById('fileInput').value.trim();
      var language = document.getElementById('language').value.trim();
      var childrenname = document.getElementById('childrenname').value.trim();
      

      // Check if any field is empty
      if (firstname === '' || lastname === '' || city === '' || username === '' || password === '' || fileInput === '' || language === '' || childrenname === '') {
        alert('Please fill in all fields');
        return false;
      }

      // Validate email format
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(username)) {
        alert('Invalid email format');
        return false;
      }

      // Validate password length
      if (password.length < 6) {
        alert('Password must be at least 6 characters long');
        return false;
      }

      // Add additional checks as needed
      return true;
    }
  </script>
</body>
</html>


