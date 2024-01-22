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
          <img src="parentimage.jpeg" height="400" width="380" alt="signupImage" class="signup-image">

        </div>
        <form action="student.html"> <!-- Specify the correct action attribute -->
          <div class="title">Login Your Dashboard</div>

          <div class="user-details">

            <div class="input-box">
              <span class="details">Username (Email)</span>
              <input type="text" placeholder="Enter Your Username" required>
            </div>

            <div class="input-box">
              <span class="details">Password</span>
              <input type="password" placeholder="Enter Password" required>
            </div>

          </div>

          <div class="button">
            <button type="submit" value="Login">Login</button>
            <span class="signup-link"><br><br>Don't have an account? <a href="student.html">Signup</a></span>
          </div>
        </form>

      </div>
    </div>
  </div>
</body>

</html>
