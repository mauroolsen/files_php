<?php namespace Models;

class Image{
  private $path;

  function __construct($path)
  {
    $this->path = $path;
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