<?php include '../database/db_con.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="./css/general2.css">
    <link rel="stylesheet" href="././css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<?php include 'dropdown2.php'; ?>
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="././img/logo1.png" alt="Logo">
            </div>
            <hr color="white">
            <nav>
                <ul>
                <li><a href="studash.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="announcements.php"  class="active"><i class="fas fa-tachometer-alt"></i> Announcements</a></li>
            <li><a href="MyCourses.php"><i class="fas fa-book"></i> My Courses</a></li>
            <li><a href="StudyMaterials.php"><i class="fas fa-book-open"></i> Study Materials</a></li>
            <li><a href="Tasks.php"><i class="far fa-sticky-note"></i></i> Flash Cards</a></li>
            <li><a href="Progress.php"><i class="fas fa-chart-line"></i> Progress Report</a></li>
            <li><a href="ExamR.php"><i class="fas fa-chalkboard"></i> Exam Results</a></li>
            <li><a href="msg.php"><i class="fas fa-envelope"></i> Messages</a></li>
            <li><a href="Feedback.php"><i class="fas fa-comment"></i> Feedback Collection</a></li>
    
                </ul>
            </nav>
        </div>

        <div class="content">
            
        <h1>Announcements</h1>

<h3>Recent Announcements</h3>

 
   
<div class="panels1">
    <div class="panel10">
    <form method='post'>
    
<?php
    $query = mysqli_query($link, "SELECT * FROM announcement WHERE type = 'For Students' OR type = 'for all'") or die(mysqli_error($link));

    $count  = mysqli_num_rows($query);

    if($count > 0)
    {?>


    
            <table border="0">
                <thead>
                    <tr>
                        <th>Content</th>
                        <th>Type</th>
                    </tr>
                </thead>
            <tbody>
            <?php
            while($row = mysqli_fetch_array($query)){
            $id = $row['announcement_id'];

            ?>
            
            <tr>
                    <td><?php echo $row['content']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    
                </tr>
            </tbody>

           

            <?php } }else{ ?>
                <h3>There is no announcements currently available</h3>
            <?php  } ?>

            </table>

            </form>  
    </div>
</div>





</div>


</body>
</html>



 