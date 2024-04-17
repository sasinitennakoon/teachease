<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!--<link rel="stylesheet" href="../admin/css/dashboard.css"> -->
    <link rel="stylesheet" href="./css/info.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
<?php include 'dropdown2.php'; ?>

<div class="content">
    <h1> Overall Result Analysis</h1>

    <div class="card-container">
        <div class="card">
            <p id="average"></p> 
            <table>
                <tr>
                    <th>Subject Name</th>
                    <th>Marks</th>
                </tr>
                <tr>
                    <td>Science</td>
                    <td>88</td>
                </tr>
                <tr>
                    <td>Mathematics</td>
                    <td>75</td>
                </tr>
                <tr>
                    <td>English</td>
                    <td>63</td>
                </tr>
                <tr>
                    <td>Sinhala</td>
                    <td>96</td>
                </tr>
                <tr>
                    <td>Buddhism</td>
                    <td>85</td>
                </tr>
                <tr>
                    <td>History</td>
                    <td>45</td>
                </tr>
               
            </table>

        </br>
            
            <button class="average-btn" onclick="calculateAverage()">Calculate Average Mark</button>
            
        </div>
        <div class="card">
            <h2>Total Marks of the Class</h2>
            <canvas id="scatterPlot"></canvas>
        </div>
    </div>


</div>



<script>
    function goBack() {
            window.history.back();
        }

        
   // Data for scatter plot
var totalMarks = [380, 250, 536, 493, 452, 225, 452, 360, 430, 410];
var numberOfStudents = [];
for (var i = 1; i <= totalMarks.length; i++) {
    numberOfStudents.push(i);
}

// Find the index of the highlighted mark
var highlightedIndex = totalMarks.indexOf(452);

// Set up data for scatter plot
var scatterChartData = {
    datasets: [{
        label: 'Total Marks',
        data: totalMarks.map((mark, index) => ({
            x: numberOfStudents[index],
            y: mark,
            // Highlight the mark with value 452
            pointStyle: index === highlightedIndex ? 'triangle' : 'circle',
            backgroundColor: index === highlightedIndex ? 'red' : 'blue',
            radius: index === highlightedIndex ? 10 : 5 // Bigger radius for the highlighted point
        })),
    }]
};

// Set up options for scatter plot
var scatterChartOptions = {
    scales: {
        x: {
            title: {
                display: true,
                text: 'Number of Students'
            }
        },
        y: {
            title: {
                display: true,
                text: 'Total Marks'
            }
        }
    }
};

// Get canvas element
var scatterCanvas = document.getElementById('scatterPlot');

// Create scatter plot
var scatterChart = new Chart(scatterCanvas, {
    type: 'scatter',
    data: scatterChartData,
    options: scatterChartOptions
});

</script>

</body>
</html>