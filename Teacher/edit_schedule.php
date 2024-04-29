<?php
// Include necessary files and start session
include '../database/db_con.php';
include '../session.php';

// Check if a schedule_id is set (for update)
$schedule_id = isset($_GET['schedule_id']) ? intval($_GET['schedule_id']) : null;

// Fetch the specific schedule to update, if schedule_id is provided
$schedule_data = null;
if ($schedule_id !== null) {
    $schedule_query = mysqli_query($link, "SELECT * FROM schedule WHERE schedule_id = '$schedule_id'") or die(mysqli_error($link));
    $schedule_data = mysqli_fetch_array($schedule_query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Schedule</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./CSS/quiz_dashboard.css">
</head>

<body>

    <button><a href="Schedule.php">Go to Dashboard</a></button>

    <div class="content">
        <h1><?php echo $schedule_id ? "Update Class Schedule" : "Add Class Schedule"; ?></h1>

        <div class="panels1">
            <div class="panel10">
                <form method="post">
                    <div class="user-details">
                        <input type="hidden" name="session_id" value="<?php echo $session_id; ?>">
                        <input type="hidden" name="schedule_id" value="<?php echo $schedule_id; ?>">

                        <div class="input-box">
                            <span class="details">Class</span>
                            <select name="class_id" required>
                                <option value=""></option>
                                <?php
                                $query = mysqli_query($link, "SELECT * FROM teacher_class
                                    LEFT JOIN class ON class.grade_id = teacher_class.grade_id
                                    LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                    WHERE teacher_id = '$session_id'") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($query)) {
                                    $class_id = $row['teacher_class_id'];
                                    $is_selected = ($schedule_data && $schedule_data['class_id'] == $class_id) ? 'selected' : '';
                                    echo "<option value=\"$class_id\" $is_selected>{$row['class_name']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input-box">
                            <span class="details">Subject</span>
                            <select name="subject_id" required>
                                <option value=""></option>
                                <?php
                                $query = mysqli_query($link, "SELECT subject.*
                                    FROM subject 
                                    INNER JOIN teacher ON teacher.subject = subject.subject_title
                                    WHERE teacher.teacher_id = '$session_id'
                                    ORDER BY subject.subject_id");
                                while ($row = mysqli_fetch_array($query)) {
                                    $is_selected = ($schedule_data && $schedule_data['subject_id'] == $row['subject_id']) ? 'selected' : '';
                                    echo "<option value=\"{$row['subject_id']}\" $is_selected>{$row['subject_title']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input-box">
                            <span class="details">Date</span>
                            <select name="date" required>
                                <option value=""></option>
                                <?php
                                $days_of_week = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
                                foreach ($days_of_week as $day) {
                                    $is_selected = ($schedule_data && $schedule_data['date'] == $day) ? 'selected' : '';
                                    echo "<option value=\"$day\" $is_selected>$day</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input-box">
                            <span class="details">Time</span>
                            <input type="text" name="time" placeholder="HH:MM:SS" required value="<?php echo $schedule_data ? $schedule_data['time'] : ''; ?>">
                        </div>
                        
                        <button name="save" type="submit" value="save" class="btn btn-info">
                            <i class="fa fa-fw fa-save"></i>&nbsp;<?php echo $schedule_id ? "Update" : "Save"; ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
<?php
include '../database/db_con.php';

if (isset($_POST['save'])) {
    $session_id = $_POST['session_id'];
    $subject_id = $_POST['subject_id'];
    $class_id = $_POST['class_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $schedule_id = isset($_POST['schedule_id']) ? intval($_POST['schedule_id']) : null;

    if ($schedule_id) {
        // Update the existing record
        $update_query = "UPDATE schedule 
                         SET subject_id = '$subject_id', class_id = '$class_id', date = '$date', time = '$time' 
                         WHERE schedule_id = '$schedule_id'";

        mysqli_query($link, $update_query) or die(mysqli_error($link));
        echo "Record updated successfully";
    } else {
        // Check for duplicates before creating a new record
        $query = mysqli_query($link, "SELECT * FROM schedule 
                                      WHERE subject_id = '$subject_id' 
                                      AND class_id = '$class_id' 
                                      AND teacher_id = '$session_id' 
                                      AND date = '$date' 
                                      AND time = '$time'") or die(mysqli_error($link));

        $count = mysqli_num_rows($query);
        if ($count > 0) {
            echo "<script>alert('Duplicate schedule found')";
        } 
    }
    
    // Redirect to the Schedule page after updating or adding
    echo '<script>window.location = "Schedule.php";</script>';
}
