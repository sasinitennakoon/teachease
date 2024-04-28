

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

<?php


  $query1 = mysqli_query($link,"select * from student where student_id = '$session_id'") or die(mysqli_error($link));
  $row = mysqli_fetch_array($query1) or die($query1);
  $student = $row['firstname'];
  $student_id = $row['student_id'];
?>

<a href="3rdterm.php"><button>Go to Dashboard</button></a>
<?php
      $query = mysqli_query($link,"select * from marks_new where student_id = '$session_id' AND term_id = '2' ");
      $count = mysqli_num_rows($query);

      if($count <= 0  || $count != 6)
      {
         echo '<center><b>There is no marks available</b></center>';
      }
      else
      {
?>
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
                    <td><?php 
        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '14' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $sc = $row['marks'];
        ?></td>
                </tr>
                <tr>
                    <td>Mathematics</td>
                    <td><?php 
        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '9' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $math = $row['marks'];
        ?></td>
                </tr>
                <tr>
                    <td>English</td>
                    <td><?php 
        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '12' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $eng = $row['marks'];
        ?></td>
                </tr>
                <tr>
                    <td>Sinhala</td>
                    <td><?php 
        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '16' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $sin = $row['marks'];
        ?></td>
                </tr>
                <tr>
                    <td>Buddhism</td>
                    <td><?php 
        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '15' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);
        echo $row['marks'];
        $bu = $row['marks'];
        ?></td>
                </tr>
                <tr>
                    <td>History</td>
                    <td><?php 
        $sql = mysqli_query($link,"select * from marks_new where student_id='$student_id' AND subject_id = '14' AND term_id = '3'");
        $row = mysqli_fetch_array($sql);

        echo $row['marks'];
        $his = $row['marks'];
        ?></td>
                </tr>
               
            </table>

        </br>
        <?php 
             $query = mysqli_query($link,"select * from average where student_id = '$session_id' AND term_id = '3' ");
             $count = mysqli_num_rows($query);

             if($count <= 0 || $count != 6)
             {
                echo '<center><b>There is no average marks available</b></center>';
             }
             else
             {
             $row = mysqli_fetch_array($query);
 
             $averageMark = $row['average_marks'];
     
             
             
        ?>
            
            <button class="average-btn">Average Mark <?php echo $averageMark; ?></button>
            
           <!-- <script>
        function calculateAverage() {
            // Make an AJAX request to the PHP script on the same page
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "moreinfo1.php?action=calculate_average", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("average-mark").innerHTML = "Average Mark: " + xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>-->

   
           
        
            
        </div>
        <?php } ?>
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
            <svg id="scienceScatterPlot" width="600" height="400"></svg>
        </div>

        <div class="card">
            <h2> Mathematics Mark Distribution of the Class</h2>
            <svg id="mathematicsScatterPlot" width="600" height="400"></svg>
        </div>
    </div>
    
    <div class="card-container">
        <div class="card">
            <h2> English Mark Distribution of the Class</h2>
            <svg id="englishScatterPlot" width="600" height="400"></svg>
        </div>

        <div class="card">
            <h2> Sinhala Mark Distribution of the Class</h2>
            <svg id="sinhalaScatterPlot" width="600" height="400"></svg>
        </div>
    </div>

    <div class="card-container">
        <div class="card">
            <h2> Buddhism Mark Distribution of the Class</h2>
            <svg id="buddhismScatterPlot" width="600" height="400"></svg>
        </div>

        <div class="card">
            <h2> History Mark Distribution of the Class</h2>
            <svg id="historyScatterPlot" width="600" height="400"></svg>
        </div>
    </div>

</div>

<?php } ?>

<script>
   <?php
   $studentMarks = [];
        $query = mysqli_query($link,"select * from average where term_id = '3'");
        while($row = mysqli_fetch_array($query))
        {
            $avg = $row['average_marks'];
            $total = $avg * 6;
            $studentMarks[] = $total;
        
        }
        $studentMarksJSON = json_encode($studentMarks);
   ?>

        // Data for scatter plot total marks
var totalMarks = <?php echo $studentMarksJSON; ?>;
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







// Function to create scatter plot
function createScatterPlot(svgId, marksData) {
    const marks = marksData;
    const students = marks.length;
    const maxMark = Math.max(...marks);

    const svg = d3.select("#" + svgId);

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
}

// Data for scatter plot total marks
var totalMarks = <?php echo $studentMarksJSON; ?>;
createScatterPlot('totalMarksScatterPlot', totalMarks);

<?php
   $studentMarks = [];
        $query = mysqli_query($link,"select * from marks_new where term_id = '3' AND subject_id = '14' ");
        while($row = mysqli_fetch_array($query))
        {
            $mar = $row['marks'];
            
            $studentMarks[] = $mar;
        
        }
        $studentMarksJSON = json_encode($studentMarks);
   ?>

// Data for scatter plot for each subject
const scienceMarks = <?php echo $studentMarksJSON;?>;
createScatterPlot('scienceScatterPlot', scienceMarks);

<?php
   $studentMarks = [];
        $query = mysqli_query($link,"select * from marks_new where term_id = '3' AND subject_id = '9' ");
        while($row = mysqli_fetch_array($query))
        {
            $mar = $row['marks'];
            
            $studentMarks[] = $mar;
        
        }
        $studentMarksJSON = json_encode($studentMarks);
   ?>

const mathematicsMarks = <?php echo $studentMarksJSON;?>;
createScatterPlot('mathematicsScatterPlot', mathematicsMarks);

<?php
   $studentMarks = [];
        $query = mysqli_query($link,"select * from marks_new where term_id = '3' AND subject_id = '12' ");
        while($row = mysqli_fetch_array($query))
        {
            $mar = $row['marks'];
            
            $studentMarks[] = $mar;
        
        }
        $studentMarksJSON = json_encode($studentMarks);
   ?>

const englishMarks = <?php echo $studentMarksJSON;?>;
createScatterPlot('englishScatterPlot', englishMarks);

<?php
   $studentMarks = [];
        $query = mysqli_query($link,"select * from marks_new where term_id = '3' AND subject_id = '16' ");
        while($row = mysqli_fetch_array($query))
        {
            $mar = $row['marks'];
            
            $studentMarks[] = $mar;
        
        }
        $studentMarksJSON = json_encode($studentMarks);
   ?>

const sinhalaMarks = <?php echo $studentMarksJSON;?>;
createScatterPlot('sinhalaScatterPlot', sinhalaMarks);

<?php
   $studentMarks = [];
        $query = mysqli_query($link,"select * from marks_new where term_id = '3' AND subject_id = '15' ");
        while($row = mysqli_fetch_array($query))
        {
            $mar = $row['marks'];
            
            $studentMarks[] = $mar;
        
        }
        $studentMarksJSON = json_encode($studentMarks);
   ?>

const buddhismMarks = <?php echo $studentMarksJSON;?>;
createScatterPlot('buddhismScatterPlot', buddhismMarks);

<?php
   $studentMarks = [];
        $query = mysqli_query($link,"select * from marks_new where term_id = '3' AND subject_id = '11' ");
        while($row = mysqli_fetch_array($query))
        {
            $mar = $row['marks'];
            
            $studentMarks[] = $mar;
        
        }
        $studentMarksJSON = json_encode($studentMarks);
   ?>

const historyMarks = <?php echo $studentMarksJSON;?>;
createScatterPlot('historyScatterPlot', historyMarks);

</script>

</body>
</html>