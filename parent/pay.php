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
    <link rel="stylesheet" href="././css/pay.css">
    <link rel="stylesheet" href="././css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
  <div class="dropdown" style="float:right;">
    <div class="dropbtn">
                <img src="./img/download (3).png" alt="User Icon">
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
                    <li><a href="dashboard.php" ><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="childCourses.php"><i class="fas fa-book-open"></i> My Child Courses</a></li>
                <li><a href="childProgress.php"><i class="fas fa-chart-line"></i> My Child Progress</a></li>
                <li><a href="Inbox.php"><i class="fas fa-inbox"></i> My Inbox</a></li>
                <li><a href="meet.php" ><i class="fas fa-calendar-check"></i>Meeting </a></li>
                <li><a href="pay.php"  class="active"><i class="fas fa-money-bill"></i> Payements</a></li>
                <li><a href="announce.php" ><i class="fas fa-bullhorn"></i> Announcements</a></li>
    
                </ul>
            </nav>
        </div>

        <div class="content">
            <h1>Your Payments</h1>
            <div class="panelsD">
            <div class="panel7" onclick="window.location.href='//buy.stripe.com/test_28o4hl64VaMv2WYfZ2';">
                <p><b>Science</b></p>
                
            </div>

            <div class="panel8" onclick="window.location.href='//buy.stripe.com/test_bIY5lpdxn8En0OQcMN';">
                <p><b>Mathematics</b></p>
            </div>

            <div class="panel9" onclick="window.location.href='//buy.stripe.com/test_dR68xBctj1bV0OQ6or';">
                <p><b>English</b></p>
            </div>
        </div>

        <div class="panelsD2">
            <div class="panel10" onclick="window.location.href='//buy.stripe.com/test_9AQ6pt3WN9Ir8hi3ch';">
                <p><b>Sinhala</b></p>
            </div>

            <div class="panel11" onclick="window.location.href='//buy.stripe.com/test_fZeaFJ2SJg6PapqcMS';">
                <p><b>Buddhism</b></p>
            </div>

            <div class="panel12" onclick="window.location.href='//buy.stripe.com/test_aEU6pt2SJ7AjdBC7su';">
                <p><b>History</b></p>
            </div>
        </div>

        
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all course panels
        var panels = document.querySelectorAll('.panelsD .panel1, .panelsD .panel2, .panelsD .panel3, .panelsD2 .panel4, .panelsD2 .panel5, .panelsD2 .panel6');

        // Add event listeners for hover effect on each panel
        panels.forEach(function (panel) {
            panel.addEventListener('mouseover', function () {
                panel.style.transform = 'translateY(-5px)';
                panel.style.boxShadow = '0 8px 16px rgba(0, 0, 0, 0.2)';
            });

            panel.addEventListener('mouseout', function () {
                panel.style.transform = 'translateY(0)';
                panel.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
            });
        });
    });
</script>

</body>
</html>