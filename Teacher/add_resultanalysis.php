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
                                 $query = mysqli_query($link,"SELECT exam_results.* ,teacher_class.class_name
                                 FROM exam_results
                                 INNER JOIN teacher_class on teacher_class.teacher_id=exam_results.teacher_id
                                 WHERE exam_results.teacher_id = '$session_id' AND exam_results.exam_id='$exam_id'
                                 GROUP BY exam_id; ")or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)){ $id = $row['class_id'];
                                        $class_id = $row['class_id'];
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
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_GET['exam_id'])) {
    $exam_id = $_GET['exam_id'];
}

if(isset($_POST['save'])) {
    $class_id = $_POST['class_id'];
    $filedesc = trim($_POST['desc']); // File description
    $errmsg_arr = [];
    $errflag = false;

    // Validate file description
    if (empty($filedesc)) {
        $errmsg_arr[] = 'File description is missing';
        $errflag = true;
    }

    // Validate the uploaded file
    if (isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] == 0) {
        $file = $_FILES['uploaded_file'];
        $file_size = $file['size'];
        $file_name = $file['name'];
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Check file size
        if ($file_size >= 1048576 * 5) { // 5MB limit
            $errmsg_arr[] = 'File exceeds 5MB size limit';
            $errflag = true;
        }

        // Check allowed extensions
        $allowed_extensions = ['xls', 'xlsx'];
        if (!in_array($file_extension, $allowed_extensions)) {
            $errmsg_arr[] = 'Only Excel files are allowed';
            $errflag = true;
        }
    } else {
        $errmsg_arr[] = 'No file was selected or file upload failed';
        $errflag = true;
    }

    // If there are errors, display them and exit
    if ($errflag) {
        foreach ($errmsg_arr as $msg) {
            echo $msg . '<br>';
        }
        exit();
    }

    // If no errors, proceed with file upload
    $uploaded_file = $_FILES['uploaded_file'];
    $ext = pathinfo($uploaded_file['name'], PATHINFO_EXTENSION);
    $new_filename = mt_rand(1000, 9999) . "_File." . $ext;
    $target_dir = "teacher/uploads/";
    $target_file = $target_dir . $new_filename;

    if (move_uploaded_file($uploaded_file['tmp_name'], $target_file)) {
        // File uploaded successfully, insert into result_files
        $query = mysqli_query($link, "SELECT * FROM teacher WHERE teacher_id = '$session_id'") or die(mysqli_error($link));
        $teacher = mysqli_fetch_array($query);
        $uploaded_by = $teacher['firstname'] . " " . $teacher['lastname'];

        mysqli_query($link, "INSERT INTO result_files (exam_id, fdesc, floc, fdatein, teacher_id, class_id, fname, uploaded_by) VALUES ('$exam_id', '$filedesc', '$target_file', NOW(), '$session_id', '$class_id', '$file_name', '$uploaded_by')") or die(mysqli_error($link));

        // Process the Excel file
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($target_file);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = 0; // To skip the header row
        foreach ($data as $row) {
            if ($count > 0) {
                $id = $row[0];
                $class = $row[1];
                $mark = $row[2];
                $grade = $row[3];
                $subject = $row[4];
                $term = $row[5];
                $rank=$row[6];
                $exam_id = $_GET['exam_id'];

                $studentQuery = "INSERT INTO result_file_marks (student_id, teacher_class_id, marks, grade,exam_id) VALUES ('$id', '$class', '$mark', '$grade','$exam_id')";
                mysqli_query($link, $studentQuery) or die(mysqli_error($link));

                $markQuery = "INSERT INTO marks_new (student_id, subject_id, marks, term_id,rank) VALUES ('$id', '$subject', '$mark', '$term','$rank')";
                mysqli_query($link, $markQuery) or die(mysqli_error($link));
            } else {
                $count = 1; // Skip the first (header) row
            }
        }

        // Redirect after successful import
        $_SESSION['message'] = "File uploaded and data imported successfully";
        header("Location: Resultanalysis.php?exam_id=$exam_id");
        exit();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
