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
    <!--<link rel="stylesheet" href="../admin/css/dashboard.css"> -->
    <link rel="stylesheet" href="./css/profile.css">
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

<button onclick="goBack()">Go to Dashboard</button>

<div class="content">
    <div class="panel">
        <div class="panelsD">
            <div class="panel1">
            <img src="./img/download (3).png" alt="Alex David">
            <h1> M. M. S Samarasekara</h1>
            
            <p>Subject: Science</p>
            <p>Grades: Grade 10 & Grade 11</p>
            <p>10 Years working period</p>
            <p>Studied: University of Colombo</p>
            </br>
            <p>Experience</p>
            <p>Meet Mr. Samarasekara, a seasoned educator with a wealth of experience in both government and private 
                educational settings. With a decade of dedicated service in government schools and seven years in the
                 private tuition industry, Mr. Samarasekara has positively impacted the lives of over 500 students throughout 
                 his career. Known for his commitment to academic excellence, he has consistently guided his students to 
                 achieve outstanding results in the GCE (O/L) examinations. With a passion for teaching and a track record 
                 of success, Mr. Samarasekara continues to inspire and empower the next generation of learners.</p>
            
                 <h4>Contact</h4>
                 <p>Email: smr@gmail.com</p>
            </div>
        </div>
    </div>
</div>


<script>
    function goBack() {
            window.history.back();
        }
</script>