<?php

require('classes.php');

if(isset($_POST['name'])){
    
    //NEW VEHICLE
    $name = $_POST['name'];
    $fuelClass = $_POST['fuelClass'];
    $color = $_POST['color'];
    
    $sql = "INSERT INTO vehicles (name, fuelType, color, status) VALUES ('$name','$fuelClass','$color','Idle')";
    
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}

if(isset($_POST['car'])){
    
    $car = $_POST['car'];
    $driver = $_POST['driver'];
    
    $sql = "INSERT INTO runs (vehicle, driver, status) VALUES ('$car','$driver','Pending')";
    
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}

if(isset($_GET['delete'])){
    
    //DELETE VEHICLE
    $delete = $_GET['delete'];
    
    $sql = "DELETE FROM vehicles WHERE ID='$delete'";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

if(isset($_GET['deleterun'])){
    
    $delete = $_GET['deleterun'];
    
    $sql = "DELETE FROM runs WHERE ID='$delete'";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
}

if(isset($_GET['deletedriver'])){
    
    $delete = $_GET['deletedriver'];
    
    $sql = "DELETE FROM drivers WHERE ID='$delete'";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
}

header("Location: ./");