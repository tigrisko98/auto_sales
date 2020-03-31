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
    <form action="vendor/signup.php" method="post">
        <label>Full name</label>
        <input type="text" name="full_name" placeholder="Input your full name" value="<?=$_SESSION['full_name']?>">
        <?php
        if ($_SESSION['error_name']){
            echo "<p class=\"message\">".$_SESSION['error_name']."</p>";
        }
        unset($_SESSION['error_name']);
        unset($_SESSION['full_name']);
        ?>
        <label>Email</label>
        <input value="<?=$_SESSION['email']?>" type="email" name="email" placeholder="Input your email">
        <?php
        if ($_SESSION['error_email']){
            echo "<p class=\"message\">".$_SESSION['error_email']."</p>";
        }
        unset($_SESSION['error_email']);
        unset($_SESSION['email']);
        ?>
        <label>Password</label>
        <input value="<?=$_SESSION['password']?>" type="password" name="password" placeholder="Input your password">
        <?php
        if ($_SESSION['error_password']){
            echo "<p class=\"message\">".$_SESSION['error_password']."</p>";
        }
        unset($_SESSION['error_password']);
        unset($_SESSION['password']);
        ?>
        <label>Confirm password</label>
        <input value="<?=$_SESSION['password_confirm']?>" type="password" name="password_confirm" placeholder="Input your password again">
        <?php
        if ($_SESSION['error_password_confirm']){
            echo "<p class=\"message\">".$_SESSION['error_password_confirm']."</p>";
        }
        unset($_SESSION['error_password_confirm']);
        unset($_SESSION['password_confirm']);
        ?>
        <input class="button" type="submit" name="submit" value="Sign up">
        <p>Already have an account? - <a href="/auto_sales/index.php">Sign in!</a></p>
    </form>
</div>
</body>
</html>

