<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Authorization</h1>
    <form action="/vendor/signin.php" method="post">
        <label>Email</label>
        <input type="email" name="email" placeholder="Input your email"><br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Input your password"><br>
        <input class="button" type="submit" name="submit" value="Login">
        <p>Don't have an account? - <a href="/register.php">Sign up!</a></p>
    </form>
</div>
</body>
</html>