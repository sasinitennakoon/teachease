<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="./CSS/Feedback.css">
    <link rel="stylesheet" href="./CSS/FirstPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Latest FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.css" integrity="sha384-LiWsxj4vMfsO8uyNnTVqSfeLqqkKD2pwWqFnSa6UqVqwKn9FlnNy5wKb3bYxs84p" crossorigin="anonymous">
    <script type="text/javascript" 
        src="https://unpkg.com/@cometchat/chat-sdk-javascript@latest/CometChat.js">
    </script>
    <script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
</head>
<body>
    
    <div class="user-info">
        <img src="./IMG/loginicon.png" alt="User Icon">
        <span>User Name</span>
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
        <h1>Messages</h1>
        <div id="cometchat"></div>
	<script>
	window.addEventListener('DOMContentLoaded', (event) => {
		CometChatWidget.init({
			"appID": "25147122fbfc7b73",
			"appRegion": "us",
			"authKey": "c53134f9fefc924b5f0863e1d9494acd8b30d0dc"
		}).then(response => {
			console.log("Initialization completed successfully");
			//You can now call login function.
			CometChatWidget.login({
				"uid": "john_doe"
			}).then(response => {
				CometChatWidget.launch({
					"widgetID": "ba6deb25-85a1-4834-8031-19a93649f004",
					"target": "#cometchat",
					"roundedCorners": "true",
					"height": "450px",
					"width": "800px",
					"defaultID": 'superhero1', //default UID (user) or GUID (group) to show,
					"defaultType": 'user' //user or group
				});
			}, error => {
				console.log("User login failed with error:", error);
				//Check the reason for error and take appropriate action.
			});
		}, error => {
			console.log("Initialization failed with error:", error);
			//Check the reason for error and take appropriate action.
		});
	});
	</script>
    </div>
</body>
</html>
