<?php namespace Models;

class User{
  private $name;
  private $email;
  private $passHashed;
  
  public function __construct($name = '', $email = '', $passHashed = '')
  {
    $this->name = $name;
    $this->email = $email;
    $this->passHashed = $passHashed;
  }

  public function __get($property)
  {
    if(property_exists($this, $property))
      return $this->$property;
  }

  public function __set($property, $value)
  {
    if(property_exists($this, $property)){
      $this->$property = $value;
    }
  }
}