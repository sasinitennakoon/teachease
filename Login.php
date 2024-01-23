<?php
	include 'database/db_con.php';

	if(isset($_POST['login']))
	{
		$username = $_POST['email'];
		$password = $_POST['password'];
		$role = $_POST['role'];

		$sql = "select * from `$role` where username='$username'";

		if($result = mysqli_query($link,$sql))
		{
			if($row = mysqli_fetch_array($result))
			{
				$hashpassword = $row['password'];
				$fname = $row['firstname'];

				if($password == $hashpassword)
				{
					//if($row['status'] != 'unregistered')
					//{
						if($role == 'Parent')
						{
							session_start();
							$_SESSION['id']=$row['parent_id'];
							echo "Login Successful. Welcome, $fname!";
							header("refresh:3;url=Parent/Parent_dashboard.php");
						}
						else if($role == 'Teacher')
						{
							session_start();
							$_SESSION['id']=$row['teacher_id'];
							echo "Login Successful. Welcome, $fname!";
							header("refresh:3;url=Teacher/teacher_dashboard.php");
						}
						else if($role == 'Student')
						{
							session_start();
							$_SESSION['id']=$row['student_id'];
							echo "Login Successful. Welcome, $fname!";
							header("refresh:3;url=Student/Student_dashboard.php");
						}
					//}
					/*else
					{
						echo "You're not Registered, Wait for the Permission";
						header("refresh:3;url=index.php");
						exit();
					}*/
				}
				else
					echo "Login failed.Please check your username and password.";
			}
			else
			{
				echo "Login failed.User not found";
			}
		}
		else
		{
			echo mysqli_error($link);
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
  <link rel="stylesheet" href="./CSS/Login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
  <div class="container">
    <div class="forms">
      <div class="form-content">
        <div class="signup-form">
          <!-- Add an image here -->
          <img src="signup/parentimage.jpeg" height="400" width="380" alt="signupImage" class="signup-image">

        </div>
        <form method="post"> <!-- Specify the correct action attribute -->
          <div class="title">Login Your Dashboard</div>

          <div class="user-details">

            <div class="input-box">
              <span class="details">Username (Email)</span>
              <input type="text" name="username" placeholder="Enter Your Username" required>
            </div>

            <div class="input-box">
              <span class="details">Password</span>
              <input type="password" name="password"placeholder="Enter Password" required>
            </div>

          </div>

          <div class="button">
            <button type="submit" name="submit" value="Login">Login</button>
            <span class="signup-link"><br><br>Don't have an account? <a href="student.html">Signup</a></span>
          </div>
        </form>

      </div>
    </div>
  </div>
</body>

</html>


