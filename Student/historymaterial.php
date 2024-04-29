<?php include '../database/db_con.php'; ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!--<link rel="stylesheet" href="../admin/css/dashboard.css"> -->
    <link rel="stylesheet" href="././css/dashboard.css">
    <link rel="stylesheet" href="././css/general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<?php include 'dropdown2.php'; ?>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="logo">
                    <img src="././img/logo1.png" alt="Logo">
                </div>
                <hr color="white">
                <nav>
                    <ul>
                        <li><a href="studash.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li><a href="announcements.php"><i class="fas fa-bullhorn"></i> Announcements</a></li>
                        <li><a href="MyCourses.php" ><i class="fas fa-book"></i> My Courses</a></li>
                        <li><a href="StudyMaterials.php" class="active"><i class="fas fa-book-open"></i> Study Materials</a></li>
                        <li><a href="Tasks.php"><i class="far fa-sticky-note"></i></i> Flash Cards</a></li>
                        <li><a href="Progress.php"><i class="fas fa-chart-line"></i> Progress Report</a></li>
                        <li><a href="ExamR.php"><i class="fas fa-chalkboard"></i> Exam Results</a></li>
                        <li><a href="msg.php"><i class="fas fa-envelope"></i> Messages</a></li>
                        <li><a href="Feedback.php"><i class="fas fa-comment"></i> Feedback Collection</a></li>
        
                    </ul>
                </nav>
            </div>

<button onclick="goBack()">Go to Dashboard</button>

<div class="content">
        <h1>History Class</h1>
    </script>

										
    <?php
					$query = mysqli_query($link,"select * FROM student_class where student_id = '$session_id'  order by student_schedule_id DESC ")or die(mysqli_error());
                    $count = mysqli_fetch_array($query);

					if($count <= 0)
					{
						echo "<b>Currently you have not registered for any History classes</b>";
					}
					else
					{?>
                    <div class="panels1">
                        <div class="panel10">
                        <form method='post'>

                        <table border="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>Teacher Namer</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
       <?php
					$query = mysqli_query($link, "SELECT student_class.*, teacher_class.class_name, subject.subject_title, schedule.date, schedule.time, teacher.firstname
                    FROM student_class 
                    INNER JOIN schedule ON schedule.schedule_id = student_class.schedule_id 
                    INNER JOIN subject ON subject.subject_id = schedule.subject_id 
                    INNER JOIN teacher_class ON teacher_class.teacher_class_id = student_class.class_id 
                    INNER JOIN teacher ON teacher.teacher_id = schedule.teacher_id  
                    WHERE student_class.student_id = '2'
                    AND subject.subject_title = 'History'  AND student_class.status='joined' 
                    ORDER BY student_class.student_schedule_id DESC") or die(mysqli_error($link));
                    while($row = mysqli_fetch_array($query)){
                    $id  = $row['student_schedule_id'];
				?>
            
                        <tr>
                            <td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
                            <td><?php echo $row['class_name']; ?></td>
                            <td><?php echo $row['subject_title']; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <td><div class="but"><button class="btn btn-info"><a href="historymate.php?schedule_id=<?php echo $row['schedule_id']?>;" style='text-decoration:none;color:white;'>View Study material</a></button></td>
                        </tr>
                    </tbody>
				
                </div>
            </div>
    </div>
    <?php
					}
				}
				?>
    
                    </body>
                    </html>