<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Flashcard Bundle</title>
    <link rel="stylesheet" href="./css/view.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <button class="dashboard-button" onclick="goBack()">Go to Dashboard</button>
    <h1>Lets Enjoy!</h1>

    <?php
    // Include database connection file
    include '../database/db_con.php';

    
    ?>


    <script>
    
        function goBack() {
            window.history.back();
        }

        
    </script>
</body>
</html>
