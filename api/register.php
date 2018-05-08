<?php

require('../classes.php');

$cars = unserialize(file_get_contents('../data/cars'));
$runs = unserialize(file_get_contents('../data/runs'));
$drivers = unserialize(file_get_contents('../data/drivers'));

if(isset($_POST['method'])){
    
    array_push($drivers, new Driver($_POST['name'], $_POST['deviceID']));
    
    $array = array("returned_username"=>"-",
    "returned_password"=>"-",
    "message"=>"succsess",
    "response_code"=>"1");
    
    header('Content-type: application/json');
    echo json_encode($array);
    
}

file_put_contents('../data/cars', serialize($cars));
file_put_contents('../data/runs', serialize($runs));
file_put_contents('../data/drivers', serialize($drivers));