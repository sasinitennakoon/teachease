<?php include '../database/db_con.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Dashboard</title>
    <link rel="stylesheet" href="././css/dashboard.css">
    
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
                <li><a href="dashboard.php" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="childCourses.php"><i class="fas fa-book-open"></i> My Child Courses</a></li>
                <li><a href="childProgress.php"><i class="fas fa-chart-line"></i> My Child Progress</a></li>
                <li><a href="Inbox.php"><i class="fas fa-inbox"></i> My Inbox</a></li>
               
                <li><a href="pay.php"><i class="fas fa-money-bill"></i> Payements</a></li>
                <li><a href="announce.php"><i class="fas fa-bullhorn"></i> Announcements</a></li>

            </ul>
        </nav>
    </div>

    <div class="content">

        <h1>Welcome to Your Dashboard !</h1>

        <div class="panel">
            <img src="img/9050566.png">
           <p> Good Morning Mr. Jayasooriya !</p>
           <div class="image">
            
            </div>
           <p>We glad to see you again with our TeachEase Online Education platform.</p>

           
           <p>Now you can see your child progress . If you have any trouble please contact our administration panel.</p>
        </div>

        <!-- Calendar Panel -->
        <div class="panelsD">

            <div class="panel2">
                <h3> Reminder</h3>
                <ul>
                <li>You have to do the January month payment for the Grade 10 Science class</li>
                </ul>
            </div>

            <div class="panel2">
                <iframe src="https://calendar.google.com/calendar/embed?height=300&wkst=1&bgcolor=%23ffffff&ctz=UTC&showTitle=0&showNav=1&showPrint=0&showTabs=1&showCalendars=0&showDate=1&showTz=0&src=ZW4ubGsjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%230B8043" style="border:solid 0px #777" width="520" height="160" frameborder="0" scrolling="no"></iframe>
            </div>
        </div>
        </div>
    </div>