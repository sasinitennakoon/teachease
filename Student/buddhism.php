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
        <h1>Buddhism</h1>
        <p> Teacher : Sheela Rathnayake</p>
        <p>Class: Grade 11</p>
        <p>Date & Time: Sunday, 08.00 am - 10.00 am</p>
        </div>
    </div>
    <div class="panelsD2">
        <div class="panel1">
            <img src="./img/Premium Vector _ Set buddhism buddha figure in lotus pose namaste sansara wheel lotus flower icon clipart.png" alt="buddhism">
            <h1>Course Content</h1>
            <p>1.බුදු සිරිත අනුව යමු අභියෝග ජය ගනිමු</br>
                2.බුදුගුණ අනන්ත ය</br>
                3.බුදුකුරැ දම් පුරා - දිවිමඟ ගනිමු සපුරා </br>
                4.සමාධිගත සිතක මහිම</br>
                5.ආදර්ශවත් චරිත</br>
                6.දිවි මගට එළිය දෙන දහම් පද</br>
                7.දියුණුවේ හා පිරිහීමේ දොරටු</br>
                8.පුද්ගල විසමතා හා කර්මය</br>

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
        window.location.href = "././docs/grade-11-buddhism-text-book-6200f02a7c36f.pdf";
         }
        
        
</script>



</body>
</html>