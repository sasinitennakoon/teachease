<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!--<link rel="stylesheet" href="../admin/css/dashboard.css"> -->
    <link rel="stylesheet" href="./css/1stterm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<?php include 'dropdown2.php'; ?>

<button onclick="goBack()">Go to Dashboard</button>

<div class="content">
    <h1>3rd term Result Sheet</h1>
    
    <div class="panelsD">
            <h2>Result Sheet-2021</h2>
            <h3>Term 03</h3>

            <table border="1px">

                <td colspan="3">Index Number:21020957</td>
                <td colspan="6">Status: pass</td>
        
                <tr>
                    <td colspan="3"> Registration Number: STD1012</td>
                    <td colspan="6">Grade: 10</td>
                </tr>
        
                <tr>
                    <td colspan="6">Student Name:R.M.I.U Rathnayake</td>
                </tr>
        
                <tr>
                    <td colspan="6">Parent Name: R.M.U.K Rathnayake</td>
                </tr>
                <tr style="background-color: lightgreen;">
                <th>Number</th>
                <th>Subject</th>
                <th>Total Mark</th>
                <th>Previous Term Mark</th>
                <th>Obtain Mark</th>
                <th>Remarks</th>
                    </tr>
                <tr>
                    <th>01</th>
                    <th>Science</th>
                    <th>100</th>
                    <th>40</th>
                    <th>80</th>
                    <th>pass</th>
                </tr>
        
                <tr>
                    <th>01</th>
                    <th>Mathematics</th>
                    <th>100</th>
                    <th>55</th>
                    <th>75</th>
                    <th>pass</th>
                </tr>
        
                <tr>
                    <th>01</th>
                    <th>English</th>
                    <th>100</th>
                    <th>80</th>
                    <th>85</th>
                    <th>pass</th>
                </tr>

                <tr>
                    <th>01</th>
                    <th>Sinhala</th>
                    <th>100</th>
                    <th>95</th>
                    <th>90</th>
                    <th>pass</th>
                </tr>

                <tr>
                    <th>01</th>
                    <th>Buddhism</th>
                    <th>100</th>
                    <th>85</th>
                    <th>70</th>
                    <th>pass</th>
                </tr>

                <tr>
                    <th>01</th>
                    <th>History</th>
                    <th>100</th>
                    <th>63</th>
                    <th>78</th>
                    <th>pass</th>
                </tr>
        
                <tr style="background-color: lightgreen;">
                    <th colspan="3">Total Marks: 478/600</th>
                    <th colspan="6">Remark: Brilliant</th>
                </tr>
        
        
            </table>
           
        

            <p>The results displayed here have been prepared and verified by the respective teacher and entered into the database.
                If you have anything to clarify here, please contanct the respective teacher ASAP.
            </p>

            <p>If you want to get more information , please be kind to use below link.</p></br>
            <a href="moreinfo.php">Overall Information</a>
    </div>





</div>









<script>
    function goBack() {
            window.history.back();
        }


        function calculateAverage() {
    var marks = document.querySelectorAll('.markInput');
    var totalMarks = 0;
    var validMarksCount = 0;

    marks.forEach(function(mark) {
        if (mark.value !== '' && !isNaN(mark.value) && parseInt(mark.value) >= 0 && parseInt(mark.value) <= 100) {
            totalMarks += parseInt(mark.value);
            validMarksCount++;
        }
    });

    if (validMarksCount > 0) {
        var average = totalMarks / validMarksCount;
        document.getElementById('averageResult').innerText = 'Average Mark: ' + average.toFixed(2);
    } else {
        document.getElementById('averageResult').innerText = 'No valid marks entered.';
    }
}

</script>