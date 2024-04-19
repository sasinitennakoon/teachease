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
        <h1>English</h1>
        <p> Teacher : Alex David</p>
        <p>Class: Grade 11</p>
        <p>Date & Time: Sunday, 08.00 am - 10.00 am</p>
        </div>
    </div>
    <div class="panelsD2">
        <div class="panel1">
            <img src="./img/english.png" alt="english">
            <h1>Course Content</h1>
            <p>1.Our Responsibilities</br>
                2.Facing Challenges</br>
                3.Great Lanka</br>
                4.For A Better Tomorrow</br>
                5.Best Use of Time</br>
                6.A Moment of Fun</br>
                7.A Simple Living</br>
                8.Reading Is Fun</br>
                9.Enigms</br>
                10.Choices In Life</br>

            </br>
            <button onclick="redirectToPDF()">Textbook</button>

            <button onclick="redirectToTeachersGuide()">Teachers Guide</button>

            <button onclick="redirectToSyllabus()">Syllabus</button>
            </p>
           
        </div>
    </div>
   
</div>

<script>
    function goBack() {
            window.history.back();
        }

        function redirectToPDF() {
        window.location.href = "././docs/englishtextbook.pdf";
         }
        
         function redirectToTeachersGuide() {
        window.location.href = "././docs/eGr11TG English.pdf";
         }

         function redirectToSyllabus() {
        window.location.href = "././docs/e11syl4.pdf";
         }
</script>



</body>
</html>