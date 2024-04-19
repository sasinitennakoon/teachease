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
        <td>80</td>
      </tr>
      <tr>
        <td>Mathematics</td>
        <td>75</td>
      </tr>
      <tr>
        <td>English</td>
        <td>85</td>
      </tr>
      <tr>
        <td>Sinhala</td>
        <td>90</td>
      </tr>
      <tr>
        <td>Buddhism</td>
        <td>70</td>
      </tr>
      <tr>
        <td>History</td>
        <td>78</td>
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
          data: [80, 75, 85, 90, 70, 78],
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