<?php namespace Models;

class Post{
  private $user;
  private $image;
  private $text;
  private $date;
  private $likes;
  private $coments;
  private $disabled;
  private $id;

  function __construct(
    $user = '',
    $image = '',
    $text = '',
    $likes = 0,
    $date = null,
    $coments = [],
    $id = 0,
    $disabled = false
  )
  {
    $this->user = $user;
    $this->image = $image;
    $this->text = $text;
    $this->date = ($date) ? $date : date('d-m-Y');
    $this->likes = $likes;
    $this->coments = $coments;
    $this->id = $id;
    $this->disabled = $disabled;
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