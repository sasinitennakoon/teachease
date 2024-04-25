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
    <link rel="stylesheet" href="././css/FirstPage.css">
   
    <link integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Latest FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.css" integrity="sha384-LiWsxj4vMfsO8uyNnTVqSfeLqqkKD2pwWqFnSa6UqVqwKn9FlnNy5wKb3bYxs84p" crossorigin="anonymous">
    
    <!-- Include the external JavaScript file -->
    <script src="script.js"></script>
</head>
<body>
<?php include 'dropdown1.php'; ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="././img/logo1.png" alt="Logo">
        </div>
        <hr color="white">
        <nav>
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="Announcements.php"><i class="fas fa-bullhorn"></i> Announcements</a></li>
                <li><a href="PaymentDetails.php" class="active"><i class="fas fa-dollar-sign"></i> Payment Details</a></li>
                <li><a href="Users.php"><i class="fas fa-users"></i> Users</a></li>
                <li><a href="Subjects.php"><i class="fas fa-flask"></i> Subjects</a></li>
                <li><a href="Classes.php"><i class="fas fa-chalkboard"></i> Classes</a></li>
                
                <li><a href="RankingSystem.php"><i class="fas fa-trophy"></i> Ranking System</a></li>
                <li><a href="Feedback.php"><i class="fas fa-comment"></i> Feedback Collection</a></li>

            </ul>
        </nav>
    </div>
    <div class="content">
        <h1>Payment Details</h1>

        

        <div class="panels1">
            <div class="panel10">
            <form>
        <table>
            <thead>
                <tr>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Payment ID</th>
                    <th>Customer Email</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            
            <?php
            require_once('vendor/autoload.php'); 

            \Stripe\Stripe::setApiKey('sk_test_51OdQVALgktCwXblBDMMsiT1ZFPOEu9VP5ShYhrwZGf90y0ZpBLCP1sF8NaiBIseQeuWltQhqHMFjwH2WhyKi1vJP004P6JJgkf'); 
            ?>
            <tbody>

            <?php

            try {
                $payments = \Stripe\Charge::all(['limit' => 20]); 
                $payment_intents = \Stripe\PaymentIntent::all();
               
                foreach ($payments->data as $payment) { 
                    $customer_name = "Unknown";
                    $customer_email = "Unknown";

                    // Check if customer details are available
                    if ($payment->customer_details && $payment->customer_details->email) {
                        $customer_name = $payment->customer_details->name;
                        $customer_email = $payment->customer_details->email;
                    }

                    if ($payment->payment_intent) {
                        $intent = \Stripe\PaymentIntent::retrieve($payment->payment_intent);
                        if ($intent) {
                            $payment_intent = $intent->id;
                        }
                    }

                    $timestamp = $payment->created;
                    $date = date("F j, Y, g:i a", $timestamp);
                    ?>
                 <tr>   
                  <td><?php echo  $payment->amount . " " . strtoupper($payment->currency) ;?></td>
                  <td><?php 
                   if($payment->status == 'succeeded')
                   {
                        echo "<b style='color:green;'>".$payment->status."</b>";
                   }
                   else if($payment->status == 'failed')
                   {
                        echo "<b style='color:red;'>".$payment->status."</b>";
                   }
                   ?></td>

                  <td><?php echo  $payment->id ; ?></td>
                 
                  <td><?php echo  $customer_email ;?></td>
                  
                  <td><?php echo  $date ;?></td>

                  <td><a href=""><button>More Details</button></a></td>
                </tr>
                <?php
                }
            } catch (\Stripe\Exception\ApiErrorException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
           
        </table>

        </form>   
                
            </div>
        </div>
    </div>
    
    
</body>
</html>



