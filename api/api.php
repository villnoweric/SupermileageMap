<?php

require('../classes.php');

if(isset($_POST['method'])){
    
    $array = array();
    
    switch($_POST['method']){
        case 'Start':
            $ID = $_POST['ID'];
            $run = new run($ID);
            $sql1 = "UPDATE runs SET status='Running' WHERE ID='$ID'";
            $conn->query($sql1);
            $sql2 = "UPDATE vehicles SET status='Running' WHERE name='" . $run->getVehicle() . "'";
            $conn->query($sql2);
            $sql3 = "UPDATE drivers SET status='Running' WHERE name='" . $run->getDriver() . "'";
            $conn->query($sql3);
            $array['response'] = 3;
            break;
        case 'Update':
            $ID = $_POST['ID'];
            
            $run = new run($ID);
            
            $lat = $_POST['latitude'];
            $long = $_POST['longitude'];
            $count = $_POST['count'];
            $speed = $_POST['speed'];
            $avgSpeed = $_POST['avgSpeed'];
            $distance = $_POST['distance'];
            
            updatePosition($run->getVehicle(), $lat, $long, $speed);
            
            $sql1 = "UPDATE runs SET count='$count', avgSpeed='$avgSpeed', distance='$distance' WHERE ID='$ID'";
            $conn->query($sql1);
            $array['response'] = 42;
            break;
        case 'Stop':
            $ID = $_POST['ID'];
            $run = new run($ID);
            $infoCode = $_POST['speed'];
            if($infoCode ==0){
                $info = 'DNF';
            }else{
                $info = 'Finished';
            }
            $count = $_POST['count'];
            $avgSpeed = $_POST['avgSpeed'];
            $distance = $_POST['distance'];
            $sql1 = "UPDATE runs SET avgSpeed='$avgSpeed', distance='$distance', count='$count', status='$info' WHERE ID='$ID'";
            $conn->query($sql1);
            $sql2 = "UPDATE vehicles SET status='Idle' WHERE name='" . $run->getVehicle() . "'";
            $conn->query($sql2);
            $sql3 = "UPDATE drivers SET status='Idle' WHERE name='" . $run->getDriver() . "'";
            $conn->query($sql3);
            $array['response'] = 69;
            break;
        case 'Accept':
            $ID = $_POST['ID'];
            $run = new run($ID);
            $sql1 = "UPDATE runs SET status='Waiting' WHERE ID='$ID'";
            $conn->query($sql1);
            $sql2 = "UPDATE vehicles SET status='Waiting' WHERE name='" . $run->getVehicle() . "'";
            $conn->query($sql2);
            $sql3 = "UPDATE drivers SET status='Waiting' WHERE name='" . $run->getDriver() . "'";
            $conn->query($sql3);
            $array['response'] = 19;
            break;
        case 'Register':
            $name = $_POST['ID'];
            $sql = "SELECT * FROM drivers WHERE name='$name'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $array['response'] = 63;
                $array['status'] = "Name already taken";
            }else{
                $sql2 = "INSERT INTO drivers (name, status) VALUES ('$name','Idle')";
                $conn->query($sql2);
                $array['response'] = 62;
            }
            break;
        case 'Lobby':
            $array['status'] = "Idle";
            $name = $_POST['ID'];
            $sql = "SELECT * FROM runs WHERE driver='$name' AND status='Pending'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $array['status'] = "Pending";
                    $array['vehicle'] = $row['vehicle'];
                    $array['ID'] = $row['ID'];
                }
            }
            break;
    }
    
    header('Content-type: application/json');
    echo json_encode($array);
}