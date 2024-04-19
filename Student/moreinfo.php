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
    <script src="https://d3js.org/d3.v7.min.js"></script>
</head>

<body>
<?php include 'dropdown2.php'; ?>

<button onclick="goBack()">Go to Dashboard</button>

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
            <h2> Total Marks Distribution of the Class</h2>
            <canvas id="scatterPlot"></canvas>
        </div>
    </div>

    <div class="positioncrd">
        <div class="card1">
            <h2>See Your Position Here!</h2>
        </div>
       
    </div>

    <div class="card-container">
        <div class="card">
            <h2> Science Mark Distribution of the Class</h2>
            <svg id="scatterPlot"></svg>
        </div>

        <div class="card">
            <h2> Mathematics Mark Distribution of the Class</h2>
            <canvas id="scatterPlot"></canvas>
        </div>
    </div>
    
    <div class="card-container">
        <div class="card">
            <h2> English Mark Distribution of the Class</h2>
            <canvas id="scatterPlot"></canvas>
        </div>

        <div class="card">
            <h2> Sinhala Mark Distribution of the Class</h2>
            <canvas id="scatterPlot"></canvas>
        </div>
    </div>

    <div class="card-container">
        <div class="card">
            <h2> Buddhism Mark Distribution of the Class</h2>
            <canvas id="scatterPlot"></canvas>
        </div>

        <div class="card">
            <h2> History Mark Distribution of the Class</h2>
            <canvas id="scatterPlot"></canvas>
        </div>
    </div>

</div>



<script>
    function goBack() {
            window.history.back();
        }

        
// Data for scatter plot total marks
var totalMarks = [380, 250, 536, 493, 452, 225, 456, 360, 430, 410];
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



//science scatterplot

const marks = [89, 56, 23, 100, 88, 56, 86, 51, 96, 12];
        const students = marks.length;
        const maxMark = Math.max(...marks);

        const svg = d3.select("#scatterPlot");

        const xScale = d3.scaleLinear()
            .domain([0, students + 1])
            .range([50, 550]);

        const yScale = d3.scaleLinear()
            .domain([0, maxMark + 10])
            .range([350, 50]);

        svg.selectAll(".dot")
            .data(marks)
            .enter().append("circle")
            .attr("class", (d) => d === 88 ? "dot highlighted" : "dot")
            .attr("cx", (d, i) => xScale(i + 1))
            .attr("cy", (d) => yScale(d))
            .attr("r", (d) => d === 88 ? 8 : 5);

        svg.append("g")
            .attr("transform", "translate(0, 350)")
            .call(d3.axisBottom(xScale));

        svg.append("g")
            .attr("transform", "translate(50, 0)")
            .call(d3.axisLeft(yScale));
</script>

</body>
</html>