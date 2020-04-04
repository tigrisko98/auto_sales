<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Registration</h1>
    <form action="vendor/signup.php" method="post" name="signUpForm">
        <label>Full name</label>
        <input type="text" name="full_name" placeholder="Input your full name">
        <?php
        $full_name_error = $_SESSION['full_name_error'] ?? false;
        echo "<p class='message'>" . $full_name_error . "</p>";
        ?>
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
        <label>Confirm password</label>
        <input value="" type="password" name="password_confirm" placeholder="Input your password again">
        <?php
        $password_confirm_error = $_SESSION['password_confirm_error'] ?? false;
        echo "<p class='message'>" . $password_confirm_error . "</p>";
        unset($_SESSION['full_name_error'], $_SESSION['email_error'], $_SESSION['password_error'], $_SESSION['password_confirm_error']);
        ?>
        <input class="button" type="submit" name="submit" value="Sign up">
        <p>Already have an account? - <a href="index.php">Sign in!</a></p>
    </form>
</div>
</body>
</html>

