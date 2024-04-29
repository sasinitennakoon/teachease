<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>
<?php
if (isset($_GET['teacher_class_id'])) {
    $class_id = $_GET['teacher_class_id'];
    $query = mysqli_query($link, "SELECT * FROM teacher_class WHERE teacher_class_id = '$class_id'");
    $class = mysqli_fetch_array($query);
} 

if (isset($_POST['update'])) {
    $class_name = $_POST['class_name'];
    $grade_id = $_POST['grade_id'];
    $subject_id = $_POST['subject_id'];
    $noofparticipant = $_POST['noofparticipant'];

    if ($noofparticipant < 0 || $noofparticipant > 20) {
        echo "<script>alert('Number of participants must be between 0 and 20');</script>";
    } else {
        mysqli_query($link, "UPDATE teacher_class 
                             SET class_name = '$class_name', grade_id = '$grade_id', subject_id = '$subject_id', noofparticipant = '$noofparticipant'
                             WHERE teacher_class_id = '$class_id'")
            or die(mysqli_error($link));
        
        echo "<script>alert('Class updated successfully'); window.location = 'MyClasses.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Class</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>

    <link rel="stylesheet" href="./CSS/quiz_dashboard.css">
</head>
<body>
    <button><a href="MyClasses.php">Back to Classes</a></button>
    <div class="content">
    <h1>Edit Class</h1>
    <div class="panels1">
            <div class="panel10">
    <form method="post" onsubmit="return validateForm();">
        <div>
            <label>Class Name:</label>
            <input type="text" name="class_name" value="<?php echo $class['class_name']; ?>" required>
        </div>
        <div>
            <label>Grade:</label>
            <select name="grade_id" required>
                <option></option>
                <?php
                $grade_query = mysqli_query($link, "SELECT * FROM class");
                while ($grade = mysqli_fetch_array($grade_query)) {
                    echo "<option value='{$grade['grade_id']}' " . ($grade['grade_id'] == $class['grade_id'] ? "selected" : "") . ">{$grade['grade_name']}</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <label>Subject:</label>
            <select name="subject_id" required>
                <option></option>
                <?php
                $subject_query = mysqli_query($link, "SELECT * FROM subject");
                while ($subject = mysqli_fetch_array($subject_query)) {
                    echo "<option value='{$subject['subject_id']}' " . ($subject['subject_id'] == $class['subject_id'] ? "selected" : "") . ">{$subject['subject_title']}</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <label>Number of Participants:</label>
            <input type="text" name="noofparticipant" value="<?php echo $class['noofparticipant']; ?>" >
        </div>
        <div>
            <button name="update" type="submit">Update</button>
        </div>
    </form>
<script>
function validateForm() {
    // Check that all required fields are filled
    var noofparticipant = parseInt(document.querySelector('input[name="noofparticipant"]').value.trim());
    if (isNaN(noofparticipant) || noofparticipant < 0 || noofparticipant > 20) {
        alert('Number of participants must be between 0 and 20');
        return false;
    }
    return true;
}
</script>
</body>
</html>
