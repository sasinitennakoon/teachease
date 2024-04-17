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
                    <td>අක්ෂර මාලාව හා අක්ෂර වින්‍යාසය</td>
                    <td>90</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>වාක්‍ය රීති</td>
                    <td>85</td>
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
            
            </tbody>
        </table>
    </div>
</div>








<script>
    function goBack() {
            window.history.back();
        }
</script>