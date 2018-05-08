<?php

require('../classes.php');

$cars = unserialize(file_get_contents('../data/cars'));
$runs = unserialize(file_get_contents('../data/runs'));
$drivers = unserialize(file_get_contents('../data/drivers'));

if(isset($_GET['method'])){
    
    $array = array("status"=>"Idle");
    
    foreach($runs as $key=>$run){
        if($run->driver == $_GET['driver']){
            $array['status'] = "Pending";
            $array['vehicle'] = $run->car;
        }
    }
    
    header('Content-type: application/json');
    echo json_encode($array);
    
}