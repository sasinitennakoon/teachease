<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from users where user_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./css/subjectslist.css">

    <!-- Latest FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.css" integrity="sha384-LiWsxj4vMfsO8uyNnTVqSfeLqqkKD2pwWqFnSa6UqVqwKn9FlnNy5wKb3bYxs84p" crossorigin="anonymous">
</head>
<body>
    <div class="user-info">
        
    </div>
    <button onclick="goBack()">Go to Dashboard</button>
    <div class="content">
        <!-- Your page content goes here -->
        <h1>Current User List</h1>
        
        
                    <?php
                        $query = mysqli_query($link,"select * from userlist ") or die(mysqli_error($link));
                        $count = mysqli_fetch_array($query);

                        if($count < 0)
                        {
                            echo "<b>Currently There is no Subjects Available</b>";
                        }
                        else
                        {?>

                            <div class="panels1">
                            <div class="panel10">
                            <table>
                                    <thead>
                                        <th></th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th></th>
                                    </thead>
                    <?php
                        $query = mysqli_query($link,'select * FROm userlist') or die(mysqli_error($link));
                        while($row = mysqli_fetch_array($query))
                        {
                           $id = $row['userlistid'];
                    ?>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            
                            <!--<td width="40">
                                <a  data-placement="bottom" title="Download" id="<?php// echo $id; ?>download" href="<?php //echo $row['floc']; ?>"><i class="fa fa-fw fa-download"></i></a>
                                
                            </td>-->
                            
                            
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
                
           
    </div>
    
    <script>
        function goBack() {
        window.history.back();
    }
    </script>
</body>
</html>
