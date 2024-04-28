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
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   
    <link rel="stylesheet" href="./css/subjectslist.css">
</head>

<body>
    <?php include 'dropdown1.php'; ?>
    
    <button><a href="term2rank.php">Go to Dashboard</a></button>
    <div class="content">
        <h1>Add Rank-2 Document</h1>

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



if(isset($_POST['save'])) {
   
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
    $target_dir = "admin/uploads/";
    $target_file = $target_dir . $new_filename;

    if (move_uploaded_file($uploaded_file['tmp_name'], $target_file)) {
        // File uploaded successfully, insert into result_files
        $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '$session_id'") or die(mysqli_error($link));
        $admin = mysqli_fetch_array($query);
        $uploaded_by = $admin['firstname'] . " " . $admin['lastname'];

        mysqli_query($link, "INSERT INTO rankfiles (fdesc, floc, fdatein, user_id, fname, uploaded_by) VALUES ( '$filedesc', '$target_file', NOW(), '$session_id','$file_name', '$uploaded_by')") or die(mysqli_error($link));

        // Process the Excel file
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($target_file);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $query = mysqli_query($link,"select * from average where term_id = '2'");
        $count1 = mysqli_num_rows($query);

        if($count >=1)
        {
            $sql = "Delete From average where term_id = '2'";
        }

        $count = 0; // To skip the header row
        foreach ($data as $row) {
            if ($count > 0) {
                $studentid = $row[0];
                $average_marks = $row[1];
                $term_id = $row[2];
                $rank = $row[3];
                
                

                $studentQuery = "INSERT INTO average (student_id, average_marks, term_id, rank) VALUES ('$studentid', '$average_marks', '$term_id', '$rank')";
                mysqli_query($link, $studentQuery) or die(mysqli_error($link));

                
            } else {
                $count = 1; // Skip the first (header) row
            }
        }

        // Redirect after successful import
        $_SESSION['message'] = "File uploaded and data imported successfully";
        header("Location: term2rank.php");
        exit();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
