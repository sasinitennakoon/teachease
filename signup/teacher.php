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
        $subject = $_POST['subject'];
        $language = $_POST['language'];
        $role = "teacher";
        $status = "unregistered";

        $sql = "select * from teacher where username = '$username'";

        $result = mysqli_query($link,$sql) or die(mysqli_error($link));
        $count = mysqli_num_rows($result);

        if($count > 0)
        {
            echo "<script>alert(username already exist);</script>";
        }
        else
        {
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
            $target_dir = "../uploads/";
            $target_file = $target_dir . $new_filename;
    
            if (move_uploaded_file($uploaded_file['tmp_name'], $target_file)) {
            $status = 'unregistered';
            $sql = mysqli_query($link,"insert into teacher(firstname,lastname,username,password,subject,language,status,image) values('$firstname','$lastname','$username','$password','$subject','$language','$status','$target_file')") or die(mysqli_error($link));
            $sql1 = mysqli_query($link,"insert into userlist(firstname,lastname,role,status,username,password) values('$firstname','$lastname','$role','$status','$username','$password')") or die(mysqli_error($link));
            echo "<script>alert(Waiting for the Admin permission);</script>";
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
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <div class="container">
    <div class="forms">
      <div class="form-content">
        <div class="signup-form">
          
          <img src="teacher.jpeg" height="400" width="380" alt="signupImage" class="signup-image">
          
        </div>
            <form method="post" enctype="multipart/form-data">
              <div class="title"> Teacher Sign Up</div>

              <div class="user-details">
                <div class="input-box">
                  <span class="details">First Name</span>
                  <input type="text" name="firstname" placeholder="Enter Your First Name">
                </div>
                <div class="input-box">
                  <span class="details">Last Name</span>
                  <input type="text" name="lastname" placeholder="Enter Your Last Name">
                </div>
                <div class="input-box">
                  <span class="details">Subject</span>
                  <input type="text" name="subject" placeholder="Enter Your Subject">
                </div>
                <div class="input-box">
                        <span class="details">File</span>
                        <input name="uploaded_file" id="fileInput" type="file" required>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                        <input type="hidden" name="id" value="<?php echo $session_id ?>"/>
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
                  <span class="details">Usename (Email)</span>
                  <input type="text" name="username" placeholder="Enter Your Username">
                </div>
                <div class="input-box">
                  <span class="details">Password</span>
                  <input type="password" name="password" placeholder="Enter Password">
                </div>
              </div>
              <label><input type="checkbox">I hereby declare that the above information provided is true</label>
              <div class="button">
                <input type="submit" name="signup" value="signup" class="btn">
              </div>
            </form>
      
    </div>
  </div>

  <script>
    function validateForm() {
      var firstname = document.getElementById('firstname').value.trim();
      var lastname = document.getElementById('lastname').value.trim();
      var subject = document.getElementById('subject').value.trim();
      var username = document.getElementById('username').value.trim();
      var password = document.getElementById('password').value.trim();
      var fileInput = document.getElementById('fileInput').value.trim();
      var language = document.getElementById('language').value.trim();
      
      var gender = document.querySelector('input[name="gender"]:checked');

      // Check if any field is empty
      if (firstname === '' || lastname === '' || subject === '' || username === '' || password === '' || fileInput === '' || language === '' || gender === null) {
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


