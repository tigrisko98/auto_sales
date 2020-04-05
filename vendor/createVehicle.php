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
        <select name="year[]">
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


    </form>
</div>



</body>

</html>