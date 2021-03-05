<?php

include_once "database.php";
include_once "operations.php";

class City extends database implements operations{
  
    private $id;
    private $name;
    private $latitude;
    private $longitude;


    //getters
    public function getId()
    {
        return $this->id;
    }
    public function getLat()
    {
        return $this->latitude;
    }
    public function getLong()
    {
        return $this->longitude;
    }
    public function getName()
    {
        return $this->name;
    }
    
    
    // setters
    public function setId($id)
    {
       $this->id = $id;
    }public function setLat($latitude)
    {
       $this->latitude = $latitude;
    }
    public function setLong($longitude)
    {
       $this->longitude = $longitude;
    }
    
    public function setName($name)
    {
       $this->name = $name;
    }
    

    // abstract methods to implement
     public function insertData(){
            
     }
    public function selectData(){
        $query = "SELECT `cities`.* FROM `cities`";
        return $this->runDQL($query);
    }
   
    public function updateData(){

    }
    public function deleteData(){

    }

    
}

?>