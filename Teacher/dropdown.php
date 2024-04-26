<?php include '../database/db_con.php'; ?>


<div class="dropdown" style="float:right;">
			  <div class="dropbtn">
              <?php echo "<img src='" . $row['image'] . "' alt='User Icon'>"; ?>
              <?php echo $row['firstname']; ?>
			  <i class="fa fa-caret-down"></i>
              </div>
			  <div class="dropdown-content">
				<a href="MyProfile.php"><i class="fa fa-fw fa-user"></i>Profile</a>
				<a href="ResetPassword.php"><i class="fa fa-fw fa-unlock-alt"></i>Change Password</a>
				<a href="../logout.php"><i class="fa fa-fw fa-sign-out-alt"></i>Log out</a>
			  </div>
</div>