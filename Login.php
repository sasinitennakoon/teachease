<?php
	include 'database/db_con.php';

	if(isset($_POST['login']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sql = "SELECT * FROM `userlist` WHERE username='$username'";

		$result = mysqli_query($link, $sql);

		if($result)
		{
			if($row = mysqli_fetch_array($result))
			{
				$hashpassword = $row['password'];
				$fname = $row['firstname'];
				$role = $row['role'];
				$status = $row['status'];

				if($password == $hashpassword && $status == 'registered')
				{
					session_start();

					if($role == 'parent')
					{
						//session_start();
						$result1 = mysqli_query($link,"SELECT * FROM `$role` WHERE username='$username'") or die(mysqli_error($link));
						$row = mysqli_fetch_array($result1);
						$_SESSION['id']=$row['parent_id'];
						echo "<script>alert('Login Successful. Welcome, $fname!'); window.location='parent/dashboard.php';</script>";
					}
					else if($role == 'teacher')
					{
						//session_start();
						$result1 = mysqli_query($link,"SELECT * FROM `$role` WHERE username='$username'") or die(mysqli_error($link));
						$row = mysqli_fetch_array($result1);
						$_SESSION['id']=$row['teacher_id'];
						echo "<script>alert('Login Successful. Welcome, $fname!'); window.location='Teacher/FirstPage.php';</script>";
					}
					else if($role == 'student')
					{
						//session_start();
						$result1 = mysqli_query($link,"SELECT * FROM `$role` WHERE username='$username'") or die(mysqli_error($link));
						$row = mysqli_fetch_array($result1);
						$_SESSION['id']=$row['student_id'];
						echo "<script>alert('Login Successful. Welcome, $fname!'); window.location='Student/studash.php';</script>";
					}
					else if($role == 'admin')
					{
						//session_start();
						$result1 = mysqli_query($link,"SELECT * FROM `users` WHERE username='$username'") or die(mysqli_error($link));
						$row = mysqli_fetch_array($result1);
						$_SESSION['id']=$row['user_id'];
						echo "<script>alert('Login Successful. Welcome, $fname!'); window.location='Admin/dashboard.php';</script>";
					}
				}
				else if($password == $hashpassword && $status == 'unregistered')
				{
					echo "<script>alert('Waiting for Admin permission.'); window.location='index.php';</script>";
				}
				
				else
					echo "<script>alert('Login failed. Please check your password.'); window.location='index.php';</script>";
			}
			else
			{
				echo "<script>alert('Login failed. User not found'); window.location='index.php';</script>";
			}
		}
		else
		{
			echo "<script>alert('Error: " . mysqli_error($link) . "');</script>";
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
                <form method="post" onsubmit="return validateLoginForm()">
                    <!-- Specify the correct action attribute -->
                    <div class="title">Login Your Dashboard</div>

                    <div class="user-details">

                        <div class="input-box">
                            <span class="details">Username (Email)</span>
                            <input type="text" name="username" id="username" placeholder="Enter Your Username">
                        </div>

                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" name="password" id="password" placeholder="Enter Password">
                        </div>

                    </div>

                    <div class="button">
                        <input type="submit" name="login" value="Login" class="btn">
                        <span class="signup-link"><br><br>Don't have an account? <a href="index.php">Signup</a></span>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function validateLoginForm() {
            var username = document.getElementById('username').value.trim();
            var password = document.getElementById('password').value.trim();

            if (username === '') {
                alert('Please enter your username');
                return false;
            }

			var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
			if (!emailRegex.test(username)) {
				alert('Invalid email format');
				return false;
			}

            if (password === '') {
                alert('Please enter your password');
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
