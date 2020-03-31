<?php
use PDO;

try{
    $db = new PDO("mysql:host=localhost; dbname=auto_sales", 'root', 'password');
} catch (Exception $e){
    echo 'Connection error';
}

