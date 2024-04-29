<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!--<link rel="stylesheet" href="../admin/css/dashboard.css"> -->
    <link rel="stylesheet" href="./css/flash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<?php include 'dropdown2.php'; ?>
    
    <button onclick="goBack()">Go to Dashboard</button>

    <div class="content">
    <h1>Study with Flash Cards&#128516;</h1>

    <br>
    
        <br>
        <br>

        <div class="panel2">
            <div class="card3" onclick="window.location.href='createenglish.php';">
                <img src="./img/8-HhP2gIjmnHbB4FK.png">
                <p>Create Flash Cards</p>
            </div>

            <div class="card3" onclick="window.location.href='englishother.php';">
            <img src="./img/8-Mcv73IvIqSwXbno.png">
            <p>Let's Learn With Others</p>
        </div>

            <div class="card3" onclick="window.location.href='listflash.php';">
                <img src="./img/8-o225juUjxVlOy4l (1).png">
                <p>See What You Created</p>
            </div>

            
        </div> 

    </div>















    <script>
        function goBack() {
                window.history.back();
            }
    </script>

    </body>
    </html>