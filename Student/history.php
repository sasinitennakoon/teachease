<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!--<link rel="stylesheet" href="../admin/css/dashboard.css"> -->
    <link rel="stylesheet" href="./css/english.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<?php include 'dropdown2.php'; ?>

<button onclick="goBack()">Go to Dashboard</button>

<div class="content">
    <div class="panelsD">
        <div class="panel">
        <img src="./img/sir.png" alt="Alex David">
        <h1>History</h1>
        <p> Teacher : Amara Parakrama</p>
        <p>Class: Grade 11</p>
        <p>Date & Time: Sunday, 08.00 am - 10.00 am</p>
        </div>
    </div>
    <div class="panelsD2">
        <div class="panel1">
            <img src="./img/1,000 Scientists Publicly Sign ‘Dissent From Darwinism’ Statement.png" alt="history">
            <h1>Course Content</h1>
            <p>1.Industrial Revolution</br>
                2.Establishment of Bitish Power in Sri Lanka</br>
                3.National Renaissance in Sri Lanka</br>
                4.Political Chnages in Sri Lanka under the British</br>
                5.Social Changes in Sri Lanka under the British</br>
                6.Receiving of Independence to Sri Lanka</br>
                7.Significant Revolutions in thr World</br>
                8.World Wars and Conventions</br>

            </br>
            <button onclick="redirectToPDF()">Textbook</button>

            <button onclick="redirectToTeachersGuide()">Teachers Guide</button>

            

            </p>
            
        </div>
    </div>
</div>

<script>
    function goBack() {
            window.history.back();
        }
        function redirectToPDF() {
        window.location.href = "././docs/grade-11-history-text-book-6417fc32c433c.pdf";
         }
        
         function redirectToTeachersGuide() {
        window.location.href = "././docs/eGr11TG History.pdf";
         }

        
</script>



</body>
</html>