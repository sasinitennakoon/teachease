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
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./CSS/FirstPage.css">
    <link rel="stylesheet" href="./CSS/MyClasses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   
    <!-- Include the external JavaScript file -->
    <script src="https://sdk.videosdk.live/js-sdk/0.0.78/videosdk.js"></script>
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
               
                <li><a href="MyClasses.php"  class="active"><i class="fas fa-chalkboard-teacher"></i>&nbsp; My Classes</a></li>
                <li><a href="Schedule.php"><i class="fas fa-calendar-alt"></i>&nbsp; Schedule</a></li>
                <li><a href="StudyMeterials.php"><i class="fas fa-book"></i>&nbsp; Study Materials</a></li>
                <li><a href="Attendance.php"><i class="fas fa-check-circle"></i>&nbsp; Attendance</a></li>
                <li><a href="ExamResults.php"><i class="fas fa-poll"></i>&nbsp; Exam Results</a></li>
                <li><a href="Messages.php"><i class="fas fa-envelope"></i>&nbsp;Messages</a></li>
                <li><a href="Payment.php"><i class="fas fa-credit-card"></i>&nbsp;Payments</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i>&nbsp;Feedback</a></li>
            </ul>
        </nav>
    </div>
    <div class="content">
        <h1>My Classes</h1>
        <!--
            <script>
                // Function to create meeting ID
                function createMeeting() {
                    let meetingId =  'xxxxyxxx'.replace(/[xy]/g, function(c) {
                        var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
                        return v.toString(16);
                    });

                    let meetingLink = "https://" + window.location.host + "/Group_Project/Teacher/meeting.html?meetingId=" + meetingId;
                    localStorage.setItem('meetingLink', "https://" + window.location.host + "/Group_Project/Teacher/meeting.html?meetingId=" + meetingId);
                    console.log("http://"+ window.location.host + "/Group_Project/Teacher/?meetingId="+ meetingId)
                    document.getElementById("copyInput").value = "https://"+ window.location.host + "/Group_Project/Teacher/meeting.html?meetingId="+ meetingId;
                   // document.getElementById("meetingLinkText").innerHTML = '<a href="' + meetingLink + '" target="_blank">' + meetingLink + '</a>';
                    document.getElementById("meetingLinkButton").innerHTML = '<button class="button"><a href="' + meetingLink + '" target="_blank" style="text-decoration:none;color:white;">Join Meeting</a></button>';
                }

                // Function to copy the link
                function copyFunction() {
                /* Get the text field */
                var copyText = document.getElementById("copyInput");

                /* Select the text field */
                copyText.select();
                copyText.setSelectionRange(0, 99999); /* For mobile devices */

                /* Copy the text inside the text field */
                navigator.clipboard.writeText(copyText.value);
                }

                // When loading the page
                document.addEventListener("DOMContentLoaded", function () {
                    var storedMeetingLink = localStorage.getItem('meetingLink');
                    if (storedMeetingLink) {
                        document.getElementById("copyInput").value = storedMeetingLink;
                        document.getElementById("meetingLinkButton").innerHTML = '<button class="button"><a href="' + storedMeetingLink + '" target="_blank" style="text-decoration:none;color:white;">Join Meeting</a></button>';
                    }
                });

            </script>-->
            <!--<div>
               <button onclick="createMeeting()" class="button">Create Meeting</button>
                <br/><br/><br/>
                <div id="meetingLinkButton"></div>-->
                <!--<div id="meetingLinkText"></div> -->
                <!--<br/><br/>
                <input type="text" id="copyInput">
                <button onclick="copyFunction()" class="button">Copy Link</button>
            </div>-->
            
                <!--
                <table border="0">
                    <thead>
                        <tr>
                            
                            <th>Class Name</th>
                            <th>Subject</th>
                            <th>Number of Students</th>
                            <th>More Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           
                            <td>SC01</td>
                            <td>Science</td>
                            <td>30</td>
                            <td><a href="MyClasses1.php" style="text-decoration:none;color:white;"><button class="button1">More</button></a></td>
                        </tr>
                        <tr>
                        
                            <td>EN01</td>
                            <td>English</td>
                            <td>20</td>
                            <td><a href="MyClasses1.php" style="text-decoration:none;color:white;"><button class="button1">More</button></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="but">
            <button class="button" onclick="openAddDetailsForm()"><b>Add Details</b></button>
            <button class="button"><b>Edit Details</b></button>
        </div>

        <!-- Add Details Form -->
       <!-- <div id="addDetailsForm" style="display: none;">
            <!-- Your form content goes here 
            <form>
                <!-- Add your form fields here 
                <label for="indexNo">Index No:</label>
                <input type="text" id="indexNo" name="indexNo">
                
                <!-- Add more fields as needed 

                <button type="submit">Submit</button>
            </form>
        </div>-->
           

    <script>/*
        function openAddDetailsForm() {
            var addDetailsForm = document.getElementById('addDetailsForm');
            addDetailsForm.style.display = 'block';
        }
    
        // Optional: Close the form when the page is loaded
        /*document.addEventListener('DOMContentLoaded', function () {
            var addDetailsForm = document.getElementById('addDetailsForm');
            addDetailsForm.style.display = 'none';
        });
    </script>
        <?php $query = mysqli_query($link,"select * from teacher_class
			LEFT JOIN class ON class.class_id = teacher_class.class_id
			LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
			where teacher_id = '$session_id' ")or die(mysqli_error());
			$count = mysqli_num_rows($query);
										
				if ($count > 0){?>
                    <div class="panels">
                        <div class="panel8">
                        <form method='post'>

                        <table border="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Class Name</th>
                            <th>Subject</th>
                            <th>Number of Students</th>
                            <th>More Details</th>
                        </tr>
                    </thead>
                    <tbody>
        <?php
				while($row = mysqli_fetch_array($query)){
				$id = $row['teacher_class_id'];
				
		?>
            
                        <tr>
                            <td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
                            <td><?php echo $row['class_name']; ?></td>
                            <td><?php echo $row['subject_title']; ?></td>
                            <td><?php echo $row['noofparticipant']; ?></td>
                            <td><a href="MyClasses1.php" style="text-decoration:none;color:white;"><button type='button' class="button1">More</button></a></td>
                        </tr>
                    </tbody>
				
                </div>
            </div>
    </div>
					<?php //include("delete_class_modal.php"); ?>
						<?php } }else{ ?>
                            <h3>No Class Currently Added</h3>
					<?php  } ?>

                   
                        <div class="but">
                
                            <button class="btn btn-info">
                            <a href="add_class.php" style='text-decoration:none;color:white;'>
                                <i class="fa fa-fw fa-plus"></i>&nbsp;Add Class</a>
                            </button>
                            <button type="submit" name="delete" class="btn btn-info">
                                <i class="fa fa-fw fa-trash"></i> Delete
                            </button>
                
                        </div>
                    </form>
                
            </body>

            </html>


            <?php
                 include '../database/db_con.php';

                 if (isset($_POST['delete'])){
                         $id=$_POST['selector'];
                         $N = count($id);
                         
                     for($i=0; $i < $N; $i++)
                     {
                         $result = mysqli_query($link,"DELETE from teacher_class
                         where teacher_class_id='$id[$i]'");
                     }
             ?>
                 <script>
                     window.location = "MyClasses.php";
                 </script>
             
             <?php
                 }
             ?>
