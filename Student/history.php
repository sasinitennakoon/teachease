<?php include '../database/db_con.php'; ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!--<link rel="stylesheet" href="../admin/css/dashboard.css"> -->
    <link rel="stylesheet" href="././css/dashboard.css">
    <link rel="stylesheet" href="././css/general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<?php include 'dropdown2.php'; 
if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
    header("location: index.php");
    exit();
}

$session_id=$_SESSION['id'];?>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="logo">
                    <img src="././img/logo1.png" alt="Logo">
                </div>
                <hr color="white">
                <nav>
                    <ul>
                        <li><a href="studash.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li><a href="MyCourses.php" class="active"><i class="fas fa-book"></i> My Courses</a></li>
                        <li><a href="StudyMaterials.php"><i class="fas fa-book-open"></i> Study Materials</a></li>
                        <li><a href="Tasks.php"><i class="far fa-sticky-note"></i></i> Flash Cards</a></li>
                        <li><a href="Progress.php"><i class="fas fa-chart-line"></i> Progress Report</a></li>
                        <li><a href="ExamR.php"><i class="fas fa-chalkboard"></i> Exam Results</a></li>
                        <li><a href="msg.php"><i class="fas fa-envelope"></i> Messages</a></li>
                        <li><a href="Feedback.php"><i class="fas fa-comment"></i> Feedback Collection</a></li>
        
                    </ul>
                </nav>
            </div>

<button onclick="goBack()">Go to Dashboard</button>

<div class="content">
    <h1>History Class</h1>

    <?php
    $query = mysqli_query($link, "SELECT student_class.*,teacher_class.class_name, subject.subject_title, schedule.time, schedule.date
                    FROM student_class 
                   INNER JOIN schedule ON schedule.schedule_id = student_class.schedule_id
                  INNER JOIN subject ON subject.subject_id = schedule.subject_id  
                  INNER JOIN teacher_class ON teacher_class.subject_id = subject.subject_id 
                    WHERE student_class.student_id = '$session_id'
                    AND subject.subject_title = 'History'  
                    ORDER BY schedule.schedule_id DESC") or die(mysqli_error($link));
    $count = mysqli_num_rows($query);

    if ($count <= 0) {
        echo "<b>Currently you have not registered for any history classes</b>";
    } else {
    ?>
        <div class="panels">
            <div class="panel8">
                <form method='post'>

                    <table border="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($query)) {
                                $id  = $row['schedule_id'];
                            ?>
                                <tr>
                                    <td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
                                    <td><?php echo $row['class_name']; ?></td>
                                    <td><?php echo $row['subject_title']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['time']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
        </div>
        </div>
        </div>
<?php
    }
?>

<div class="but">

    <button class="btn btn-info">
        <a href="addhistoryclass.php" style='text-decoration:none;color:white;'>
            <i class="fa fa-fw fa-plus"></i>&nbsp;Add history Class</a>
    </button>
    <button type="submit" name="delete" class="btn btn-info">
        <i class="fa fa-fw fa-trash"></i> Send Leave Request
    </button>

</div>
</form>

</body>

</html>

<?php
include '../database/db_con.php';

if (isset($_POST['delete'])) {
    $ids = $_POST['selector'];
    $N = count($ids);
    
    for ($i = 0; $i < $N; $i++) {
        $result = mysqli_query($link, "DELETE FROM schedule WHERE schedule_id='$ids[$i]'");
    }
?>
    <script>
        window.location = "history.php";
    </script>
<?php
}
?>
