<?php
include '../database/db_con.php';
include '../session.php';

// Fetch teacher details
$query = mysqli_query($link, "SELECT * FROM teacher WHERE teacher_id = '$session_id'") or die(mysqli_error($link));
$row = mysqli_fetch_array($query);

$selected_class = '';
$selected_date = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store selected class and date in session variables
    $_SESSION['selected_class'] = $_POST['class'];
    $_SESSION['selected_date'] = $_POST['date'];
    
    // Retrieve submitted values to populate form fields
    $selected_class = $_POST['class'];
    $selected_date = $_POST['date'];
}

// Retrieve selected class and date from session variables if they exist
$selected_class = isset($_SESSION['selected_class']) ? $_SESSION['selected_class'] : '';
$selected_date = isset($_SESSION['selected_date']) ? $_SESSION['selected_date'] : '';
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
            <li><a href="StudyMeterials.php"><i class="fas fa-book"></i> Study Materials</a></li>
            <li><a href="Attendance.php" class="active"><i class="fas fa-check-circle"></i> Attendance</a></li>
            <li><a href="ExamResults.php"><i class="fas fa-poll"></i> Exam Results</a></li>
            <li><a href="Messages.php"><i class="fas fa-envelope"></i> Messages</a></li>
            <li><a href="Feedback.php"><i class="fas fa-comment"></i> Feedback</a></li>
        </ul>
    </nav>
</div>

<div class="content">
    <h1>Mark Student Attendance</h1>

    <div class="but">
                
                            <button class="btn btn-info">
                            <a href="view_attendance.php" style='text-decoration:none;color:white;'>
                                <i class></i>&nbsp;View Attendance records</a>
                            </button>
</div>
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
                            $selected = ($class_row['teacher_class_id'] == $selected_class) ? "selected" : "";
                            echo "<option value='{$class_row['teacher_class_id']}' $selected> {$class_row['class_name']} </option>";
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" value="<?php echo $selected_date; ?>" required>
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
            "SELECT student_class.*, 
                   schedule.date, 
                   student.student_id, 
                   student.firstname, 
                   student.lastname, 
                   student.grade
            FROM student_class 
            INNER JOIN schedule ON schedule.schedule_id = student_class.schedule_id
            INNER JOIN student ON student.student_id = student_class.student_id
            WHERE student_class.class_id = '$selected_class' 
              AND schedule.date = '$day_name'"
        ) or die(mysqli_error($link));

        if (mysqli_num_rows($attendance_query) > 0) {
            ?>
            <form method="POST" action="">
                <!-- Retain the class and date in hidden fields -->
                <input type="hidden" name="class" value="<?php echo $selected_class; ?>">
                <input type="hidden" name="date" value="<?php echo $selected_date; ?>">

                <?php
   
    if (!empty($selected_class) && !empty($selected_date)) {
        ?>
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
                            $current_attendance_query = mysqli_query(
                                $link,
                                "SELECT * 
                                 FROM student_attendance 
                                 WHERE student_id = '$student_id' 
                                   AND class_id = '$selected_class' 
                                   AND date = '$selected_date'"
                            ) or die(mysqli_error($link));

                            $existing_attendance = mysqli_fetch_assoc($current_attendance_query);
                            ?>
                            <tr>
                                <td><?php echo $student_id; ?></td>
                                <td><?php echo $row['firstname']; ?></td>
                                <td><?php echo $row['lastname']; ?></td>
                                <td><?php echo $row['grade']; ?></td>
                                <td>
                                    <!-- Mark Present or Absent -->
                                    <button 
                                      type="submit" 
                                      name="mark_present" 
                                      value="<?php echo $student_id; ?>" 
                                      class="mark-button" 
                                      style="background-color: <?php echo ($existing_attendance['status'] === 'present') ? '#055305' : ''; ?>"
                                    >
                                      Present
                                    </button>
                                    <button 
                                      type="submit" 
                                      name="mark_absent" 
                                      value="<?php echo $student_id; ?>" 
                                      class="mark-button" 
                                      style="background-color: <?php echo ($existing_attendance['status'] === 'absent') ? '#850404' : ''; ?>"
                                    >
                                      Absent
                                    </button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
    }
    ?>
            </form>
          
            <?php
        } else {
            echo "<p>No students found for the selected class and date.</p>";
        }
    }

    // Handle marking a student as present or absent
    if (isset($_POST['mark_present']) || isset($_POST['mark_absent'])) {
        $student_id = $_POST['mark_present'] ?? $_POST['mark_absent'];
        $class_id = $_POST['class'];
        $date = $_POST['date'];
        $status = isset($_POST['mark_present']) ? 'present' : 'absent';

        // Check if attendance record exists
        $attendance_check_query = mysqli_query(
            $link,
            "SELECT * 
             FROM student_attendance 
             WHERE student_id = '$student_id' 
               AND class_id = '$class_id' 
               AND date = '$date'"
        ) or die(mysqli_error($link));

        if (mysqli_num_rows($attendance_check_query) > 0) {
            // Update existing record
            mysqli_query(
                $link,
                "UPDATE student_attendance 
                 SET status = '$status' 
                 WHERE student_id = '$student_id' 
                   AND class_id = '$class_id' 
                   AND date = '$date'"
            ) or die(mysqli_error($link));
        } else {
            // Insert new record
            mysqli_query(
                $link,
                "INSERT INTO student_attendance (student_id, teacher_id, class_id, date, status)
                 VALUES ('$student_id', '$session_id', '$class_id', '$date', '$status')"
            ) or die(mysqli_error($link));
        }

        // Redirect to refresh the page
        // Replace the header redirect with JavaScript
            // Redirect to refresh the page
                ob_clean(); // Clean the output buffer
                header("Location: Attendance.php?class=$class_id&date=$date");
                exit;

    }
    ?>
</div>

<?php
// Clear session variables after form submission or when page is initially loaded
unset($_SESSION['selected_class']);
unset($_SESSION['selected_date']);
?>

<!-- JavaScript to change button color when clicked -->
<script>
document.querySelectorAll('.mark-button').forEach(button => {
    button.addEventListener('click', function() {
        if (this.name === 'mark_present') {
            this.style.backgroundColor = '#055305'; // Green for present
        } else {
            this.style.backgroundColor = '#850404'; // Red for absent
        }
    });
});
</script>

</body>
</html>
