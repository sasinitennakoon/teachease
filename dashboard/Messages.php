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

</head>
<body>
    <script>
        let appID = "25147122fbfc7b73";
        let region = "us";
        let appSetting = new CometChat.AppSettingsBuilder()
                            .subscribePresenceForAllUsers()
                            .setRegion(region)
                            .autoEstablishSocketConnection(true)
                            .build();
        CometChat.init(appID, appSetting).then(
        () => {
            console.log("Initialization completed successfully");
        }, error => {
            console.log("Initialization failed with error:", error);
        }
        );

        let authKey = "c53134f9fefc924b5f0863e1d9494acd8b30d0dc";
        var UID = "user1";
        var name = "Kevin";

        var user = new CometChat.User(UID);

        user.setName(name);

        CometChat.createUser(user, authKey).then(
            user => {
                console.log("user created", user);
            }, error => {
                console.log("error", error);
            }
        )

        var UID = "SUPERHERO1";
        //var authKey = "92db77889fabeac2e6bce0c885af481bcc1ec8b0";

        CometChat.getLoggedinUser().then(
            (user) => {
                        if(!user){
                    CometChat.login(UID, authKey).then(
                    user => {
                        console.log("Login Successful:", { user });    
                    }, error => {
                        console.log("Login failed with exception:", { error });    
                    }
                    );
                }
                }, error => {
                        console.log("Some Error Occured", { error });
                }
        );
    </script>
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
                <li><a href="FirstPage.html"><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a></li>
                <li><a href="MyStudent.html"><i class="fas fa-users"></i>&nbsp;My Students</a></li>
                <li><a href="MyClasses.html"><i class="fas fa-chalkboard-teacher"></i>&nbsp; My Classes</a></li>
                <li><a href="Schedule.html"><i class="fas fa-calendar-alt"></i>&nbsp; Schedule</a></li>
                <li><a href="StudyMeterials.html"><i class="fas fa-book"></i>&nbsp; Study Materials</a></li>
                <li><a href="Attendance.html"><i class="fas fa-check-circle"></i>&nbsp; Attendance</a></li>
                <li><a href="ExamResults.html"><i class="fas fa-poll"></i>&nbsp; Exam Results</a></li>
                <li><a href="Messages.html"><i class="fas fa-envelope"></i>&nbsp;Messages</a></li>
                <li><a href="Feedback.html"><i class="fas fa-comment"></i>&nbsp;Feedback</a></li>
            </ul>
        </nav>
    </div>

    <div class="content">
        <!-- Your page content goes here -->
        <h1>Messages</h1>
    </div>
</body>
</html>
