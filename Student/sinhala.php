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
        <img src="./img/tea.png" alt="Alex David">
        <h1>Sinhala</h1>
        <p> Teacher : Amarawathi Ranweera</p>
        <p>Class: Grade 11</p>
        <p>Date & Time: Sunday, 08.00 am - 10.00 am</p>
        </div>
    </div>
    <div class="panelsD2">
        <div class="panel1">
            <img src="./img/Sinhala letter (1).png" alt="sinhala">
            <h1>Course Content</h1>
            <p>1.දළදා පෙරහැර</br>
                2.දුකට කියන කවි සීපද</br>
                3.අක්ෂර මාලාව හා අක්ෂර වින්‍යාසය</br>
                4.රසින් රස මවන බස් මහිමය</br>
                5.විශ්වකෝෂය</br>
                6.වාක්‍ය රීති</br>
                7.වාක්‍ය රචනය</br>
                8. දියවර සිරිසර</br>

            </br>
            <button onclick="redirectToPDF()">Textbook</button>
        
            
            </p>
           
        </div>
    </div>
</div>

<script>
    function goBack() {
            window.history.back();
        }
        function redirectToPDF() {
        window.location.href = "././docs/grade-11-sinhala-text-book-6200f7beed48f.pdf";
         }
        
        
</script>



</body>
</html>