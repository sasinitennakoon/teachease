<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="./CSS/FirstPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.css" integrity="sha384-LiWsxj4vMfsO8uyNnTVqSfeLqqkKD2pwWqFnSa6UqVqwKn9FlnNy5wKb3bYxs84p" crossorigin="anonymous">

</head>
<body>
            <div class="dropdown" style="float:right;">
			  <div class="dropbtn">
              <img src="./IMG/loginicon.png" alt="User Icon">
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
            <img src="./IMG/logo1.png" alt="Logo">
        </div>
        <hr color="white">
        <nav>
            <ul>
                <li><a href="FirstPage.php" class="active"><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a></li>
                <li><a href="MyStudent.php"><i class="fas fa-users"></i>&nbsp;My Students</a></li>
                <li><a href="MyClasses.php"><i class="fas fa-chalkboard-teacher"></i>&nbsp; My Classes</a></li>
                <li><a href="Schedule.php"><i class="fas fa-calendar-alt"></i>&nbsp; Schedule</a></li>
                <li><a href="StudyMeterials.php"><i class="fas fa-book"></i>&nbsp; Study Materials</a></li>
                <li><a href="Attendance.php"><i class="fas fa-check-circle"></i>&nbsp; Attendance</a></li>
                <li><a href="ExamResults.php"><i class="fas fa-poll"></i>&nbsp; Exam Results</a></li>
                <li><a href="Messages.php"><i class="fas fa-envelope"></i>&nbsp;Messages</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i>&nbsp;Feedback</a></li>
            </ul>
        </nav>
    </div>

    <!-- Content -->
    <div class="content">
        <!-- Your page content goes here -->
        <h1>Welcome to Your Dashboard</h1>

        <!-- Inserting small panels -->
        <div class="panels">
            <div class="panel">
                <h2>Total Students</h2>
                <i class="fa fa-list box-icon"></i>
            </div>

            <div class="panel">
                <h2>Total Classes</h2>
                <p>Content for Panel 2 goes here.</p>
            </div>

            <div class="panel">
                <h2>Average Rating</h2>
                <p>Content for Panel 3 goes here.</p>
            </div>

            <div class="panel">
                <h2>Total Earnings</h2>
                <p>Content for Panel 4 goes here.</p>
            </div>
        </div>

        <!-- Calendar Panel -->
        <div class="panelsD">
            <div class="panel1">
                <p><b>Student Overall Progress</b></p>
                <canvas id="barChart"></canvas>
            </div>

            <div class="panel2">
                <iframe src="https://calendar.google.com/calendar/embed?height=300&wkst=1&bgcolor=%23ffffff&ctz=UTC&showTitle=0&showNav=1&showPrint=0&showTabs=1&showCalendars=0&showDate=1&showTz=0&src=ZW4ubGsjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%230B8043" style="border:solid 0px #777" width="520" height="160" frameborder="0" scrolling="no"></iframe>
            </div>
        </div>

        <div class="panelsD">
            <div class="panel1">
                <h2>My Courses</h2>
                <p>Content for Panel 1 goes here.</p>
            </div>

            <div class="panel2">
                <h2>Personal Notes</h2>
                <textarea rows="10" cols="50" placeholder="Type your notes here..."></textarea>
            </div>
        </div>
    </div>

    <!-- Your custom JavaScript for the chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Your custom JavaScript for the navigation and content loading  -->
    <script>
        
        document.addEventListener("DOMContentLoaded", function () {
            /*
            var navLinks = document.querySelectorAll('.sidebar nav ul li a');

            navLinks.forEach(function (link) {
                link.addEventListener('click', function (event) {
                    // Prevent the default link behavior
                    event.preventDefault();

                    // Remove the 'active' class from all links
                    navLinks.forEach(function (navLink) {
                        navLink.parentElement.classList.remove('active');
                    });

                    // Add the 'active' class to the clicked link's parent
                    link.parentElement.classList.add('active');

                    // Load the content of the clicked link's href (HTML file)
                    loadContent(link.getAttribute('href'));
                });
            });*/

            // Function to load content into the 'content' div
            function loadContent(url) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.querySelector('.content').innerHTML = this.responseText;

                        // Sample data for the bar chart
                        var data = {
                            labels: ["January", "February", "March", "April", "May"],
                            datasets: [{
                                label: "Number of Students",
                                data: [20, 35, 40, 25, 30],
                                backgroundColor: "rgb(28, 28, 111)",
                                borderColor: "rgba(75,192,192,1)",
                                borderWidth: 1
                            }]
                        };

                        // Get the canvas element and render the bar chart
                        var ctx = document.getElementById("barChart").getContext("2d");
                        var myBarChart = new Chart(ctx, {
                            type: 'bar',
                            data: data,
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    }
                };
                xhttp.open("GET", url, true);
                xhttp.send();
            }

            // Load the default content for the "Dashboard" link
            var defaultLink = document.querySelector('.sidebar nav ul li a[href="dashboard.html"]');
            defaultLink.parentElement.classList.add('active');
            loadContent(defaultLink.getAttribute('href'));
        });
    </script>
</body>
</html>
