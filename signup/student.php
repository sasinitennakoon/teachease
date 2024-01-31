<?php
    include '../database/db_con.php';

    if(isset($_POST['signup']))
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $grade = $_POST['grade'];
        $language = $_POST['language'];
        $gender = $_POST['gender'];
        $role = "teacher";
        $status = "unregistered";

        $sql = "select * from student where username = '$username'";

        $result = mysqli_query($link,$sql) or die(mysqli_error($link));
        $count = mysqli_num_rows($result);

        if($count > 0)
        {
            echo "username already exist";
        }
        else
        {
            $status = 'unregistered';
            $sql = mysqli_query($link,"insert into student(firstname,lastname,username,password,grade,language,status,gender) values('$firstname','$lastname','$username','$password','$grade','$language','$status','$gender')") or die(mysqli_error($link));
            $sql1 = mysqli_query($link,"insert into userlist(firstname,lastname,role,status,username,password) values('$firstname','$lastname','$role','$status','$username','$password')") or die(mysqli_error($link));
            echo "Waiting for the admin permission";
            ?>

            <script>
                window.location="parent.php";
            </script>
            <?php
        }
        

    }
    else 
    {
      echo "Invalid request";
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
  <style>
    /* Add your custom styles here */
    .hidden {
      display: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="forms">
      <div class="form-content">
        <div class="signup-form">
          <!-- Add an image here -->
          <img src="studentimage.jpeg" height="400" width="380" alt="signupImage" class="signup-image">
        </div>
        <form id="studentForm" method="post">
          <div class="title"> Student Sign Up</div>
          <div class="user-details">
            <div class="input-box">
              <span class="details">First Name</span>
              <input type="text" name="firstname" placeholder="Enter Your First Name" required>
            </div>
            <div class="input-box">
              <span class="details">Last Name</span>
              <input type="text" name="lastname" placeholder="Enter Your Last Name" required>
            </div>
            <div class="input-box">
              <span class="details">City</span>
              <input type="text" name="city" placeholder="Enter Your City" required>
            </div>
            <div class="input-box">
              <span class="details">Usename (Email)</span>
              <input type="text" name="username" placeholder="Enter Your Username" required>
            </div>
            
            <div class="input-box">
              <span class="details">Password</span>
              <input type="password" name="password" placeholder="Enter Password" required>
            </div>
            <div class="gender-details">
              <input type="radio" name="gender" value="male" id="dot-1">
              <input type="radio" name="gender" value="female" id="dot-2">
              <span class="gender-title">Gender</span>
              <div class="category">
                <label for="dot-1">
                  <span class="dot one"></span>
                  <span class="gender">Male</span>
                </label>
                <label for="dot-2">
                  <span class="dot two"></span>
                  <span class="gender">Female</span>
                </label>
              </div>
            </div>
            <div>
                    <label for="language" class="text1">Language:</label>
                    <select id="language" name="language" class="select">
                        <option value="english">English</option>
                        <option value="sinhala">Sinhala</option>
                        <option value="Tamil">Tamil</option>
                    </select>
                </div>
                <div  >
                    <label for="grade" class="text1">Grade:</label>
                    <select id="grade" name="grade" class="select">
                        <option value="10">Grade 10</option>
                        <option value="11">Grade 11</option>
                    </select>
                </div>
          </div>
          <div class="button">
            <input type="submit" name="signup" value="Next" class="btn">
          </div>
        </form>

        
      </div>
    </div>
  </div>

  
</body>
</html>
