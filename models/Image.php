<?php namespace Models\Image;

class Image{
  private $path;

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