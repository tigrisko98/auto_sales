<?php
session_start();
?>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<header>
    <a href="createVehicle.php">Post an ad</a>
    <a href="logout.php">Log out</a>
</header>
<div class="container">
    <h2>Search setting of used vehicles:</h2>
    <form action="" method="post">
        <label>Brand</label>
        <select name="brand">

        </select>
        <label>Model</label>
        <select name="model">

        </select>
        <label>Year</label>
        <select name="year">

        </select>
        <label>Price</label>
        <select name="price">

        </select>
    </form>
</div>
</body>
</html>

