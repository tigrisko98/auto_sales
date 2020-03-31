<?php

use PDO;

try {
    $db = new PDO('mysql:host=localhost; dbname=auto_sales', 'root', 'password',
          array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (Exception $e) {
    echo 'Connection error';
}

