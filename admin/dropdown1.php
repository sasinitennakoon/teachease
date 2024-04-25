<?php include '../database/db_con.php'; ?>



<?php 
	$query= mysqli_query($link,"select * from users where user_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>
<div class="dropdown" style="float:right;">
            <div class="dropbtn">
              <img src="./IMG/admin.jpg" alt="User Icon">
                <?php echo $row['firstname']; ?>
				<i class="fa fa-caret-down"></i>
            </div>
			<div class="dropdown-content">
				
				<a href="../logout.php"><i class="fa fa-fw fa-sign-out-alt"></i>Log out</a>
			</div>
</div> 