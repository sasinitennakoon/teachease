<?php include '../database/db_con.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    
    <link rel="stylesheet" href="././css/inbox.css">
    <script type="text/javascript" 
        src="https://unpkg.com/@cometchat/chat-sdk-javascript@latest/CometChat.js">
    </script>
    <script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<?php include 'dropdown3.php'; ?>
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="././img/logo1.png" alt="Logo">
            </div>
            <hr color="white">
            <nav>
                <ul>
                    <li><a href="dashboard.php" ><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="childCourses.php"><i class="fas fa-book-open"></i> My Child Courses</a></li>
                <li><a href="childProgress.php" ><i class="fas fa-chart-line"></i> My Child Progress</a></li>
                <li><a href="Inbox.php" class="active"><i class="fas fa-inbox"></i> My Inbox</a></li>
                <li><a href="meet.php"><i class="fas fa-calendar-check"></i>Meeting </a></li>
                <li><a href="pay.php"><i class="fas fa-money-bill"></i> Payements</a></li>
                <li><a href="announce.php"><i class="fas fa-bullhorn"></i> Announcements</a></li>
    
                </ul>
            </nav>
        </div>

<!-- Content -->
<div class="content">
    <h1>My Inbox</h1>
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
				"uid": "u002"
			}).then(response => {
				CometChatWidget.launch({
					"widgetID": "ba6deb25-85a1-4834-8031-19a93649f004",
					"target": "#cometchat",
					"roundedCorners": "true",
					"height": "550px",
					"width": "1000px",
					"defaultID": 'anuraj', //default UID (user) or GUID (group) to show,
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
