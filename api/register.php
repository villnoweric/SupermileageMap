<?php

require('../classes.php');

if(isset($_POST['name'])){
    
    $name = $_POST['name'];
    
    $sql = "INSERT INTO drivers (name, status) VALUES ('$name','Idle')";
    
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
    $array = array("response"=>"1");
    
    header('Content-type: application/json');
    echo json_encode($array);
    
}