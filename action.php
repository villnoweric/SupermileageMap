<?php

require('classes.php');

$cars = unserialize(file_get_contents('data/cars'));
$runs = unserialize(file_get_contents('data/runs'));
$drivers = unserialize(file_get_contents('data/drivers'));

if(isset($_POST['name'])){
    
    array_push($cars, new Car($_POST['name'], $_POST['fuelClass']));
    
}

if(isset($_POST['car'])){
    
    array_push($runs, new Run($_POST['car'], $_POST['driver']));
    
}

if(isset($_GET['delete'])){
    array_splice($cars, $_GET['delete'], 1);
}

if(isset($_GET['deleterun'])){
    array_splice($runs, $_GET['deleterun'], 1);
}

file_put_contents('data/cars', serialize($cars));
file_put_contents('data/runs', serialize($runs));
file_put_contents('data/drivers', serialize($drivers));

header("Location: ./");