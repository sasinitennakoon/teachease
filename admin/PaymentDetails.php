<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from users where user_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="././css/FirstPage.css">
    <link integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Latest FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.css" integrity="sha384-LiWsxj4vMfsO8uyNnTVqSfeLqqkKD2pwWqFnSa6UqVqwKn9FlnNy5wKb3bYxs84p" crossorigin="anonymous">
    
    <!-- Include the external JavaScript file -->
    <script src="script.js"></script>
</head>
<body>
    <div class="user-info">
        <img src="././img/loginicon.png" alt="User Icon">
        <span><?php echo $row['firstname']; ?></span>
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
                <li><a href="Announcements.php"><i class="fas fa-bullhorn"></i> Announcements</a></li>
                <li><a href="PaymentDetails.php" class="active"><i class="fas fa-dollar-sign"></i> Payment Details</a></li>
                <li><a href="Courses.php"><i class="fas fa-book"></i> Courses</a></li>
                <li><a href="Subjects.php"><i class="fas fa-flask"></i> Subjects</a></li>
                <li><a href="Classes.php"><i class="fas fa-chalkboard"></i> Classes</a></li>
                <li><a href="Certificates.php"><i class="fas fa-certificate"></i> Certificates</a></li>
                <li><a href="RankingSystem.php"><i class="fas fa-trophy"></i> Ranking System</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i> Feedback Collection</a></li>

            </ul>
        </nav>
    </div>
    <div class="content">
        <h1>Payment Details</h1>

        <h3>Today Payments</h3>
        <div class="panels">
            <div class="panel">
                <div class="but">
                    <a href="Paymentall.php"><button class="button"><b>View All</b></button></a>
                </div>
            </div>
        </div>

        <h3>All Payments</h3>

        <div class="panels">
            <div class="panel">
                <div class="but">
                <a href="Paymentall.php"><button class="button">View All</button></a>
                <form method="post" action="process.php">
                <table>
                <tr>
						<td id = "name" name="Joe">Joe</td>
						
						<td id="price" name="150.00">Rs.150.00</td>
						<td><input type='submit' class = "btn" onclick="buyNow();"></td>
                        
					  </tr>
                </table>
</form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://www.payhere.lk/lib/payhere.js"></script>
<script src="script.js"></script>
</body>
</html>
