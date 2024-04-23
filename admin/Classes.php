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
                <li><a href="Announcements.php"><i class="fas fa-bullhorn"></i> Announcements</a></li>
                <li><a href="PaymentDetails.php"><i class="fas fa-dollar-sign"></i> Payment Details</a></li>
                <li><a href="Users.php"><i class="fas fa-users"></i> Users</a></li>
                <li><a href="Subjects.php"><i class="fas fa-flask"></i> Subjects</a></li>
                <li><a href="Classes.php" class="active"><i class="fas fa-chalkboard"></i> Classes</a></li>
                
                <li><a href="RankingSystem.php"><i class="fas fa-trophy"></i> Ranking System</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i> Feedback Collection</a></li>

            </ul>
        </nav>
    </div>
    <div class="content">
        <!-- Your page content goes here -->
        <h1>Classes</h1>

        <?php
            $sql = mysqli_query($link,"SELECT teacher_class.*,  teacher.firstname, teacher.lastname,
                                        MAX(class.grade_name) AS grade_name,
                                        MAX(teacher_class.class_name) AS class_name,
                                        MAX(subject.subject_title) AS subject
                                        FROM teacher_class 
                                        INNER JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
                                        INNER JOIN class ON class.grade_id = teacher_class.grade_id
                                        INNER JOIN subject ON subject.subject_id = teacher_class.subject_id 
                                        GROUP BY teacher_class.teacher_class_id, teacher.firstname, teacher.lastname")
                                        or die(mysqli_error($link));

          
                if(mysqli_num_rows($sql) == 0)
                {
                    echo "<b>There is No Classes available.</b>";
                }
                else
                {
                   
                    ?>
                

        <div class="panels1">
            <div class="panel10">
                <table border="0">
                    <thead>
                        <tr>
                            <th>Class Name</th>
                            <th>Teacher Name</th>
                            <th>Grade</th>
                            <th>Subject</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    while($row = mysqli_fetch_array($sql))
                    {
                        $id = $row['teacher_class_id'];
        ?>
                        <tr>
                        <td><?php echo $row['class_name']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['grade_name']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        </tr>  
                    </tbody>
                    <?php
    }
            }
        ?>
                </table>
                
            </div>
        </div>

        
      
            
        

    </div>

    
</body>
</html>
