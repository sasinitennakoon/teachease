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
        <form id="studentForm">
          <div class="title"> Student Sign Up</div>
          <div class="user-details">
            <div class="input-box">
              <span class="details">First Name</span>
              <input type="text" placeholder="Enter Your First Name" required>
            </div>
            <div class="input-box">
              <span class="details">Last Name</span>
              <input type="text" placeholder="Enter Your Last Name" required>
            </div>
            <div class="input-box">
              <span class="details">Gender</span>
              <input type="text" placeholder="Enter Your City" required>
            </div>
            <div class="input-box">
              <span class="details">Usename (Email)</span>
              <input type="text" placeholder="Enter Your Username" required>
            </div>
            <div class="input-box">
              <span class="details">City</span>
              <input type="text" placeholder="Enter City" required>
            </div>
            <div class="input-box">
              <span class="details">Password</span>
              <input type="text" placeholder="Enter Password" required>
            </div>
            <div class="gender-details">
              <input type="radio" name="gender" id="dot-1">
              <input type="radio" name="gender" id="dot-2">
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
          </div>
          <div class="button">
            <button type="button" onclick="showParentForm()">Next</button>
          </div>
        </form>

        <form id="parentForm" class="hidden">
          <div class="title"> Parent Sign Up</div>
          <div class="user-details">
            <div class="input-box">
              <span class="details">Parent First Name</span>
              <input type="text" placeholder="Enter Parent's First Name" required>
            </div>
            <div class="input-box">
              <span class="details">Parent Last Name</span>
              <input type="text" placeholder="Enter Parent's Last Name" required>
            </div>
            <div class="input-box">
              <span class="details">Usename (Email)</span>
              <input type="text" placeholder="Enter Your Username" required>
            </div>
            <div class="input-box">
              <span class="details">Password</span>
              <input type="text" placeholder="Enter Password" required>
            </div>
          </div>
          <label><input type="checkbox">I hereby declare that the above information provided is true</label>
          <div class="button">
            <button type="button" onclick="showStudentForm()">Back</button>
          </div>
          <div class="button1">
            <button type="submit" value="Signup">Signup</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function showParentForm() {
      // Hide student form and show parent form
      document.getElementById('studentForm').classList.add('hidden');
      document.getElementById('parentForm').classList.remove('hidden');
    }
    function showStudentForm() {
      // Hide student form and show parent form
      document.getElementById('studentForm').classList.remove('hidden');
      document.getElementById('parentForm').classList.add('hidden');
    }
  </script>
</body>
</html>
