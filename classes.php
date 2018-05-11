<?php

$servername = "localhost";
$username = "villnoweric";
$password = "";
$DB = "glencoe";

// Create connection
$conn = new mysqli($servername, $username, $password, $DB);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

function distance($lat1, $lon1, $lat2, $lon2) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  return $miles;
}

function getCar($driver){
    global $conn;
    $sql = "SELECT * FROM runs WHERE driver='$driver' AND status!='Finished' AND status!='DNF'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $car = $row['vehicle'];
        }
    }
    
    return $car;
}


function updatePosition($vehicle, $lat, $long, $speed){
    global $conn;
    $sql = "SELECT * FROM vehicles WHERE ID='$vehicle'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $tempLat = $row['currentLat'];
            $tempLong = $row['currentLong'];
        }
    }
    
    $date = date('Y-m-d H:i:s');
    
    $sql2 = "UPDATE vehicles SET lastSeen='$date', lastLat='$tempLat', lastLong='$tempLong', currentLat='$lat', currentLong='$long', speed='$speed' WHERE `name`='$vehicle'";

    if ($conn->query($sql2) === TRUE) {
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
}

class run{
    
    private $conn;
    private $row;
    public $vehicle;
    public $driver;
    
    function __construct($ID){
        global $conn;
        $this->conn = $conn;
        $sql = "SELECT * FROM runs WHERE ID='$ID'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $this->vehicle = $row['vehicle'];
                $this->driver = $row['driver'];
            }
        }
    }
    
    public function getVehicle(){
        return $this->vehicle;
    }

    public function getDriver(){
        return $this->driver;
    }
    
}