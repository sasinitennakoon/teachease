<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from users where user_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./css/Announcementedit.css">

    <!-- Latest FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.css" integrity="sha384-LiWsxj4vMfsO8uyNnTVqSfeLqqkKD2pwWqFnSa6UqVqwKn9FlnNy5wKb3bYxs84p" crossorigin="anonymous">
</head>
<body>
    <div class="user-info">
        
    </div>
    <button onclick="goBack()">Go to Dashboard</button>
    <div class="content">
        <!-- Your page content goes here -->
        <h1>Subject List</h1>
        
        <div class="panels">
            <div class="panel">

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
