<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Authorization</h1>
    <form action="vendor/signin.php" method="post">
        <label>Email</label>
        <input type="email" name="email" placeholder="Input your email">
        <?php
        $email_error = $_SESSION['email_error'] ?? false;
        echo "<p class='message'>" . $email_error . "</p>";
        ?>
        <label>Password</label>
        <input type="password" name="password" placeholder="Input your password">
        <?php
        $password_error = $_SESSION['password_error'] ?? false;
        echo "<p class='message'>" . $password_error . "</p>";
        ?>
        <input class="button" type="submit" name="submit" value="Login">
        <p>Don't have an account? - <a href="register.php">Sign up!</a></p>
        <?php
        $email_password_error = $_SESSION['email_password_error'] ?? false;
        echo "<p class='message'>" . $email_password_error . "</p>";
        unset($_SESSION['email_error'], $_SESSION['password_error'], $_SESSION['email_password_error']);
        ?>
    </form>
</div>
</body>
</html>