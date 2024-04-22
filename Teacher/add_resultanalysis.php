<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
    $query= mysqli_query($link,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
    $row = mysqli_fetch_array($query);
?>

<?php
if(isset($_GET['exam_id'])) {
    $exam_id = $_GET['exam_id'];
    
    // Fetch exam result details based on the exam_id
    $query = mysqli_query($link, "SELECT * FROM result_files WHERE exam_id = '$exam_id'");
    $result = mysqli_fetch_array($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   
    <link rel="stylesheet" href="./CSS/quiz_dashboard.css">
</head>

<body>
    <?php include 'dropdown.php'; ?>
    
    <button><a href="ResultAnalysis.php?exam_id=<?php echo $exam_id; ?>">Go to Dashboard</a></button>
    <div class="content">
        <h1>Add Document</h1>

        <div class="panels1">
            <div class="panel10">
                <form method="post" name="upload" enctype="multipart/form-data">
                
                <div class="user-details">

                    <div class="input-box">
                        <span class="details">File :</span>
                        <input name="uploaded_file" id="fileInput" type="file" accept=".xls,.xlsx" required>
                         
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                        <input type="hidden" name="id" value="<?php echo $session_id ?>"/>
                    </div>

                    <div class="input-box">
                        <span class="details">File Name</span>
                        <input type="text" name="name" placeholder="Enter File name" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Description</span>
                        <input type="text" name="desc" placeholder="Enter Description" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Class</span>
                        <select name="class_id" required>
                            <option></option>
                            <?php
                                 $query = mysqli_query($link,"select * from teacher_class
                                     LEFT JOIN class ON class.grade_id = teacher_class.grade_id
                                     LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                     where teacher_id = '$session_id'")or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)){ $id = $row['teacher_class_id'];
                                        $class_id = $row['teacher_class_id'];
                                ?>
                                    <option value="<?php echo $class_id; ?>"><?php echo $row['class_name']; ?></option>
                                <?php } ?>
                        </select>
                    </div>

                </div>
                    
                <button name="save" type="submit" value="save" class="btn btn-info">
                    <i class="fa fa-fw fa-save"></i>&nbsp;Save
                </button>
               
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php
include '../database/db_con.php';

if(isset($_POST['save'])) {
    $class_id = $_POST['class_id'];
    $errmsg_arr = array();
    // Validation error flag
    $errflag = false;

    // Get the logged-in teacher's details
    $query = mysqli_query($link, "SELECT * FROM teacher WHERE teacher_id = '$session_id'") or die(mysqli_error());
    $row = mysqli_fetch_array($query);
    $uploaded_by = $row['firstname'] . " " . $row['lastname'];

    // Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) {
        global $link;
        $str = trim($str);
        $str = mysqli_real_escape_string($link, $str);
        return $str;
    }

    // Sanitize the POST values
    $filedesc = clean($_POST['desc']);

    if ($filedesc == '') {
        $errmsg_arr[] = 'File description is missing';
        $errflag = true;
    }

    if (isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] == 0) {
        // File upload was successful, proceed with validation
        if ($_FILES['uploaded_file']['size'] >= 1048576 * 5) {
            $errmsg_arr[] = 'File selected exceeds 5MB size limit';
            $errflag = true;
        }

        // Check file extension
        $allowed_extensions = array('xls', 'xlsx');
        $file_extension = pathinfo($_FILES['uploaded_file']['name'], PATHINFO_EXTENSION);
        if (!in_array(strtolower($file_extension), $allowed_extensions)) {
            $errmsg_arr[] = 'Only Excel files are allowed';
            $errflag = true;
        }
    } else {
        // File upload failed or no file was selected
        $errmsg_arr[] = 'File upload failed or no file selected';
        $errflag = true;
    }

    // Check for any validation errors before proceeding
    if ($errflag) {
        foreach ($errmsg_arr as $msg) {
            echo $msg . '<br>';
        }
        exit();
    } else {
        // Upload the file
        $uploaded_file = $_FILES['uploaded_file'];
        $filename = basename($uploaded_file['name']);
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $new_filename = mt_rand(1000, 9999) . "_File." . $ext;
        $target_dir = "teacher/uploads/";
        $target_file = $target_dir . $new_filename;

        if (move_uploaded_file($uploaded_file['tmp_name'], $target_file)) {
            // File uploaded successfully, insert file details into the database
            $name = clean($_POST['name']);
            mysqli_query($link, "INSERT INTO result_files (exam_id,fdesc, floc, fdatein, teacher_id, class_id, fname, uploaded_by)
                                VALUES ('$exam_id','$filedesc', '$target_file', NOW(), '$session_id', '$class_id', '$name', '$uploaded_by')") 
                                or die(mysqli_error($link));

            // Redirect to a success page or perform any other actions
            header("Location: ResultAnalysis.php?exam_id=$exam_id");
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<?php
// Include necessary files and PhpSpreadsheet
require './vendor/autoload.php'; // Path to PhpSpreadsheet autoload file
include '../database/db_con.php'; // Database connection file

use PhpOffice\PhpSpreadsheet\IOFactory; // Importing PhpSpreadsheet

// Verify database connection
if (!$link) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted and validate the uploaded Excel file
if (isset($_POST['upload_excel'])) {
    if (isset($_FILES['excel_file']) && $_FILES['excel_file']['error'] == 0) {
        $file_tmp = $_FILES['excel_file']['tmp_name'];

        try {
            $spreadsheet = IOFactory::load($file_tmp);
        } catch (Exception $e) {
            echo "Error loading Excel file: " . $e->getMessage();
            exit();
        }

        // Access the first sheet in the Excel file
        $sheet = $spreadsheet->getSheet(0);
        $row_count = $sheet->getHighestRow(); // Get the total number of rows

        if ($row_count < 2) {
            echo "Excel file is empty or missing expected data.";
            exit();
        }

        // Prepare the SQL statement for insertion
        $stmt = $link->prepare("INSERT INTO result_file_marks (student_id, teacher_class_id, marks) VALUES (?, ?, ?)");
        if (!$stmt) {
            echo "Failed to prepare SQL statement: " . $link->error;
            exit();
        }

        // Loop through the rows to insert data
        for ($row = 2; $row <= $row_count; $row++) {
            $student_id = $sheet->getCell("A$row")->getValue(); // Student ID in column A
            $teacher_class_id = $sheet->getCell("B$row")->getValue(); // Teacher class ID in column B
            $marks = $sheet->getCell("C$row")->getValue(); // Marks in column C

            // Validate data types to ensure correct insertion
            if (is_numeric($student_id) && is_numeric($teacher_class_id) && is_numeric($marks)) {
                $stmt->bind_param("iii", $student_id, $teacher_class_id, $marks);
                $stmt->execute();
            } else {
                echo "Invalid data format in row $row.";
                exit();
            }
        }

        // Close the statement and connection
        $stmt->close();
        $link->close();

        echo "Data uploaded successfully.";
    } else {
        echo "Error: No file uploaded or file upload failed.";
    }
} else {
    echo "Form not submitted.";
}
?>
