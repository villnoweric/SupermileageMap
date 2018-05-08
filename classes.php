<?php

class Car
{
    public $name;
    public $fuelClass;
    public $status;
    public $currentPosition = array();
    public $lastPosition = array();

    public function __construct($name, $fuelClass)
    {
        $this->name = $name;
        $this->fuelClass = $fuelClass;
        $this->status = "Idle";
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getFuelClass()
    {
        return $this->fuelClass;
    }
    
    public function getCurrentPosition()
    {
        if($this->status=="Active"){
            return "Lat: " . $this->currentPosition['lat'] . " Long: " . $this->currentPosition['long'];
        }
    }
    
    public function updatePosition($lat,$long)
    {
        $this->lastPosition = $this->currentPosition;
        $this->currentPosition = array(
            'lat'=>$lat,
            'long'=>$long,
            'time'=>time()
            );
    }
    
}

class Run
{
    public $car;
    public $driver;
    public $start;
    public $status;
    
    public function __construct($car, $driver)
    {
        $this->car = $car;
        $this->driver = $driver;
        $this->start = time();
        $this->status = "Pending";
    }
    
    public function getCar()
    {
        return $this->car;
    }
    
    public function getDurration()
    {
        if($this->status=='Ready'){
            return "00:00:00";
        }else{
            $duration = time() - $this->start;
            return $duration;
        }
    }
    
    public function getStatus()
    {
        return $this->status;
    }
    
}

class Driver
{
    public $name;
    public $deviceID;
    public $status;
    
    public function __construct($name, $deviceID)
    {
        $this->name = $name;
        $this->deviceID = $deviceID;
    }
}