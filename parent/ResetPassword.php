<?php
session_start();
include '../database/db_con.php';

if(isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $query = "SELECT * FROM parent WHERE username='$email'";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result) == 1) {
        $token = uniqid();

        $reset_link = "http://localhost/Group_Project/parent/change_password.php?token=$token";
        $to = $email;
        $subject = "Reset Your Password";
        $message = "Click the following link to reset your password: $reset_link";
        $headers = "From: Teachease.com";
        if (mail($to, $subject, $message, $headers)) {
            echo "Email sent successfully";
        } else {
            echo "Email sending failed";
        }
        $update_query = "UPDATE parent SET reset_token='$token' WHERE username='$email'";
        mysqli_query($link, $update_query);
        
        // Send email with reset link
        
        
        
        $_SESSION['message'] = "Password reset link sent to your email";
        header("Location: ../login.php");
        exit();
    } else {
        $error = "Email not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <?php if(isset($error)) echo "<div>$error</div>"; ?>
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit" name="submit">Send Reset Link</button>
    </form>
</body>
</html>
