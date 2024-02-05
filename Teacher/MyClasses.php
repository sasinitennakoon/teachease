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
<div class="dropdown" style="float:right;">
<div class="dropbtn">
              <img src="./IMG/loginicon.png" alt="User Icon">
                <?php echo $row['firstname']; ?>
				<i class="fa fa-caret-down"></i>
                </div>
			  <div class="dropdown-content">
				<a href="MyProfile.php"><i class="fa fa-fw fa-user"></i>Profile</a>
				<a href="ResetPassword.php"><i class="fa fa-fw fa-unlock-alt"></i>Change Password</a>
				<a href="../logout.php"><i class="fa fa-fw fa-sign-out-alt"></i>Log out</a>
			  </div>
			</div> 
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="./IMG/logo1.png" alt="Logo">
        </div>
        <hr color="white">
        <nav>
            <ul>
                <li><a href="FirstPage.php"><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a></li>
                <li><a href="MyStudent.php"><i class="fas fa-users"></i>&nbsp;My Students</a></li>
                <li><a href="MyClasses.php"  class="active"><i class="fas fa-chalkboard-teacher"></i>&nbsp; My Classes</a></li>
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

            </script>
            <div>
                <button onclick="createMeeting()" class="button">Create Meeting</button>
                <br/><br/><br/>
                <div id="meetingLinkButton"></div>
                <!--<div id="meetingLinkText"></div> -->
                <br/><br/>
                <input type="text" id="copyInput">
                <button onclick="copyFunction()" class="button">Copy Link</button>
            </div>
    </div>

            </body>

            </html>
