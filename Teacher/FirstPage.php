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
    <link href="'https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="CSS/analytics.css">
    <link rel="stylesheet" href="./CSS/FirstPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
      <?php include 'dropdown.php' ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="./IMG/logo1.png" alt="Logo">
        </div>
        <hr color="white">
        <nav>
            <ul>
            <li><a href="FirstPage.php" class="active"><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a></li>
                <li><a href="announcements.php"><i class="fas fa-bullhorn"></i>&nbsp; Announcements</a></li>
                
                <li><a href="MyClasses.php"><i class="fas fa-chalkboard-teacher"></i>&nbsp; My Classes</a></li>
                <li><a href="Schedule.php"><i class="fas fa-calendar-alt"></i>&nbsp; Schedule</a></li>
                <li><a href="StudyMeterials.php"><i class="fas fa-book"></i>&nbsp; Study Materials</a></li>
                <li><a href="Attendance.php"><i class="fas fa-check-circle"></i>&nbsp; Attendance</a></li>
                <li><a href="ExamResults.php"><i class="fas fa-poll"></i>&nbsp; Exam Results</a></li>
                <li><a href="Messages.php"><i class="fas fa-envelope"></i>&nbsp;Messages</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i>&nbsp;Feedback</a></li>
            </ul>
        </nav>
    </div>

    <!-- Content -->
    <div class="content">
      <main class="main-container">
        <div class="main-title">
          <h1>TEACHER ANALYSIS DASHBOARD</h1>
        </div>

        <div class="main-cards">

          <div class="card">
          <a href="studentdetails.php" style="text-decoration: none; color: inherit;">
            <div class="card-inner">
              <h3>TOTAL STUDENTS</h3>
              <?php
                $query = mysqli_query($link,"SELECT student_class.*, teacher_class.teacher_id
                FROM student_class 
                INNER JOIN teacher_class ON teacher_class.teacher_class_id = student_class.class_id
                WHERE teacher_class.teacher_id = $session_id") or die(mysqli_error());
                $count = mysqli_num_rows($query);
              ?>
              <span class="material-icons-outlined">inventory_2</span>
            </div>
            <h1><?php echo $count ?></h1>
            </a>
          </div>

          <div class="card">
          <a href="myclasses.php" style="text-decoration: none; color: inherit;">
            <div class="card-inner">
              <h3>TOTAL CLASSES</h3>
              <?php
              $query1 = mysqli_query($link,"select * from teacher_class where teacher_id = '$session_id'") or die(mysqli_error());
              $count1 = mysqli_num_rows($query1);
              ?>
              <span class="material-icons-outlined">category</span>
            </div>
            <h1><?php echo $count1 ?></h1>
            </a>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>MONTHLY EARNINGS</h3>
              <span class="material-icons-outlined">groups</span>
            </div>
            <h1>150000</h1>
          </div>

          <div class="card">
          <a href="studentleaverequests.php" style="text-decoration: none; color: inherit;">
          <div class="card-inner">
          <h3>STUDENT LEAVE REQUESTS</h3>
          <?php
          $query2 = mysqli_query($link, "SELECT * FROM leaverequests WHERE teacher_id = '$session_id'") or die(mysqli_error($link));
          $count2 = mysqli_num_rows($query2);
          ?>
          <span class="material-icons-outlined">notification_important</span>
          </div>
          <h1><?php echo $count2 ?></h1>
          </a>
          </div>


        </div>
        <div class="charts">

          <div class="charts-card">
            <h2 class="chart-title">Average Marks of Students</h2>
            <div id="area-chart"></div>
          </div>
          <?php
ob_start();

// Database connection
$included = include_once('../database/db_con.php');
if (!$included) {
    die("Error: Could not include db_connection.php");
}

// Queries for attendance and marks
$attendanceQuery = "SELECT date, class_id, COUNT(*) AS present_count FROM student_attendance WHERE status = 'present' GROUP BY date, class_id ORDER BY date ASC";
$marksQuery = "SELECT date, teacher_class_id AS class_id, ROUND(AVG(marks), 2) AS average_marks FROM result_file_marks GROUP BY date, class_id ORDER BY date ASC";

// Function to execute a query and return results
function getQueryResults($link, $query) {
    $stmt = $link->prepare($query);
    if ($stmt === false) {
        die("Failed to prepare statement: " . $link->error);
    }
    $stmt->execute();
    return $stmt;
}

// Get attendance data
$attendanceStmt = getQueryResults($link, $attendanceQuery);
$attendanceStmt->bind_result($date, $class_id, $present_count);

$attendanceData = [];
while ($attendanceStmt->fetch()) {
    $attendanceData[] = [
        'date' => $date,
        'class_id' => $class_id,
        'present_count' => $present_count,
    ];
}

// Get marks data
$marksStmt = getQueryResults($link, $marksQuery);
$marksStmt->bind_result($date, $class_id, $average_marks);

$marksData = [];
while ($marksStmt->fetch()) {
    $marksData[] = [
        'date' => $date,
        'class_id' => $class_id,
        'average_marks' => $average_marks,
    ];
}

// Find unique dates for attendance and marks
$attendanceDates = array_unique(array_column($attendanceData, 'date'));
sort($attendanceDates);

$marksDates = array_unique(array_column($marksData, 'date'));
sort($marksDates);

// Find unique class IDs from both attendance and marks
$attendanceclassIds = array_unique(array_merge(array_column($attendanceData, 'class_id')));
sort($attendanceclassIds);

$marksclassIds = array_unique(array_merge(array_column($marksData, 'class_id')));
sort($marksclassIds);



// Create series for attendance
$attendanceSeries = [];
foreach ($attendanceclassIds as $attendanceclassId) {
    $seriesData = [];
    foreach ($attendanceDates as $date) {
        $presentCount = 0;
        foreach ($attendanceData as $record) {
            if ($record['date'] === $date && $record['class_id'] === $attendanceclassId) {
                $presentCount = $record['present_count'];
                break;
            }
        }
        $seriesData[] = $presentCount;
    }
    $attendanceSeries[] = [
        'name' => 'Class ' . $attendanceclassId,
        'data' => $seriesData,
    ];
}

// Create series for marks grouped by class
$marksSeries = [];
foreach ($marksclassIds as $marksclassId) {
    $seriesData = [];
    foreach ($marksDates as $date) {
        $averageMarks = 0;
        foreach ($marksData as $record) {
            if ($record['date'] === $date && $record['class_id'] === $marksclassId) {
                $averageMarks = $record['average_marks'];
                break;
            }
        }
        $seriesData[] = $averageMarks;
    }
    $marksSeries[] = [
        'name' => 'Class ' . $marksclassId,
        'data' => $seriesData,
    ];
}

$jsonAttendanceSeries = json_encode($attendanceSeries);
$jsonMarksSeries = json_encode($marksSeries);
$jsonAttendanceDates = json_encode($attendanceDates);
$jsonMarksDates = json_encode($marksDates);

ob_end_flush();
?>




          <div class="charts-card">
            <h2 class="chart-title">Average attendance of Students</h2>
            <div id="attendance-chart"></div>
          </div>

        </div>
      </main>
      <!-- End Main -->

    </div>
    

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Embed PHP-generated data into a JavaScript variable
        var attendanceseriesData = <?php echo $jsonAttendanceSeries; ?>;
        var marksseriesData = <?php echo $jsonMarksSeries; ?>;
        var AData = <?php echo $jsonAttendanceDates; ?>;
        var MData = <?php echo $jsonMarksDates; ?>;
    </script>
    <script src="js/analytics.js"></script>
    
</body>
</html>
