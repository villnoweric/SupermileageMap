<?php

require('../classes.php');

$array = array();

$sql = "SELECT * FROM vehicles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      if($row['status']=="Running"){
        $bool = true;
      }else{
        $bool = false;
      }
      
      $array[$row['ID']] = array(
          'lat' => $row['currentLat'],
          'long' => $row['currentLong'],
          'vis' => $bool
          );
  }
}

header('Content-type: application/json');
echo json_encode($array, JSON_NUMERIC_CHECK);