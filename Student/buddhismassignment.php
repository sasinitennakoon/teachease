<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!--<link rel="stylesheet" href="../admin/css/dashboard.css"> -->
    <link rel="stylesheet" href="./css/assignment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<?php include 'dropdown2.php'; ?>

<button onclick="goBack()">Go to Dashboard</button>

<div class="content">
    <h2>Assignments</h2>
    <div class="panelsD">
        <table id="marksTable">
            <thead>
                <tr>
                    <th>Assignment No</th>
                    <th>Name of the Lesson</th>
                    <th>Mark</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>බුදු සිරිත අනුව යමු අභියෝග ජය ගනිමු</td>
                    <td>95</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h2>Quizes</h2>
    <div class="panelsD2">
        
        <table id="marksTable">
            <thead>
                <tr>
                    <th>Quiz No</th>
                    <th>Lesson Name</th>
                    <th>Mark</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>පුද්ගල විසමතා හා කර්මය</td>
                    <td>56</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>සමාධිගත සිතක මහිම</td>
                    <td>63</td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>








<script>
    function goBack() {
            window.history.back();
        }
</script>