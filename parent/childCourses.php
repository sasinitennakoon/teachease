<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from parent where parent_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="././css/courses.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<div class="dropdown" style="float:right;">
<div class="dropbtn">
              <img src="./img/download (3).png"" alt="User Icon">
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
                <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="childCourses.php"  class="active"><i class="fas fa-book-open"></i> My Child Courses</a></li>
                <li><a href="childProgress.php"><i class="fas fa-chart-line"></i> My Child Progress</a></li>
                <li><a href="Inbox.php"><i class="fas fa-inbox"></i> My Inbox</a></li>
                <li><a href="meet.php"><i class="fas fa-calendar-check"></i>Meeting </a></li>
                <li><a href="pay.php"><i class="fas fa-money-bill"></i> Payements</a></li>
                <li><a href="announce.php"><i class="fas fa-bullhorn"></i> Announcements</a></li>

            </ul>
        </nav>
    </div>

    <div class="content">

        <h1> Course Details</h1>

        <div class="panel">
            <img src="./img/scince.png">
            <h2>Science</h2>
            <p>This course is based on the science syllabus that was recommended by the Ministry of education. Here we are 
                going to cover whole syllabus . Notonly that we are conducting assignmnets and quizes for each and every
            part of this course. </p>
            <p>Grade: 10</p>
            <p>Teacher:<a href="profile1.php"> M.M.S Samarasekara</a></p>
            <p>Course fee: Rs.5000(pay it on or before the 25th of every month)</p>
           
        </div>

        <div class="panel">
            <img src="./img/math.png">
            <h2>Mathematics</h2>
            <p>Our mathematics course covers the full syllabus as per educational standards. With engaging classes and interactive sessions, we ensure a deep understanding of every topic. Students benefit from a mix of theory, practical applications, and problem-solving strategies, guided by experienced teachers.</p>
            <p>Grade: 10</p>
            <p>Teacher:<a href="profile1.php"> S.A Gallage</a></p>
            <p>Course fee: Rs.5000(pay it on or before the 25th of every month)</p>
           
        </div>

        <div class="panel">
            <img src="./img/eng.png">
            <h2>English</h2>
            <p>This course is based on the science syllabus that was recommended by the Ministry of education.Our english
                teachers are highly experienced and highly educated . Your child can get a good knowledge on their school 
                syllabus as well as other practical things
            </p>
            <p>Grade: 10</p>
            <p>Teacher:<a href="profile1.php"> J. A Rodrigo</a></p>
            <p>Course fee: Rs.5000(pay it on or before the 25th of each month)</p>
           
        </div>

        <div class="panel">
            <img src="./img/Sinhala letter.png">
            <h2>Sinhala</h2>
            <p>This course is based on the science syllabus that was recommended by the Ministry of education. Here we are 
                going to cover whole syllabus . Notonly that we are conducting assignmnets and quizes for each and every
            part of this course. </p>
            <p>Grade: 10</p>
            <p>Teacher:<a href="profile1.php"> Padmawathee Somapala</a></p>
            <p>Course fee: Rs.5000(pay it on or before the 25th of each month)</p>
           
        </div>

        <div class="panel">
            <img src="./img/lot.png">
            <h2>Buddhism</h2>
            <p>This course is based on the science syllabus that was recommended by the Ministry of education. Here we are 
                going to cover whole syllabus . Notonly that we are conducting assignmnets and quizes for each and every
            part of this course. </p>
            <p>Grade: 10</p>
            <p>Teacher:<a href="profile1.php"> S.S Karunanayake</a></p>
            <p>Course fee: Rs.5000(pay it on or before the 25th of each month)</p>
           
        </div>

        <div class="panel">
            <img src="./img/his.png">
            <h2>History</h2>
            <p>This course is based on the science syllabus that was recommended by the Ministry of education. Here, we are
                going to provide knowledge to students by interactive and attractive activities and simulations </p>
            <p>Grade: 10</p>
            <p>Teacher:<a href="profile1.php"> Namal Silva</a></p>
            <p>Course fee: Rs.5000(pay it on or before the 25th of each month)</p>
           
        </div>

    </div>