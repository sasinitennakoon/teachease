<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="./CSS/MyStudent.css">
    <link rel="stylesheet" href="./CSS/FirstPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
<?php include 'dropdown.php'; ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="./IMG/logo1.png" alt="Logo">
        </div>
        <hr color="white">
        <nav>
            <ul>
            <li><a href="FirstPage.php"><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a></li>
                <li><a href="announcements.php"><i class="fas fa-tachometer-alt"></i>&nbsp; Announcements</a></li>
               
                <li><a href="MyClasses.php"><i class="fas fa-chalkboard-teacher"></i>&nbsp; My Classes</a></li>
                <li><a href="Schedule.php"><i class="fas fa-calendar-alt"></i>&nbsp; Schedule</a></li>
                <li><a href="StudyMeterials.php"><i class="fas fa-book"></i>&nbsp; Study Materials</a></li>
                <li><a href="Attendance.php"><i class="fas fa-check-circle"></i>&nbsp; Attendance</a></li>
                <li><a href="ExamResults.php"><i class="fas fa-poll"></i>&nbsp; Exam Results</a></li>
                <li><a href="Messages.php"><i class="fas fa-envelope"></i>&nbsp;Messages</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i>&nbsp;Feedback</a></li>
            </ul>
        </nav>
    </div>
    <div class="content">
        <!-- Your page content goes here -->
        <h1>Student Details</h1>

        <div class="panels">
            <div class="panel8">
                <table border="0">
                    <thead>
                        <tr>
                            <th>Index No</th>
                            <th>Student Name</th>
                            <th>Class Name</th>
                            <th>Phone Number</th>
                            <th>Gmail</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="but">
            <button class="button" onclick="openAddDetailsForm()"><b>Add Details</b></button>
            <button class="button"><b>Edit Details</b></button>
        </div>

        <!-- Add Details Form -->
        <div id="addDetailsForm" style="display: none;">
            <!-- Your form content goes here -->
            <form>
                <!-- Add your form fields here -->
                <label for="indexNo">Index No:</label>
                <input type="text" id="indexNo" name="indexNo">
                
                <!-- Add more fields as needed -->

                <button type="submit">Submit</button>
            </form>
        </div>

    </div>

    <script>
        function openAddDetailsForm() {
            var addDetailsForm = document.getElementById('addDetailsForm');
            addDetailsForm.style.display = 'block';
        }
    
        // Optional: Close the form when the page is loaded
        document.addEventListener('DOMContentLoaded', function () {
            var addDetailsForm = document.getElementById('addDetailsForm');
            addDetailsForm.style.display = 'none';
        });
    </script>
    
</body>
</html>
