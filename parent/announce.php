<?php include '../database/db_con.php'; ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="././css/announcemnet.css">
    <link rel="stylesheet" href="././css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<?php include 'dropdown3.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from parent where parent_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="././img/logo1.png" alt="Logo">
            </div>
            <hr color="white">
            <nav>
                <ul>
                    <li><a href="dashboard.html" ><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="childCourses.html"><i class="fas fa-book-open"></i> My Child Courses</a></li>
                <li><a href="childProgress.html"><i class="fas fa-chart-line"></i> My Child Progress</a></li>
                <li><a href="Inbox.html"><i class="fas fa-inbox"></i> My Inbox</a></li>
                <li><a href="meet.html"><i class="fas fa-calendar-check"></i>Meeting </a></li>
                <li><a href="pay.html"><i class="fas fa-money-bill"></i> Payements</a></li>
                <li><a href="announce.php"><i class="fas fa-bullhorn"></i> Announcements</a></li>
    
                </ul>
            </nav>
        </div>

        <div class="content">
            <h1>Announcements</h1>

            <h3>Recent Announcements</h3>
            
        
             
               
            <div class="panels1">
                <div class="panel10">
                <form method='post'>
                
            <?php
                $query = mysqli_query($link, "SELECT * FROM announcement WHERE type = 'For Students' OR type = 'for all'") or die(mysqli_error($link));
            
                $count  = mysqli_num_rows($query);
            
                if($count > 0)
                {?>
            
            
                
                        <table border="0">
                            <thead>
                                <tr>
                                    <th>Content</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                        <tbody>
                        <?php
                        while($row = mysqli_fetch_array($query)){
                        $id = $row['announcement_id'];
            
                        ?>
                        
                        <tr>
                                <td><?php echo $row['content']; ?></td>
                                <td><?php echo $row['type']; ?></td>
                                
                            </tr>
                        </tbody>
            
                       
            
                        <?php } }else{ ?>
                            <h3>There is no announcements currently available</h3>
                        <?php  } ?>
            
                        </table>
            
                        </form>  
                </div>
            </div>
            
            
            
            
                

            </div>
            

        </div>


        <script>
            // Sample announcement data
            const announcements = [
                { id: 1, text: "Result sheets are now on LMS.", date: "2022-04-01", publishedBy: "Admin" },
                { id: 2, text: "Children's results will releasing soon.", date: "2022-04-01", publishedBy: "Teacher" },
                { id: 3, text: "Your payement is received. Thank You.", date: "2022-03-25", publishedBy: "Admin" },
                { id: 4, text: "YYou have to make the payment for histpory class", date: "2022-03-17", publishedBy: "Admin" },
                { id: 5, text: "We send wormly wishes for new  month.", date: "2022-03-01", publishedBy: "Admin" },
            ];
        
            // Function to filter announcements based on selection
            function filterAnnouncements() {
                const select = document.getElementById("announcement-count");
                const count = parseInt(select.value);
        
                // Clear previous announcements
                const tableBody = document.getElementById("announcement-list");
                tableBody.innerHTML = '';
        
                // Add new announcements
                for (let i = 0; i < count && i < announcements.length; i++) {
                    const tr = document.createElement('tr');
        
                    const tdNo = document.createElement('td');
                    tdNo.textContent = announcements[i].id;
                    tr.appendChild(tdNo);
        
                    const tdText = document.createElement('td');
                    tdText.textContent = announcements[i].text;
                    tr.appendChild(tdText);
        
                    const tdDate = document.createElement('td');
                    tdDate.textContent = announcements[i].date;
                    tr.appendChild(tdDate);
        
                    const tdPublishedBy = document.createElement('td');
                    tdPublishedBy.textContent = announcements[i].publishedBy;
                    tr.appendChild(tdPublishedBy);
        
                    const tdMarkAsRead = document.createElement('td');
                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    tdMarkAsRead.appendChild(checkbox);
                    tr.appendChild(tdMarkAsRead);
        
                    tableBody.appendChild(tr);
                }
            }
        
            // Initial call to populate announcements
            filterAnnouncements();
        </script>

    </body>
    </html>