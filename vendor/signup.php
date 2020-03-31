<?php
session_start();
require_once 'connection.php';

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

$_SESSION['full_name'] = $full_name;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['password_confirm'] = $password_confirm;
$error = false;

if ($error == false) {
    try{
        $db = new Connection();
        $db = $db->getConnection();
        $query = $db->prepare("INSERT INTO users (`name`, `email`, `password`)
                VALUES (:full_name, :email, :password)");
        $query->bindParam(':full_name', $full_name);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();
    }
    catch (PDOException $e){
        echo $e->getMessage();
    }
}