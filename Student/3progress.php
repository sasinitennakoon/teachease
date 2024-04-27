<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!--<link rel="stylesheet" href="../admin/css/dashboard.css"> -->
    <link rel="stylesheet" href="./css/progresses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<?php include 'dropdown2.php'; ?>
<?php


  $query1 = mysqli_query($link,"select * from student where student_id = '$session_id'") or die(mysqli_error($link));
  $row = mysqli_fetch_array($query1) or die($query1);
  $student = $row['firstname'];
  $student_id = $row['student_id'];
?>
<button onclick="goBack()">Go to Dashboard</button>

<div class="content">
  <div class="panelsD">
    <h2>3rd Term Marks</h2>
    <div class="chart-container">
      <canvas id="term1-chart"></canvas>
    </div>
    
    <table>
      
      <tr>
        <th>Subject</th>
        <th>Marks</th>
      </tr>
      <tr>
        <td>Science</td>
        <td><?php 
        $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '14' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $sc = $row['marks'];
        ?></td>
      </tr>
      <tr>
        <td>Mathematics</td>
        <td><?php 
        $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '9' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $math = $row['marks'];
        ?></td>
      </tr>
      <tr>
        <td>English</td>
        <td><?php 
        $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '12' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $eng = $row['marks'];
        ?></td>
      </tr>
      <tr>
        <td>Sinhala</td>
        <td><?php 
        $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '16' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $sin = $row['marks'];
        ?></td>
      </tr>
      <tr>
        <td>Buddhism</td>
        <td><?php 
        $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '15' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $bu = $row['marks'];
        ?></td>
      </tr>
      <tr>
        <td>History</td>
        <td><?php 
        $sql = mysqli_query($link,"select * from marks where student_id='$student_id' AND subject_id = '14' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);

        echo $row['marks'];
        $his = $row['marks'];
        ?></td>
      </tr>
      <!-- Add more rows for other subjects -->
    </table>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  function goBack() {
    window.history.back();
  }

  document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('term1-chart').getContext('2d');

    var data = {
      labels: ['Science', 'Mathematics', 'English', 'Sinhala', 'Buddhism', 'History'],
      datasets: [
        {
          label: '3rd Term Marks',
          data: [<?php echo $sc; ?>,<?php echo $math; ?>,<?php echo $eng; ?>,<?php echo $sin; ?>,<?php echo $bu; ?>,<?php echo $his; ?>],
          backgroundColor: [
            'rgba(29, 93, 11, 0.8)', 
            'rgba(273, 26, 26, 0.8)',  
            'rgba(273, 26, 231, 0.8)',  
            'rgba(28, 26, 273, 0.8)',  
            'rgba(227, 237, 26, 0.8)', 
            'rgba(86, 20, 26, 0.8)',  
          ],
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
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
      type: 'bar',
      data: data,
      options: options
    });
  });
</script>
</body>
</html>