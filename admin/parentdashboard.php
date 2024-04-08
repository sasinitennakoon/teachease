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
    <?php include 'dropdown1.php';?>
    <a href="dashboard.php"><button>Go to Dashboard</button></a>
    <div class="content">
        <!-- Your page content goes here -->
        <h1>Parent Dashboard</h1>

        <div class="panels1">
            <div class="panel10">
            <form method="post">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Parent ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Language</th>
                            <th>E-mail</th>
                            <th>Children Name</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                        $query = mysqli_query($link,"select * from parent") or die(mysqli_error($link));
                        $count = mysqli_fetch_array($query);

                        if($count < 0)
                        {
                            echo "<b>There is No Parents Currently Available</b>";
                        }
                        else
                        {
                            $query = mysqli_query($link,"select * from parent") or die(mysqli_error($link));
                            while($row = mysqli_fetch_array($query))
                            {
                                $id = $row['parent_id'];
                    ?>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
                            <td><?php echo $row['parent_id']; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['language']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                           <td><?php echo $row['childrenname']; ?></td>
                            <td><?php echo $row['status']; ?>
                            <?php
                                if($row['status'] == 'registered')
                                {?>
                                    
                                    
                                <td><button type='submit' name="remove" class="button" style="background-color:#850404;">Remove</button></a></td>
                                <?php

                                }
                                else if($row['status'] == 'unregistered')
                                {?>
                                
                                <td><button type='submit' name="approve" class="button" style="background-color:#055305;">Approve</button></a></td>
                                <?php
                                }
                            ?>
                        </tr>
                    </tbody>
                    <?php  } } ?>
                </table>
                            </form>
            </div>
        </div>

        <!-- Add Details Form -->
        
    </div>

    
    
</body>
</html>

<?php


    if (isset($_POST['remove'])) {
        $id = $_POST['selector'];
        $N = count($id);
            
        for($i=0; $i < $N; $i++)
        {
            $result = mysqli_query($link,"UPDATE `userlist` SET status = 'unregistered' WHERE userlistid ='$id[$i]'");
            $result1 = mysqli_query($link,"UPDATE `parent` SET status = 'unregistered' WHERE parent_id = '$id[$i]' ");
        }

        ?>
        <script>
        window.location = 'parentdashboard.php';
        </script>
    <?php
    }
    
    else if (isset($_POST['approve'])) {
        $id = $_POST['selector'];
        $N = count($id);
            
        for($i=0; $i < $N; $i++)
        {
            $result = mysqli_query($link,"UPDATE `userlist` SET status = 'registered' WHERE userlistid ='$id[$i]'");
            $result1 = mysqli_query($link,"UPDATE `parent` SET status = 'registered' WHERE parent_id = '$id[$i]' ");
        }
    ?>
        <script>
        window.location = 'parentdashboard.php';
    </script>
    <?php
    }
    ?>
