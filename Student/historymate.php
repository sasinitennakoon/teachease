<?php
include '../database/db_con.php';

// Retrieve schedule_id from GET parameters
$schedule_id = $_GET['schedule_id'];

// Check if schedule_id is valid
if ($schedule_id === null) {
    echo "No schedule ID provided.";
    exit;
}

// Query to get class_id based on schedule_id
$classQuery = $link->prepare("SELECT class_id FROM schedule WHERE schedule_id = ?");
$classQuery->bind_param("i", $schedule_id);
$classQuery->execute();

// Fetch the class_id
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

// Execute the query and fetch the result
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

<div class="content">
    <!-- Display the class_id -->
    <h2>Slides for Class</h2>
    <div class="panels1">
                        <div class="panel10">
                        <form method='post'>

                        <table border="0">
                    <thead>
                        <tr>
                            <th>File Name</th>
                            <th>File Description</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
        <?php
        // Check if the result has data
        $filequery= mysqli_query($link,"SELECT files.*, schedule.schedule_id
        FROM files
        INNER JOIN schedule ON schedule.class_id = files.class_id
        WHERE schedule.schedule_id = $schedule_id")or die(mysqli_error($link));
        while($row = mysqli_fetch_array($filequery)){
            $id  = $row['file_id'];
        ?>
    <tr>
                            <td><?php echo $row['fname']; ?></td>
                            <td><?php echo $row['fdesc']; ?></td>
                            <td><div class="but"><button class="btn btn-info" onclick="window.location.href='<?php echo $row['floc']; ?>'">View </button></td>
                        </tr>
                    </tbody>
				
                </div>
            </div>
    </div>
    <?php
					}
				
				?>
                    </body>
                    </html>

<?php
$stmt->close();
$link->close();
?>
