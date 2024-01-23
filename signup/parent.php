<?php
    include '../database/db_con.php';

    if(isset($_POST['signup']))
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $city = $_POST['city'];
        $noofchildren = $_POST['noofchildren'];
        $childrenname = $_POST['childrenname'];

        $sql = "select * from parent where username = '$username'";

        $result = mysqli_query($link,$sql) or die(mysqli_error($link));
        $count = mysqli_num_rows($result);

        if($count > 0)
        {
            echo "username already exist";
        }
        else
        {
            $status = 'unregistered';
            $sql = mysqli_query($link,"insert into parent(firstname,lastname,username,password,city,noofchildren,status,childrenname) values('$firstname','$lastname','$username','$password','$city','$noofchildren','$status','$childrenname')") or die(mysqli_error($link));

            echo "Waitng for the admin permission";
            ?>

            <script>
                window.location="../index.php";
            </script>
            <?php
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
            <form method="post">
              <div class="title"> Parent Sign Up</div>

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
                  <span class="details">No of Children</span>
                  <input type="text" name="noofchildren" placeholder="Enter No of Children" required>
                </div>
                <div class="input-box">
                  <span class="details">Usename (Email)</span>
                  <input type="text" name="username" placeholder="Enter Your Username" required>
                </div>
                <div class="input-box">
                  <span class="details">Password</span>
                  <input type="text" name="password" placeholder="Enter Password" required>
                </div>
              </div>
              <label><input type="checkbox">I hereby declare that the above information provided is true</label>
              <div class="button">
                <input type="submit" name="signup" value="Signup" class="btn">
              </div>
            </form>
      
    </div>
  </div>
</body>
</html>


