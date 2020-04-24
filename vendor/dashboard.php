<?php
session_start();
require_once 'connection.php';
require_once 'vehicle.php';
$connection = new Connection();
$fields = $connection->fieldsData();
?>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-static/">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <!-- Bootstrap core CSS -->
    <link href="../js/bootstrap.min.js" rel="stylesheet">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="dashboard.php">Auto Sales</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="createVehicle.php">Post an Ad <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="container">
    <div class="jumbotron">
        <h2>Search setting of used vehicles:</h2>
        <form action="" method="post" name="searchAd">
            <label>Brand</label>
            <select name="brand">
                <option> - all brands -</option>
                <?php
                foreach ($fields as $value) {
                    $arr [] = $value['brand'];
                    sort($arr);
                }
                for ($i = 0; $i < count(array_unique($arr)); $i++) {
                    echo '<option value="' . $arr[$i] . '">' . $arr[$i] . '</option>';
                }
                ?>
            </select>
            <label>Model</label>
            <select name="model">
                <option> - all models -</option>
                <?php
                foreach ($fields as $model) {
                    echo '<option value="' . $model['model'] . '">' . $model['model'] . '</option>';
                }
                ?>
            </select>
            <label>Year</label>
            <select name="yearFrom">
                <option>from</option>
                <?php
                foreach ($years as $year) {
                    echo '<option value="' . $year . '">' . $year . '</option>';
                }
                ?>
            </select>
            <select name="yearTo">
                <option>to</option>
                <?php
                foreach ($years as $year) {
                    echo '<option value="' . $year . '">' . $year . '</option>';
                }
                ?>
            </select>
            <label>Price</label>
            <select name="priceFrom">
                <option>from</option>
                <?php
                foreach ($prices as $price) {
                    echo '<option value="' . $price . '">' . $price . '</option>';
                }
                ?>
            </select>
            <select name="priceTo">
                <option>to</option>
                <?php
                foreach ($prices as $price) {
                    echo '<option value="' . $price . '">' . $price . '</option>';
                }
                ?>
            </select>
            <input type="submit" name="search" value="Search on Auto Sales">
        </form>
        <?php
        if (isset($_POST['search'])) {
            $data = $connection->searchAd($_POST['brand'], $_POST['model'], $_POST['yearFrom'], $_POST['yearTo'],
                $_POST['priceFrom'], $_POST['priceTo']);
            ?>
            <table>
                <tr>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Year</th>
                    <th>Mileage</th>
                    <th>Engine Capacity</th>
                    <th>Fuel</th>
                    <th>Gearbox</th>
                    <th>Drive</th>
                    <th>Colour</th>
                    <th>Description</th>
                </tr>
                <?php
                foreach ($data as $value) {
                    ?>
                    <tr><?php
                    foreach ($value as $k => $v) {
                        if ($k == 'brand')
                            echo '<td>' . "$v" . '</td>';
                        if ($k == 'model')
                            echo '<td>' . "$v" . '</td>';
                        if ($k == 'price')
                            echo '<td>' . "$v" . '</td>';
                        if ($k == 'year')
                            echo '<td>' . "$v" . '</td>';
                        if ($k == 'mileage')
                            echo '<td>' . "$v" . '</td>';
                        if ($k == 'engine_capacity')
                            echo '<td>' . "$v" . '</td>';
                        if ($k == 'fuel')
                            echo '<td>' . "$v" . '</td>';
                        if ($k == 'gearbox')
                            echo '<td>' . "$v" . '</td>';
                        if ($k == 'drive')
                            echo '<td>' . "$v" . '</td>';
                        if ($k == 'color')
                            echo '<td>' . "$v" . '</td>';
                        if ($k == 'description')
                            echo '<td>' . "$v" . '</td>';
                    }
                    ?></tr><?php
                }
                ?>
            </table>
            <?php
        }
        ?>
    </div>
</main>
</body>
</html>