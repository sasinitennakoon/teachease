<?php include '../database/db_con.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="././css/dashboard.css">
    <script type="text/javascript" 
        src="https://unpkg.com/@cometchat/chat-sdk-javascript@latest/CometChat.js">
    </script>
    <script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
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
                <li><a href="MyCourses.php"><i class="fas fa-book"></i> My Courses</a></li>
                <li><a href="StudyMaterials.php"><i class="fas fa-book-open"></i> Study Materials</a></li>
                <li><a href="Tasks.php"><i class="far fa-sticky-note"></i></i> Flash Cards</a></li>
                <li><a href="Progress.php"><i class="fas fa-chart-line"></i> Progress Report</a></li>
                <li><a href="ExamR.php"><i class="fas fa-chalkboard"></i> Exam Results</a></li>
                <li><a href="msg.php"  class="active"><i class="fas fa-envelope"></i> Messages</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i> Feedback Collection</a></li>

            </ul>
        </nav>
    </div>

   
    <!-- Content -->
    <div class="content">
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
				"uid": "anuraj"
			}).then(response => {
				CometChatWidget.launch({
					"widgetID": "ba6deb25-85a1-4834-8031-19a93649f004",
					"target": "#cometchat",
					"roundedCorners": "true",
					"height": "550px",
					"width": "1000px",
					"defaultID": 'user1', //default UID (user) or GUID (group) to show,
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
