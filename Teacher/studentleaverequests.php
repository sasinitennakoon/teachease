<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./CSS/FirstPage.css">
    <link rel="stylesheet" href="./CSS/MyClasses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Latest FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.css" integrity="sha384-LiWsxj4vMfsO8uyNnTVqSfeLqqkKD2pwWqFnSa6UqVqwKn9FlnNy5wKb3bYxs84p" crossorigin="anonymous">
</head>
<body>
<?php include 'dropdown.php'; ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="./IMG/logo1.png" alt="Logo">
        </div>
        <hr color="white">
        <nav>
            <ul>
            <li><a href="FirstPage.php"><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a></li>
                <li><a href="announcements.php"><i class="fas fa-tachometer-alt"></i>&nbsp; Announcements</a></li>
                
                <li><a href="MyClasses.php"><i class="fas fa-chalkboard-teacher"></i>&nbsp; My Classes</a></li>
                <li><a href="Schedule.php"><i class="fas fa-calendar-alt"></i>&nbsp; Schedule</a></li>
                <li><a href="StudyMeterials.php"><i class="fas fa-book"></i>&nbsp; Study Materials</a></li>
                <li><a href="Attendance.php"><i class="fas fa-check-circle"></i>&nbsp; Attendance</a></li>
                <li><a href="ExamResults.php" class="active"><i class="fas fa-poll"></i>&nbsp; Exam Results</a></li>
                <li><a href="Messages.php"><i class="fas fa-envelope"></i>&nbsp;Messages</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i>&nbsp;Feedback</a></li>
            </ul>
        </nav>
    </div>

    <div class="content">
        <!-- Your page content goes here -->
		<h1>Leave Requests</h1>

        <div class="panels1">
            <div class="panel10">
                <form method="post">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Student ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Class Name</th>
                            <th>Request Date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                        $query = mysqli_query($link,"select * from leaverequests WHERE teacher_id=$session_id") or die(mysqli_error($link));
                        $count = mysqli_fetch_array($query);

                        if($count < 0)
                        {
                            echo "<b>There is Leave Requests</b>";
                        }
                        else
                        {
                            $query = mysqli_query(
                                $link,
                                "SELECT leaverequests.*, 
                                    student.firstname, 
                                    student.lastname, 
                                    MAX(teacher_class.class_name) AS class_name
                            
                                FROM 
                                    leaverequests
                                INNER JOIN 
                                    student 
                                ON 
                                    student.student_id = leaverequests.student_id
                                INNER JOIN 
                                    teacher_class 
                                ON 
                                    teacher_class.teacher_id = leaverequests.teacher_id
                                WHERE 
                                    leaverequests.teacher_id = $session_id
                                GROUP BY leaverequests.leaverequest_id, student.firstname,student.lastname"
                            ) or die(mysqli_error($link));
                            
                            while($row = mysqli_fetch_array($query))
                            {
                                $id = $row['leaverequest_id'];
                    ?>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
                            <td><?php echo $row['student_id']; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['class_name']; ?></td>
                            <td><?php echo $row['request_date']; ?></td>
                            <td><?php echo $row['status']; ?>
                            <?php
                                if($row['status'] == 'approved')
                                {?>
                                    
                                    
                                <td><button type='submit' name="approved" class="button1" style="background-color:#850404;">Approved</button></a></td>
                                <?php

                                }
                                else if($row['status'] == 'Pending')
                                {?>
                                
                                <td><button type='submit' name="approve" class="button1" style="background-color:#055305;">Approve</button></a></td>
                                <?php
                                }
                            ?>
                        </tr>
                    </tbody>
                    <?php  } } ?>
                </table>
                            </form>
            </div>
            
        </div>

        <!-- Add Details Form -->
       
</body>
</html>

<?php
// Handle "Approve" button press
if (isset($_POST['approve'])) {
    if (!isset($_POST['selector']) || empty($_POST['selector'])) {
        echo "No items selected.";
    } else {
        $ids = $_POST['selector']; // Get all selected leave request IDs
        $N = count($ids);

        for ($i = 0; $i < $N; $i++) {
            $leaverequest_id = $ids[$i];

            // Get the student_schedule_id from the leave request
            $result = mysqli_query($link, "SELECT student_schedule_id FROM leaverequests WHERE leaverequest_id = '$leaverequest_id'");
            $row = mysqli_fetch_assoc($result);
            $student_schedule_id = $row['student_schedule_id'];

            // Update the leave request to 'approved'
            $update = mysqli_query($link, "UPDATE `leaverequests` SET status = 'approved' WHERE leaverequest_id = '$leaverequest_id'");
            
            if ($update) {
                // Delete the corresponding student_class record
                $delete = mysqli_query($link, "DELETE FROM `student_class` WHERE student_schedule_id = '$student_schedule_id'");

                if (!$delete) {
                    echo "Error deleting student class: " . mysqli_error($link);
                }
            } else {
                echo "Error updating leave request: " . mysqli_error($link);
            }
        }
        ?>
        <script>
            window.location = 'studentleaverequests.php';
        </script>
        <?php
    }
}
?>


