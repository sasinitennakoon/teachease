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
                <li><a href="announcements.php"><i class="fas fa-bullhorn"></i>&nbsp; Announcements</a></li>
                
                <li><a href="MyClasses.php"><i class="fas fa-chalkboard-teacher"></i>&nbsp; My Classes</a></li>
                <li><a href="Schedule.php"><i class="fas fa-calendar-alt"></i>&nbsp; Schedule</a></li>
                <li><a href="StudyMeterials.php"><i class="fas fa-book"></i>&nbsp; Study Materials</a></li>
                <li><a href="Attendance.php"><i class="fas fa-check-circle"></i>&nbsp; Attendance</a></li>
                <li><a href="ExamResults.php"><i class="fas fa-poll"></i>&nbsp; Exam Results</a></li>
                <li><a href="Messages.php"><i class="fas fa-envelope"></i>&nbsp;Messages</a></li>
                <li><a href="Feedback.php" class="active"><i class="fas fa-comment"></i>&nbsp;Feedback</a></li>
            </ul>
        </nav>
    </div>
    <div class="content">
        <!-- Your page content goes here -->
        <h1>Feedback</h1>
        <form method="POST" action="">
        <table>
            <tr>
                <td>
                    <label for="class">Class:</label>
                    <select id="class" name="class" required>
                        <option value=""></option>
                        <?php
                        // Fetch the list of classes taught by the teacher that have a schedule
                        $class_query = mysqli_query(
                            $link,
                            "SELECT teacher_class_id, class_name
                             FROM teacher_class
                             WHERE teacher_id = '$session_id' 
                               AND teacher_class_id IN 
                               (SELECT class_id FROM schedule)"
                        ) or die("Query failed: " . mysqli_error($link));

                        while ($class_row = mysqli_fetch_array($class_query)) {
                            echo "<option value='{$class_row['teacher_class_id']}'> {$class_row['class_name']} </option>";
                        }
                        ?>
                    </select>
                <td>
                    <button type="submit" name="search">Search</button>
                </td>
            </tr>
        </table>
    </form>
    <br>

    <?php
    // Check if the search button was clicked
    if (isset($_POST['search'])) {
        $selected_class = $_POST['class'];


        $attendance_query = mysqli_query(
            $link,
            "SELECT 
            feedback.*, 
            student.firstname, 
            student.lastname,
            student.grade
        FROM 
            feedback
        INNER JOIN 
            student ON student.student_id = feedback.student_id
        INNER JOIN 
            student_class ON student_class.student_id = feedback.student_id
        INNER JOIN 
            teacher_class ON teacher_class.teacher_class_id = student_class.class_id
        INNER JOIN
        subject ON subject.subject_id = teacher_class.subject_id
        WHERE 
            teacher_class.teacher_id = '$session_id'
            AND teacher_class.teacher_class_id = '$selected_class'
            AND feedback.subject = subject.subject_title
        "
        ) or die(mysqli_error($link));
        

        if (mysqli_num_rows($attendance_query) > 0) {
            ?>
            <form method="POST" action=""></form>
                <table>
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date Submittied</th>
                            <th>CLass Rating</th>
                            <th>Teacher Rating</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    <?php
                        // Display the students and attendance options
                        while ($row = mysqli_fetch_array($attendance_query)) {
                            $student_id = $row['student_id'];
                            ?>
                            <tr>
                                <td><?php echo $student_id; ?></td>
                                <td><?php echo $row['firstname']; ?></td>
                                <td><?php echo $row['lastname']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td><?php echo $row['class_rating']; ?></td>
                                <td><?php echo $row['teacher_rating']; ?></td>
                                <td><?php echo $row['comment']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                            
                    </tbody>
                </table>
            </form>
            <?php
        } else {
            echo "<p>No students feedback records found for the selected class </p>";
        }
    }?>
</div>


</body>
</html>


</body>
</html>
