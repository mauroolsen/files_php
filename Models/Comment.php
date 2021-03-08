<?php namespace Models;

class Comment{
  private $user;
  private $text;
  private $date;

  function __construct($user, $text, $date)
  {
    $this->user = $user;
    $this->text = $text;
    $this->date = $date;
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

  public function toArray(){
    $comment = [
      'text' => $this->text,
      'user' => $this->user,
      'date' => $this->date,
    ];
    return $comment;
  }
}