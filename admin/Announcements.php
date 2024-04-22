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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="././css/FirstPage.css">
    <link rel="stylesheet" href="././css/MyClasses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Latest FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.css" integrity="sha384-LiWsxj4vMfsO8uyNnTVqSfeLqqkKD2pwWqFnSa6UqVqwKn9FlnNy5wKb3bYxs84p" crossorigin="anonymous">
</head>
<body>
<?php include 'dropdown1.php'; ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="././img/logo1.png" alt="Logo">
        </div>
        <hr color="white">
        <nav>
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="Announcements.php" class="active"><i class="fas fa-bullhorn"></i> Announcements</a></li>
                <li><a href="PaymentDetails.php"><i class="fas fa-dollar-sign"></i> Payment Details</a></li>
                <li><a href="Users.php"><i class="fas fa-users"></i> Users</a></li>
                <li><a href="Subjects.php"><i class="fas fa-flask"></i> Subjects</a></li>
                <li><a href="Classes.php"><i class="fas fa-chalkboard"></i> Classes</a></li>
                <li><a href="Certificates.php"><i class="fas fa-certificate"></i> Certificates</a></li>
                <li><a href="RankingSystem.php"><i class="fas fa-trophy"></i> Ranking System</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i> Feedback Collection</a></li>

            </ul>
        </nav>
    </div>
    <div class="content">
        <!-- Your page content goes here -->
        <h1>Announcements</h1>

        <h3>Recent Announcements</h3>

         
           
        <div class="panels1">
            <div class="panel10">
            <form method='post' onsubmit="return confirmDelete()">
            
        <?php
            $query = mysqli_query($link,"select * from announcement") or die(mysqli_error());
            $count  = mysqli_num_rows($query);

            if($count > 0)
            {?>

        
            
                    <table border="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Content</th>
                                <th>Type</th>
                                <th></th>
                            </tr>
                        </thead>
                    <tbody>
                    <?php
                    while($row = mysqli_fetch_array($query)){
                    $id = $row['announcement_id'];

                    ?>
                    
                    <tr>
                            <td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
                            <td><?php echo $row['content']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><a href="announcementsedit.php <?php echo '?id='.$id; ?>" class="button" style="color:black;"><i class="fa fa-fw fa-pencil">Edit</i></a></td>
                            
                        </tr>
                    </tbody>

                   

                    <?php } }else{ ?>
                        <h3>There is no announcements currently available</h3>
					<?php  } ?>

                    <div class="but">
                    <button class="btn btn-info">
                            <a href="announcementsadd.php" style='text-decoration:none;color:white;'>
                                <i class="fa fa-fw fa-plus"></i>&nbsp;Add</a>
                            </button>
                            <button type="submit" name="delete" class="btn btn-info">
                                <i class="fa fa-fw fa-trash"></i> Delete
                            </button>
                    </div>

                    </table>

                    </form>  
            </div>
        </div>

        
    
       
        
    </div>
    <script>
         function confirmDelete() {
            return confirm("Do you want to delete this Announcement?");
        }
    </script>
    
</body>
</html>

<?php
                 include '../database/db_con.php';

                 if (isset($_POST['delete'])){
                         $id=$_POST['selector'];
                         $N = count($id);
                         
                     for($i=0; $i < $N; $i++)
                     {
                         $result = mysqli_query($link,"DELETE from announcement
                         where announcement_id='$id[$i]'");
                     }
             ?>
                 <script>
                     window.location = "Announcements.php";
                 </script>
             
             <?php
                 }
             ?>

