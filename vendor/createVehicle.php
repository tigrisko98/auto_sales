<?php
require_once 'vehicle.php';
?>
<!doctype html>
<html lang="en">
<head>
    <title>Post an Ad</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<header class="navigation">
    <a href="dashboard.php">Dashboard</a>
    <a href="logout.php">Log out</a>
</header>
<div class="container">
    <h1>Submit a Vehicle Advertisement</h1>
    <form action="vehicle.php" method="post">
        <label>Brand</label>
        <input type="text" name="brand" placeholder="For example: Ford">
        <label>Model</label>
        <input type="text" name="model" placeholder="For example: Focus">
        <label>Price in $</label>
        <input type="text" name="price" placeholder="For example: 5000$">
        <label>Year of manufacture</label>
        <select name="year">
            <option value="" selected disabled hidden>Choose your Year of manufacture</option>
            <?php
            foreach ($years as $year){
                echo '<option value="' . $year . '">' . $year . '</option>';
            }
            ?>
        </select>
        <label>Mileage</label>
        <input type="text" name="mileage" placeholder="Thous. km">
        <label>Engine Capacity</label>
        <input type="text" name="engine_capacity" placeholder="For example: 1600">
        <label>Fuel</label>
        <select name="fuel">
            <option value="" selected disabled hidden>Choose your Fuel</option>
            <?php
            foreach ($fuels as $fuel) {
                echo '<option value="' . $fuel . '">' . $fuel . '</option>';
            }
            ?>
        </select>
        <label>Gearbox</label>
        <select name="gearbox">
            <option value="" selected disabled hidden>Choose your Gearbox</option>
            <?php
            foreach ($gearboxes as $gearbox) {
                echo '<option value="' . $gearbox . '">' . $gearbox . '</option>';
            }
            ?>
        </select>
        <label>Drive</label>
        <select name="drive">
            <option value="" selected disabled hidden>Choose your Drive</option>
            <?php
            foreach ($drives as $drive) {
                echo '<option value="' . $drive . '">' . $drive . '</option>';
            }
            ?>
        </select>
        <label>Colour</label>
        <input type="text" name="colour" placeholder="For example: green">
        <label>Description</label>
        <textarea name="description" placeholder="Input some additional information about your Vehicle"></textarea>
        <input type="submit" name="postAd" value="Post an Ad on AUTO_SALES" class="button">
    </form>
</div>
</body>

</html>