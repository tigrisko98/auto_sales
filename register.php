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
    <form action="/auto_sales/vendor/signup.php" method="post">
        <label>Full name</label>
        <input type="text" name="full_name" placeholder="Input your full name">
        <label>Email</label>
        <input type="email" name="email" placeholder="Input your email">
        <label>Password</label>
        <input type="password" name="password" placeholder="Input your password">
        <label>Confirm password</label>
        <input type="password" name="password_confirm" placeholder="Input your password again">
        <input class="button" type="submit" name="submit" value="Sign up">
        <p>Already have an account? - <a href="/auto_sales/index.php">Sign in!</a></p>
    </form>
</div>
</body>
</html>

