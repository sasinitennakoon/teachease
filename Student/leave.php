<?php include '../database/db_con.php'; ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    
    <link rel="stylesheet" href="./css/leave.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Latest FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.css" integrity="sha384-LiWsxj4vMfsO8uyNnTVqSfeLqqkKD2pwWqFnSa6UqVqwKn9FlnNy5wKb3bYxs84p" crossorigin="anonymous">
</head>
<body>
<?php include 'dropdown2.php';

if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
    header("location: index.php");
    exit();
}

$session_id=$_SESSION['id'];

$query= mysqli_query($link,"select * from student where student_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);?>
    <a href='studash.php'><button>Go to Dashboard</button></a>

    <div class="content">
        <!-- Your page content goes here -->
		<h1>Leave Requests</h1>

        <div class="panels1">
            <div class="panel10">
                <form method="post">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Student ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Class Name</th>
                            <th>Request Date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                        $query = mysqli_query($link,"select * from leaverequests WHERE student_id=$session_id") or die(mysqli_error($link));
                        $count = mysqli_fetch_array($query);

                        if($count < 0)
                        {
                            echo "<b>There is No Leave Requests</b>";
                        }
                        else
                        {
                            $query = mysqli_query(
                                $link,
                                "SELECT leaverequests.*, 
                                    student.firstname, 
                                    student.lastname, 
                                    MAX(teacher_class.class_name) AS class_name
                            
                                FROM 
                                    leaverequests
                                INNER JOIN 
                                    student 
                                ON 
                                    student.student_id = leaverequests.student_id
                                INNER JOIN 
                                    teacher_class 
                                ON 
                                    teacher_class.teacher_id = leaverequests.teacher_id
                                WHERE 
                                    leaverequests.student_id = $session_id
                                GROUP BY leaverequests.leaverequest_id, student.firstname,student.lastname"
                            ) or die(mysqli_error($link));
                            
                            while($row = mysqli_fetch_array($query))
                            {
                                $id = $row['leaverequest_id'];
                    ?>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
                            <td><?php echo $row['student_id']; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['class_name']; ?></td>
                            <td><?php echo $row['request_date']; ?></td>
                            <td><?php echo $row['status']; ?>
                        </tr>
                    </tbody>
                    <?php  } } ?>
                </table>
                            </form>
            </div>
            
        </div>

        <script>
    function goBack() {
        window.history.back();
    }
       
</body>
</html>




