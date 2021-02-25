<?php namespace Models;

class Post{
  private $image;
  private $text;
  private $date;
  private $likes;
  private $coments;

  function __construct(
    $image = '',
    $text = '',
    $date = '',
    $likes = '',
    $coments = ''
  )
  {
    $this->image = $image;
    $this->text = $text;
    $this->date = $date;
    $this->likes = $likes;
    $this->coments = $coments;
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