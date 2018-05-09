<?php

require('../classes.php');

if(isset($_POST['method'])){
    
    if($_POST['method'] == "Start" or $_POST['method'] == "Stop"){
        
        if($_POST['method']=="Stop"){
            
            $name = $_POST['name'];
            $info = $_POST['info'];
            $car = getCar($name);
            
            $sql2 = "UPDATE runs SET status='$info' WHERE `driver`='$name' AND status='Running'";

            if ($conn->query($sql2) === TRUE) {
            } else {
                echo "Error updating record: " . $conn->error;
            }
            
            $sql3 = "UPDATE vehicles SET status='Idle' WHERE (name='$car' AND status='Running')";

            if ($conn->query($sql3) === TRUE) {
            } else {
                echo "Error updating record: " . $conn->error;
            }
            
            $sql4 = "UPDATE drivers SET status='Idle' WHERE name='$name'";

            if ($conn->query($sql4) === TRUE) {
            } else {
                echo "Error updating record: " . $conn->error;
            }
            
            $resp = 69;
        }else{
            $name = $_POST['name'];
            $car = getCar($name);
            
            $sql2 = "UPDATE runs SET status='Running' WHERE `driver`='$name' AND status='Pending'";

            if ($conn->query($sql2) === TRUE) {
            } else {
                echo "Error updating record: " . $conn->error;
            }
            
            $sql4 = "UPDATE vehicles SET status='Running' WHERE (name='$car' AND status='Idle')";

            if ($conn->query($sql4) === TRUE) {
            } else {
                echo "Error updating record: " . $conn->error;
            }
            
            $sql4 = "UPDATE drivers SET status='Running' WHERE name='$name'";

            if ($conn->query($sql4) === TRUE) {
            } else {
                echo "Error updating record: " . $conn->error;
            }
            
            $resp = 3;
        }
        
        $array = array("response"=>$resp);
        
    }elseif($_POST['method'] == "Update"){
        $car = getCar($_POST['name']);
        $lat = $_POST['latitude'];
        $long = $_POST['longitude'];
        $count = $_POST['count'];
        $speed = $_POST['speed'];
        $avgSpeed = $_POST['avgSpeed'];
        $distance = $_POST['distance'];
        
        $res = updatePosition($car, $lat, $long);
        
        $sql4 = "UPDATE runs SET count='$count', avgSpeed='$avgSpeed', distance='$distance' WHERE vehicle='$car' AND status='Running'";

        if ($conn->query($sql4) === TRUE) {
        } else {
            echo "Error updating record: " . $conn->error;
        }
        
        $array = array(
            "response"=>42
            );
    }
    
    header('Content-type: application/json');
    echo json_encode($array);
}