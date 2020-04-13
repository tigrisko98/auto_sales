<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link href="js/bootstrap.min.js" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <form class="form-horizontal" action="vendor/signin.php" method="post">
                <span class="heading">Authorization</span>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="E-mail">
                    <i class="fa fa-user"></i>
                </div>
                <?php
                $email_error = $_SESSION['email_error'] ?? false;
                echo "<p class='message'>" . $email_error . "</p>";
                ?>
                <div class="form-group help">
                    <input type="password" name="password" class="form-control" id="inputPassword"
                           placeholder="Password">
                    <i class="fa fa-lock"></i>
                </div>
                <?php
                $password_error = $_SESSION['password_error'] ?? false;
                echo "<p class='message'>" . $password_error . "</p>";
                $email_password_error = $_SESSION['email_password_error'] ?? false;
                echo "<p class='message'>" . $email_password_error . "</p>";
                unset($_SESSION['email_error'], $_SESSION['password_error'], $_SESSION['email_password_error']);
                ?>
                <div class="form-group">
                    <input type="submit" class="btn btn-default" name="submit" value="Login">
                    <p class="info">Don't have an account? - <a href="register.php">Sign up!</a></p>
                </div>
        </div>
        </form>
    </div>
</div>
</body>
</html>