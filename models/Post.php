<?php

namespace Models;

date_default_timezone_set('America/Argentina/Buenos_Aires');

class Post
{
  private $user;
  private $image;
  private $text;
  private $date;
  private $likes;
  private $comments;
  private $disabled;
  private $id;

  function __construct(
    $user = '',
    $image = '',
    $text = '',
    $likes = [],
    $date = null,
    $comments = [],
    $id = 0,
    $disabled = false
  ) {
    $this->user = $user;
    $this->image = $image;
    $this->text = $text;
    $this->date = ($date) ? $date : date('l jS \of F Y h:i A');;
    $this->likes = $likes;
    $this->comments = $comments;
    $this->id = $id;
    $this->disabled = $disabled;
  }

  public function __get($property)
  {
    if (property_exists($this, $property))
      return $this->$property;
  }

  public function __set($property, $value)
  {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }
  }

  public function toArray()
  {

    $arrayComments = [];
    if ($this->comments) {
      foreach ($this->comments as $comment) {
        array_push($arrayComments, $comment->toArray());
      }
    }

    $post['user'] = $this->user;
    $post['image'] = $this->image;
    $post['text'] = $this->text;
    $post['likes'] = $this->likes;
    $post['date'] = $this->date;
    $post['comments'] = $arrayComments;
    $post['id'] = $this->id;
    $post['disabled'] = $this->disabled;

    return $post;
  }
}
