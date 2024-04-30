<?php
include '../database/db_con.php';

// Get the schedule_id from the GET request
$schedule_id = $_GET['schedule_id'];

// Validate the schedule_id
if (!$schedule_id) {
    echo "No schedule ID provided.";
    exit;
}

// Get the class_id based on the schedule_id
$classQuery = $link->prepare("SELECT class_id FROM schedule WHERE schedule_id = ?");
$classQuery->bind_param("i", $schedule_id);
$classQuery->execute();

// Fetch class_id from the result
$classResult = $classQuery->get_result();
$class_id = null;

if ($classResult->num_rows > 0) {
    $classRow = $classResult->fetch_assoc();
    $class_id = $classRow['class_id'];
} else {
    echo "Invalid schedule ID.";
    exit;
}

// Query to fetch data from the 'files' table based on class_id
$sql = "SELECT files.*, schedule.schedule_id
        FROM files
        INNER JOIN schedule ON schedule.class_id = files.class_id
        WHERE schedule.schedule_id = ?";

// Prepare and bind the parameter
$stmt = $link->prepare($sql);
$stmt->bind_param("i", $schedule_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="././css/dashboard.css">
    <link rel="stylesheet" href="././css/general.css">
    <link rel="stylesheet" href="./css/sciencemate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<a href="sciencematerial.php"target="_blank" ><button class="dashboard-button">Go to Dashboard</button></a>
<div class="content">
    <h1>Slides for Class</h1>
    <div class="panels1">
        <div class="panel10">
            <form method='post'>
                <table>
                    <thead>
                        <tr>
                            <th>File Name</th>
                            <th>File Description</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['file_id'];
                            $currentPath = $row['floc'];
                            $newPath = preg_replace('/Student/', '', $currentPath);
                            $fullPath = "http://localhost/Group_Project/Teacher/" . $newPath;
                        ?>
                        <tr>
                            <td><?php echo $row['fname']; ?></td>
                            <td><?php echo $row['fdesc']; ?></td>
                            <td><button class="btn btn-info"><a href="<?php echo $fullPath; ?>" target="_blank">View</a></button></td>

                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

</body>
</html>

<?php
$stmt->close();
$link->close();
?>
