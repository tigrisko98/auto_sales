<?php
session_start();
require_once 'connect.php';

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

$_SESSION['full_name'] = $full_name;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['password_confirm'] = $password_confirm;
$error = false;

if (empty($full_name)) {
    $_SESSION['error_name'] = 'Please enter your Full name';
    header('Location: ../register.php');
    $error = true;
}
if (empty($email)) {
    $_SESSION['error_email'] = 'Please enter your Email';
    header('Location: ../register.php');
    $error = true;
}
if (empty($password)) {
    $_SESSION['error_password'] = 'Please enter your password';
    header('Location: ../register.php');
    $error = true;
}
if (empty($password_confirm)) {
    $_SESSION['error_password_confirm'] = 'Please enter confirm password';
    header('Location: ../register.php');
    $error = true;
}

if (preg_match("/[\d]+/", $full_name)) {
    $_SESSION['error_name'] = 'Full name should consist of letters only';
    header('Location: ../register.php');
    $error = true;
}

if ($password != $password_confirm) {
    $_SESSION['error_password_confirm'] = 'Passwords are different';
    header('Location: ../register.php');
    $error = true;
}
