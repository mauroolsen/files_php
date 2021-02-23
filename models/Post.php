<?php namespace Models\Post;

use Models\Image as Image;
use Models\Like as Like;
use Models\Coment as Coment;


class Post{
  private $image;
  private $text;
  private $date;
  private $likes;
  private $coments;


  /**
   * Get the value of image
   */ 
  public function getImage()
  {
    return $this->image;
  }

  /**
   * Set the value of image
   *
   * @return  self
   */ 
  public function setImage($image)
  {
    $this->image = $image;

    return $this;
  }

  /**
   * Get the value of text
   */ 
  public function getText()
  {
    return $this->text;
  }

  /**
   * Set the value of text
   *
   * @return  self
   */ 
  public function setText($text)
  {
    $this->text = $text;

    return $this;
  }

  /**
   * Get the value of date
   */ 
  public function getDate()
  {
    return $this->date;
  }

  /**
   * Set the value of date
   *
   * @return  self
   */ 
  public function setDate($date)
  {
    $this->date = $date;

    return $this;
  }

  /**
   * Get the value of likes
   */ 
  public function getLikes()
  {
    return $this->likes;
  }

  /**
   * Set the value of likes
   *
   * @return  self
   */ 
  public function setLikes($likes)
  {
    $this->likes = $likes;

    return $this;
  }

  /**
   * Get the value of coments
   */ 
  public function getComents()
  {
    return $this->coments;
  }

  /**
   * Set the value of coments
   *
   * @return  self
   */ 
  public function setComents($coments)
  {
    $this->coments = $coments;

    return $this;
  }
}