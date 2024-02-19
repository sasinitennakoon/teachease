<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from student where student_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="././css/feed.css">
    <link rel="stylesheet" href="././css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
  <div class="dropdown" style="float:right;">
    <div class="dropbtn">
                <img src="./img/loginicon.png" alt="User Icon">
                    <?php echo $row['firstname']; ?>
            <i class="fa fa-caret-down"></i>
                    </div>
            <div class="dropdown-content">
            <a href="MyProfile.php"><i class="fa fa-fw fa-user"></i>Profile</a>
            <a href="ResetPassword.php"><i class="fa fa-fw fa-unlock-alt"></i>Change Password</a>
            <a href="../logout.php"><i class="fa fa-fw fa-sign-out-alt"></i>Log out</a>
            </div>
          </div> 
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="././img/logo1.png" alt="Logo">
            </div>
            <hr color="white">
            <nav>
                <ul>
                    <li><a href="studash.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="MyCourses.php"><i class="fas fa-book"></i> My Courses</a></li>
                    <li><a href="StudyMaterials.php"><i class="fas fa-book-open"></i> Study Materials</a></li>
                    <li><a href="Tasks.php"><i class="fas fa-tasks"></i> Tasks</a></li>
                    <li><a href="Progress.php"><i class="fas fa-chart-line"></i> Progress Report</a></li>
                    <li><a href="ExamR.php"><i class="fas fa-chalkboard"></i> Exam Results</a></li>
                    <li><a href="msg.php"><i class="fas fa-envelope"></i> Messages</a></li>
                    <li><a href="Feedback.php" class="active"><i class="fas fa-comment"></i> Feedback Collection</a></li>
    
                </ul>
            </nav>
        </div>

        <div class="content">
        
            <h2>Give Your Valueble Feedback Here!</h2>

        <div class="panelfeed">
            <h3> You can rate your classes and teachers here.</br>
             You can give us a help to improve this online education platform.</br>
            Please give us a rate if you are interested.</br></h3>
           <p> Thank You!</br>
            Admin Panel</p>
        </div>
<h4>Choose a subject to rate</h4>
        <select id="subject-select">
        <option value="">Select Subject</option>
        <option value="math">Math</option>
        <option value="science">Science</option>
        <option value="history">History</option>
        <option value="english">English</option>
        <option value="art">Art</option>
        <option value="music">Music</option>
    </select>



    <!--form action="#">
			<div class="rating">
				<input type="number" name="rating" hidden>
				<i class='bx bx-star star' style="--i: 0;"></i>
				<i class='bx bx-star star' style="--i: 1;"></i>
				<i class='bx bx-star star' style="--i: 2;"></i>
				<i class='bx bx-star star' style="--i: 3;"></i>
				<i class='bx bx-star star' style="--i: 4;"></i>
			</div>
			<textarea name="opinion" cols="30" rows="5" placeholder="Your opinion..."></textarea>
			<div class="btn-group">
				<button type="submit" class="btn submit">Submit</button>
				<button class="btn cancel">Cancel</button>
			</div>
		</form-->
        <div class="feedback-form">
    <h2>Feedback Form</h2>
    <div class="rating">
        <h3>Rate for the class:</h3>
        <div class="stars" id="classRating">
            <span class="star" data-value="1">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="5">&#9733;</span>
        </div>
    </div>
    <div class="rating">
        <h3>Rate for your teacher:</h3>
        <div class="emojis" id="teacherRating">
            <span class="emoji" data-value="very-bad">😠</span>
            <span class="emoji" data-value="bad">😞</span>
            <span class="emoji" data-value="neutral">😐</span>
            <span class="emoji" data-value="satisfied">😊</span>
            <span class="emoji" data-value="highly-satisfied">😍</span>
        </div>
    </div>
    <div class="comment">
        <h3>Add a comment:</h3>
        <textarea id="commentText" rows="4" cols="50" placeholder="Enter your comment here..."></textarea>
    </div>
    <button id="submitBtn">Submit</button>
</div>

<div class="popup" id="popup">
    <span class="close" id="close">&times;</span>
    <div class="popupContent" id="popupContent"></div>
</div>
        <script>

const stars = document.querySelectorAll('.star');
const emojis = document.querySelectorAll('.emoji');
const commentText = document.getElementById('commentText');
const submitBtn = document.getElementById('submitBtn');
const popup = document.getElementById('popup');
const closePopup = document.getElementById('close');
const popupContent = document.getElementById('popupContent');

stars.forEach(star => {
    star.addEventListener('click', () => {
        const rating = parseInt(star.getAttribute('data-value'));
        showPopup(`You rated ${rating} star(s) for the class.`);
    });
});

emojis.forEach(emoji => {
    emoji.addEventListener('click', () => {
        const rating = emoji.getAttribute('data-value');
        showPopup(`You rated ${rating} for your teacher.`);
    });
});

submitBtn.addEventListener('click', () => {
    const comment = commentText.value.trim();
    if (comment !== '') {
        showPopup(`Your comment: ${comment}`);
    } else {
        showPopup('Please add a comment before submitting.');
    }
});

function showPopup(message) {
    popupContent.textContent = message;
    popup.style.display = 'flex';
}

closePopup.addEventListener('click', () => {
    popup.style.display = 'none';
});

        </script>
            

</html>