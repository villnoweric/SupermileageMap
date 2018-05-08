<?php

require('classes.php');

$cars = unserialize(file_get_contents('data/cars'));
$runs = unserialize(file_get_contents('data/runs'));
$drivers = unserialize(file_get_contents('data/drivers'));

include('layouts/header.php');

echo "<div class='row'><div class='col-md-6'>";

include('layouts/vehicles.php');

include('layouts/drivers.php');

include('layouts/runs.php');

echo "</div><div class='col-md-6'>";

include('layouts/map.php');

echo "</div></div>";

include('layouts/footer.php');