<?php namespace Models;

class Image{
  private $path;

  function __construct($path)
  {
    $this->setPath($path);
  }

  public function getPath()
  {
    return $this->path;
  }

  public function setPath($path)
  {
    $this->path = $path;

    return $this;
  }
}