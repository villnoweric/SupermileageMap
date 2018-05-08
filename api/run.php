<?php

require('../classes.php');

$cars = unserialize(file_get_contents('../data/cars'));

if(isset($_GET['lat'])){
    
    $cars[0]->updatePosition($_GET['lat'], $_GET['long']);
    
}

file_put_contents('../data/cars', serialize($cars));

header("Location: ./");