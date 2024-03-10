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
                <li><a href="studash.php" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="MyCourses.php"><i class="fas fa-book"></i> My Courses</a></li>
                <li><a href="StudyMaterials.php"><i class="fas fa-book-open"></i> Study Materials</a></li>
                <li><a href="Tasks.php"><i class="far fa-sticky-note"></i> Flash Cards</a></li>
                <li><a href="Progress.php"><i class="fas fa-chart-line"></i> Progress Report</a></li>
                <li><a href="ExamR.php"><i class="fas fa-chalkboard"></i> Exam Results</a></li>
                <li><a href="msg.php"><i class="fas fa-envelope"></i> Messages</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i> Feedback Collection</a></li>

            </ul>
        </nav>
    </div>

   
    <!-- Content -->
    <div class="content">
        <h1>Welcome to Your Dashboard !</h1>

        <!-- Inserting small panels -->
        <div class="panelsD">
            <div class="panel">
                <h2>Your Rank</h2>
            </div>

            <div class="panel4">
                <h2>Completed </br>Tasks</h2>
                
            </div>

            <div class="panel5">
                <h2>Stars You Got</h2>
            </div>

            <div class="panel6">
                <h2> Active Hours</h2>
            </div>
        </div>

        <!-- Calendar Panel -->
        <div class="panelsD">
            <div class="panel1"onclick="window.location.href='progress.php';">
                <p><b>Your Progress</b></p>
            </div>

            <div class="panel2">
                <iframe src="https://calendar.google.com/calendar/embed?height=300&wkst=1&bgcolor=%23ffffff&ctz=UTC&showTitle=0&showNav=1&showPrint=0&showTabs=1&showCalendars=0&showDate=1&showTz=0&src=ZW4ubGsjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%230B8043" style="border:solid 0px #777" width="520" height="160" frameborder="0" scrolling="no"></iframe>
            </div>
        </div>

        <div class="panelsD">
            <div class="panel7">
                <h2>Newly Added Course Content</h2>
            </div>

            <div class="panel8">
                <h2>Upcoming Activity</h2>
                
            </div>
        </div>
    </div>
<!--
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var navLinks = document.querySelectorAll('.sidebar nav ul li a');

        navLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();

                navLinks.forEach(function (navLink) {
                    navLink.parentElement.classList.remove('active');
                });

                link.parentElement.classList.add('active');
                loadContent(link.getAttribute('href'));
            });
        });

        function loadContent(url) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.querySelector('.content').innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", url, true);
            xhttp.send();
        }

        var defaultLink = document.querySelector('.sidebar nav ul li a[href="dashboard.html"]');
        defaultLink.parentElement.classList.add('active');
        loadContent(defaultLink.getAttribute('href'));
    });
</script> -->


</body>
</html>
