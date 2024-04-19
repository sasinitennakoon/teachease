<?php include '../database/db_con.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./css/general2.css">
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

$session_id=$_SESSION['id'];?>

<a href='history.php'><button>Go to Dashboard</button></a>
    <div class="content">
        <!-- Your page content goes here -->
        <h1>Student Dashboard</h1>

        <div class="panels1">
            <div class="panel10">
                <form method="post">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                        $query = mysqli_query($link,"select * from schedule where subject_id = '11'") or die(mysqli_error($link));
                        $count = mysqli_fetch_array($query);

                        if($count < 0)
                        {
                            echo "<b>There is No Classes currently for the subject</b>";
                        }
                        else
                        {
                            $query = mysqli_query($link,"SELECT schedule.*,teacher.firstname, teacher.lastname
                            FROM schedule
                            LEFT JOIN teacher ON teacher.teacher_id = schedule.teacher_id
                            LEFT JOIN subject ON subject.subject_id = schedule.subject_id
                            ") or die(mysqli_error($link));
                           while($row = mysqli_fetch_array($query))
                           {
                               $id = $row['subject_id'];

                   ?>
                   <tbody>
                       <tr>
                           <td><input type="checkbox" name="selector[]" value="<?php echo $session_id; ?>"></td>
                           <td><?php echo $row['firstname']; ?></td>
                           <td><?php echo $row['lastname']; ?></td>
                           <td><?php echo $row['date']; ?></td>
                           <td><?php echo $row['time']; ?></td>
                           <input type='hidden' name='schedule_id' value="<?php $row['schedule_id']; ?>">
                           <td>
                               <?php 
                                // Check if the user has already joined this class
                               $isJoined = mysqli_query($link, "SELECT * FROM student_class WHERE student_id = '$session_id' AND schedule_id = '{$row['schedule_id']}'")->num_rows > 0;
       
                                         
                                 if ($isJoined) {
                                 // User has joined, display the leave button
                                 echo '<button type="submit" name="leave" class="button" style="background-color:#850404;">Leave</button>';
                                } else {
                                 // User has not joined, display the join button
                                 echo '<button type="submit" name="join" class="button" style="background-color:#055305;">Join</button>';
                                    }
                                
                                    ?>
                                </td>

                                
                        </tr>
                    </tbody>
                    <?php  } } ?>
                </table>
                            </form>
            </div>
            
        </div>

      
       
</body>
</html>

<?php


if (isset($_POST['leave'])) {
    $id = $_POST['selector'];
    $N = count($id);
    $schedule_id = $_POST['schedule_id'];
        
    for($i=0; $i < $N; $i++)
    {
        $result = mysqli_query($link, "update student_class set status='leave' WHERE schedule_id ='$schedule_id' AND student_id ='$session_id'");
    }

    ?>
    <script>
    window.location = 'addhistoryclass.php';
    </script> 
<?php
}

else if (isset($_POST['join'])) {
    $id = $_POST['selector'];
    $N = count($id);
    $schedule_id = $_POST['schedule_id'];

    for($i=0; $i < $N; $i++)
    {
        $result = mysqli_query($link, "INSERT INTO student_class (student_id, schedule_id, status) VALUES ('$session_id', '$schedule_id', 'joined')");
    }
?>
   <script>
    window.location = 'addhistoryclass.php';
</script> 
<?php
}
?>
       
    

