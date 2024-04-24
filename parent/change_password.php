<?php
session_start();
include '../database/db_con.php';

if(isset($_POST['submit'])) {
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($link, $_POST['confirm_password']);
    $token = $_GET['token'];

    if($password != $confirm_password) {
        $error = "Passwords do not match";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $update_query = "UPDATE parent SET password='$hashed_password', reset_token=NULL WHERE reset_token='$token'";
        mysqli_query($link, $update_query);
        $update_query1 = "UPDATE userlist SET password='$hashed_password', reset_token=NULL WHERE reset_token='$token'";
        mysqli_query($link, $update_query1);
        $_SESSION['message'] = "Password changed successfully";
        header("Location: ../login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <?php if(isset($error)) echo "<div>$error</div>"; ?>
    <form method="post">
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <button type="submit" name="submit">Reset Password</button>
    </form>
</body>
</html>
