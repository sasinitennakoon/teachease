<?php include '../database/db_con.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="././css/progress.css">
    <link rel="stylesheet" href="././css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

<?php include 'dropdown2.php'; ?>

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="././img/logo1.png" alt="Logo">
            </div>
            <hr color="white">
            <nav>
                <ul>
                <li><a href="studash.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="announcements.php"><i class="fas fa-bullhorn"></i> Announcements</a></li>
            <li><a href="MyCourses.php"><i class="fas fa-book"></i> My Courses</a></li>
            <li><a href="StudyMaterials.php"><i class="fas fa-book-open"></i> Study Materials</a></li>
            <li><a href="Tasks.php"><i class="far fa-sticky-note"></i></i> Flash Cards</a></li>
            <li><a href="Progress.php" class="active"><i class="fas fa-chart-line"></i> Progress Report</a></li>
            <li><a href="ExamR.php"><i class="fas fa-chalkboard"></i> Exam Results</a></li>
            <li><a href="msg.php"><i class="fas fa-envelope"></i> Messages</a></li>
            <li><a href="Feedback.php" ><i class="fas fa-comment"></i> Feedback Collection</a></li>
    
                </ul>
            </nav>
        </div>
        <button onclick="goBack()">Go to Dashboard</button>

<div class="content">
<?php
        $query = mysqli_query($link,"select * from marks_new where student_id = '$session_id'");
        $count = mysqli_num_rows($query);

        if($count <= 0 || $count != 18)
        {
          echo '<b>There is No Results available to you.</b>';
        }
        else
        {
        ?>
    <div class="panelsD">
        <h2>Overall Progress</h2>

       

    <div class="chart-container">
        <canvas id="progress-chart"></canvas>
     </div>
    </div>

    <h3>You can analys Your Progress by this section</h3>
     <button class="but2" onclick="window.location.href='1progress.php';">1 st Term</button>
     <button class="but2" onclick="window.location.href='2progress.php';">2 nd Term</button>
     <button class="but2" onclick="window.location.href='3progress.php';">3 rd Term</button>

</div>



<?php
  /*$query = mysqli_query($link,"select * from parent where parent_id = '$session_id'") or die(mysqli_error($link));
  $row = mysqli_fetch_array($query) or die(mysqli_error($query));
  $child = $row['childrenname'];*/

  //$query1 = mysqli_query($link,"select * from student where firstname = '$child'") or die(mysqli_error($link));
  //$row = mysqli_fetch_array($query1) or die($query1);
  //$student = $row['firstname'];
  $student_id = $session_id;
?>



<?php 
    $query = mysqli_query($link,"select * from marks_new where student_id = '$student_id' AND term_id='1'");
    $count = mysqli_num_rows($query);
    if($count != 6)
    {
      echo '<b>Children Progress not available</b>';
    }
    else
    {
    $row = mysqli_fetch_array($query) or die(mysqli_error($link));
 
        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '14' AND term_id = '1'");
        $row = mysqli_fetch_array($sql);
        //echo $row['marks'];
        $sc = $row['marks'];
        
        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '9' AND term_id = '1'");
        $row = mysqli_fetch_array($sql);
        //echo $row['marks'];
        $math = $row['marks'];

        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '12' AND term_id = '1'");
        $row = mysqli_fetch_array($sql);
       // echo $row['marks'];
        $eng = $row['marks'];

        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '16' AND term_id = '1'");
        $row = mysqli_fetch_array($sql);
       // echo $row['marks'];
        $sin = $row['marks'];

        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '15' AND term_id = '1'");
        $row = mysqli_fetch_array($sql);
       // echo $row['marks'];
        $bu = $row['marks'];

        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '14' AND term_id = '1'");
        $row = mysqli_fetch_array($sql);

        //echo $row['marks'];
        $his = $row['marks'];
    }

?>

<?php 
    $query = mysqli_query($link,"select * from marks_new where student_id = '$student_id' AND term_id='2'");
    $count = mysqli_num_rows($query);
    if($count != 6)
    {
      echo '<b>Children Progress not available</b>';
    }
    else
    {
    $row = mysqli_fetch_array($query) or die($mysqli_error($query));
 
        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '14' AND term_id = '2'");
        $row = mysqli_fetch_array($sql);
        //echo $row['marks'];
        $sc2 = $row['marks'];
        
        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '9' AND term_id = '2'");
        $row = mysqli_fetch_array($sql);
       // echo $row['marks'];
        $math2 = $row['marks'];

        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '12' AND term_id = '2'");
        $row = mysqli_fetch_array($sql);
       // echo $row['marks'];
        $eng2 = $row['marks'];

        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '16' AND term_id = '2'");
        $row = mysqli_fetch_array($sql);
       // echo $row['marks'];
        $sin2 = $row['marks'];

        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '15' AND term_id = '2'");
        $row = mysqli_fetch_array($sql);
        //echo $row['marks'];
        $bu2 = $row['marks'];

        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '14' AND term_id = '2'");
        $row = mysqli_fetch_array($sql);

       // echo $row['marks'];
        $his2 = $row['marks'];
    }

?>

<?php 
    $query = mysqli_query($link,"select * from marks_new where student_id = '$student_id' AND term_id='3'");
    $count = mysqli_num_rows($query);
    if($count != 6)
    {
      echo '<b>Children Progress not available</b>';
    }
    else
    {
    $row = mysqli_fetch_array($query) or die($mysqli_error($query));
 
        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '14' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
       // echo $row['marks'];
        $sc3 = $row['marks'];
        
        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '9' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
       // echo $row['marks'];
        $math3 = $row['marks'];

        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '12' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
       // echo $row['marks'];
        $eng3 = $row['marks'];

        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '16' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
        //echo $row['marks'];
        $sin3 = $row['marks'];

        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '15' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
       // echo $row['marks'];
        $bu3 = $row['marks'];

        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '14' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);

        //echo $row['marks'];
        $his3 = $row['marks'];
    }

?>

<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
  var ctx = document.getElementById('progress-chart').getContext('2d');

  var data = {
    labels: ['Science', 'Mathematics', 'English', 'Sinhala', 'Buddhism', 'History'],
    datasets: [
      {
        label: 'Term 1',
        data: [<?php echo $sc; ?>,<?php echo $math; ?>,<?php echo $eng; ?>,<?php echo $sin; ?>,<?php echo $bu; ?>,<?php echo $his; ?>],
        borderColor: 'rgb(255, 99, 132)',
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
      },
      {
        label: 'Term 2',
        data: [<?php echo $sc2; ?>,<?php echo $math2; ?>,<?php echo $eng2; ?>,<?php echo $sin2; ?>,<?php echo $bu2; ?>,<?php echo $his2; ?>],
        borderColor: 'rgb(54, 162, 235)',
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
      },
      {
        label: 'Term 3',
        data: [<?php echo $sc3; ?>,<?php echo $math3; ?>,<?php echo $eng3; ?>,<?php echo $sin3; ?>,<?php echo $bu3; ?>,<?php echo $his3; ?>],
        borderColor: 'rgb(75, 192, 192)',
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
      }
    ]
  };

  var options = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
          stepSize: 10,
          max: 100
        }
      }]
    }
  };

  var chart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: options
  });
});
</script>

</body>

</html>