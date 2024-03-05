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
    <link rel="stylesheet" href="./css/studentdashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   
    <!-- Latest FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.css" integrity="sha384-LiWsxj4vMfsO8uyNnTVqSfeLqqkKD2pwWqFnSa6UqVqwKn9FlnNy5wKb3bYxs84p" crossorigin="anonymous">
</head>
<body>
<?php include 'dropdown1.php'; ?>
    <button onclick="goBack()">Go to Dashboard</button>
    <div class="content">
        <!-- Your page content goes here -->
        <h1>Student Dashboard</h1>

        <div class="panels">
            <div class="panel">
                <table>
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>E-mail</th>
                            <th>Phone Number</th>
                            <th>Other Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>S1001</td>
                            <td>AAAA</td>
                            <td>BBBB</td>
                            <td>Jaffna</td>
                            <td>aaaa@gmail.com</td>
                            <td>0766463204</td>
                            <td>Other Details</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="add-button" onclick="openAddDetailsForm()">Add New</button>
        </div>

        <!-- Add Details Form -->
        <div id="addDetailsForm">
            <!-- Content of your add details form goes here -->
        </div>
    </div>

    <script>
        function openAddDetailsForm() {
            // Redirect to studentnewadd.html
            window.location.href = 'studentnewadd.php';
        }

        function goBack() {
            window.history.back();
        }
    </script>
    
</body>
</html>
