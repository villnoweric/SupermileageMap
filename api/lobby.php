<?php

require('../classes.php');

if(isset($_POST['driver'])){
    
    $array = array("status"=>"Idle");
    
    $name = $_POST['driver'];
    
    $sql = "SELECT * FROM runs WHERE driver='$name' AND status='Pending'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $array['status'] = "Pending";
            $array['vehicle'] = $row['vehicle'];
        }
    }
    
    header('Content-type: application/json');
    echo json_encode($array);
    
}