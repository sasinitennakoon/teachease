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
                <li><a href="announcements.php"><i class="fas fa-tachometer-alt"></i>&nbsp; Announcements</a></li>
                <li><a href="MyStudent.php"><i class="fas fa-users"></i>&nbsp;My Students</a></li>
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
        <h1>My Classes</h1>
        
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
                    document.getElementById("meetingLinkButton").innerHTML = '<a href="' + meetingLink + '" target="_blank" style="text-decoration:none;color:white;"><button class="button1">Join Meeting</button></a>';
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
                        document.getElementById("meetingLinkButton").innerHTML = '<button class="button1"><a href="' + storedMeetingLink + '" target="_blank" style="text-decoration:none;color:white;">Join Meeting</a></button>';
                    }
                });

                function goBack() {
            window.history.back();
        }

            </script>
            <button onclick="goBack()" class="button1">Go Back</button>
            <br/><br/><br/>

            <table border="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
            <td><div>
               <button onclick="createMeeting()" class="button1">Create Meeting</button></td>
               <td>
                <div id="meetingLinkButton"></div>
                </td>
                <td>
                <input type="text" id="copyInput">
                </td>
                <td>
                <button onclick="copyFunction()" class="button1">Copy Link</button>
                </td>
            </div>
            </tr>
            </tbody>
    </div> 

    <div class="panels1">
            <div class="panel10">
            <form method='post'>
            
        <?php
            $query = mysqli_query($link,"select * from class_announcements") or die(mysqli_error());
            $count  = mysqli_num_rows($query);

            if($count > 0)
            {?>

        
            
                    <table border="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Content</th>
                                <th>Type</th>
                                <th></th>
                            </tr>
                        </thead>
                    <tbody>
                    <?php
                    while($row = mysqli_fetch_array($query)){
                    $id = $row['class_announcement_id'];

                    ?>
                    
                    <tr>
                            <td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
                            <td><?php echo $row['content']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><a href="class_announcementsedit.php teacher_class_id=<?php echo $id; ?>" class="button" style="color:black;"><i class="fa fa-fw fa-pencil">Edit</i></a></td>
                            
                        </tr>
                    </tbody>

                   

                    <?php } }else{ ?>
                        <h3>There is no announcements currently available</h3>
					<?php  } ?>

                    <div class="but">
                    <button class="btn btn-info">
                            <a href="class_announcementadd.phpteacher_class_id=<?php echo $id; ?>" style='text-decoration:none;color:white;'>
                                <i class="fa fa-fw fa-plus"></i>&nbsp;Add</a>
                            </button>
                            <button type="submit" name="delete" class="btn btn-info">
                                <i class="fa fa-fw fa-trash"></i> Delete
                            </button>
                    </div>

                    </table>

                    </form>  
            </div>
        </div>

                    </div>


            </body>

            </html>
