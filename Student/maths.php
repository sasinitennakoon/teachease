<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!--<link rel="stylesheet" href="../admin/css/dashboard.css"> -->
    <link rel="stylesheet" href="./css/maths.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<?php include 'dropdown2.php'; ?>

<button onclick="goBack()">Go to Dashboard</button>

<div class="content">
    <div class="panelsD">
        <div class="panel">
        <img src="./img/tea.png" alt="A.B.C Rajapakse">
        <h1>Mathematics</h1>
        <p> Teacher : Malith Gunarathne</p>
        <p>Class: Grade 11</p>
        <p>Date & Time: Sunday, 08.00 am - 10.00 am</p>
        </div>
    </div>
    <div class="panelsD2">
        <div class="panel1">
            <img src="./img/mathemtcs.png" alt="maths">
            <h1>Course Content</h1>
            <p>1.Real Numbers</br>
                2.Indices and Logarithms 1</br>
                3.Indices and Logarithms 2</br>
                4.Surface Area of Solids</br>
                5.Volume of the Solids</br>
                6.Percentage</br>
                7.Graphs</br>
                8.Share Market</br>

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
        window.location.href = "././docs/grade-11-mathematics-text-book-6200f6b852bc1.pdf";
         }
        
         function redirectToTeachersGuide() {
        window.location.href = "././docs/Grade 11 Mathematics Teacher Guide.pdf";
         }

         
</script>



</body>
</html>