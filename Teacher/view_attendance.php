<?php
include '../database/db_con.php';
include '../session.php';

// Fetch teacher details
$query = mysqli_query($link, "SELECT * FROM teacher WHERE teacher_id = '$session_id'") or die(mysqli_error($link));
$row = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="./CSS/Schedule.css">
    <link rel="stylesheet" href="./CSS/FirstPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<?php include 'dropdown.php'; ?>

<div class="sidebar">
    <div class="logo">
        <img src="./IMG/logo1.png" alt="Logo">
    </div>
    <hr>
    <nav>
        <ul>
            <li><a href="FirstPage.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="announcements.php"><i class="fas fa-bullhorn"></i> Announcements</a></li>
            <li><a href="MyClasses.php"><i class="fas fa-chalkboard-teacher"></i> My Classes</a></li>
            <li><a href="Schedule.php"><i class="fas fa-calendar-alt"></i> Schedule</a></li>
            <li><a href="StudyMaterials.php"><i class="fas fa-book"></i> Study Materials</a></li>
            <li><a href="Attendance.php" class="active"><i class="fas fa-check-circle"></i> Attendance</a></li>
            <li><a href="ExamResults.php"><i class="fas fa-poll"></i> Exam Results</a></li>
            <li><a href="Messages.php"><i class="fas fa-envelope"></i> Messages</a></li>
            <li><a href="Feedback.php"><i class="fas fa-comment"></i> Feedback</a></li>
        </ul>
    </nav>
</div>

<div class="content">
    <h1>Student Attendance</h1>

    <!-- Search form for selecting class and date -->
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
                </td>
                <td>
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" required>
                </td>
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
        $selected_date = $_POST['date'];

        $day_query = mysqli_query(
            $link,
            "SELECT DAYNAME('$selected_date') as day_name"
        ) or die(mysqli_error($link));

        $day_result = mysqli_fetch_assoc($day_query);
        $day_name = $day_result['day_name'];

        $attendance_query = mysqli_query(
            $link,
            "SELECT student_attendance.*, student.firstname, student.lastname,student.grade
            FROM student_attendance
            INNER JOIN student ON student.student_id=student_attendance.student_id
            WHERE class_id = '$selected_class' 
              AND date = '$selected_date'"
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
                            <th>Grade</th>
                            <th>Attendance</th>
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
                                <td><?php echo $row['grade']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                            
                    </tbody>
                </table>
            </form>
            <?php
        } else {
            echo "<p>No students attendance records found for the selected class and date.</p>";
        }
    }?>
</div>


</body>
</html>
