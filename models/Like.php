<?php namespace Models;


class Like{
  private $user;

  function __construct($user)
  {
    $this->user = $user;
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