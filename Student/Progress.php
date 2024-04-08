<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from student where student_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

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
                    <li><a href="MyCourses.php"><i class="fas fa-book"></i> My Courses</a></li>
                    <li><a href="StudyMaterials.php"><i class="fas fa-book-open"></i> Study Materials</a></li>
                    <li><a href="Tasks.php"><i class="far fa-sticky-note"></i>Flash Cards</a></li>
                    <li><a href="Progress.php"class="active"><i class="fas fa-chart-line"></i> Progress Report</a></li>
                    <li><a href="ExamR.php"><i class="fas fa-chalkboard"></i> Exam Results</a></li>
                    <li><a href="msg.php"><i class="fas fa-envelope"></i> Messages</a></li>
                    <li><a href="Feedback.php"><i class="fas fa-comment"></i> Feedback Collection</a></li>
    
                </ul>
            </nav>
        </div>
        <button onclick="goBack()">Go to Dashboard</button>

<div class="content">
    <div class="panelsD">
        <h2>Overall Progress</h2>

    <div class="chart-container">
        <canvas id="progress-chart"></canvas>
     </div>
    </div>

    <h3>You can analys Your Progress by this section</h3>
     <button class="but2" onclick="window.location.href='1progress.html';">1 st Term</button>
     <button class="but2" onclick="window.location.href='2progress.html';">2 nd Term</button>
     <button class="but2" onclick="window.location.href='3progress.html';">3 rd Term</button>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
  var ctx = document.getElementById('progress-chart').getContext('2d');

  var data = {
    labels: ['Science', 'Mathematics', 'English', 'Sinhala', 'Buddhism', 'History'],
    datasets: [
      {
        label: 'Term 1',
        data: [88,75,63,96,85,45],
        borderColor: 'rgb(255, 99, 132)',
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
      },
      {
        label: 'Term 2',
        data: [40,55,80,95,85,63],
        borderColor: 'rgb(54, 162, 235)',
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
      },
      {
        label: 'Term 3',
        data: [80,75,85,90,70,78],
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