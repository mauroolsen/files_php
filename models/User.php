<?php namespace Models\User;

abstract class User{
  private $name;
  private $email;
  private $passHashed;
  

  /**
   * Get the value of name
   */ 
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */ 
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of email
   */ 
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */ 
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of passHashed
   */ 
  public function getPassHashed()
  {
    return $this->passHashed;
  }

  /**
   * Set the value of passHashed
   *
   * @return  self
   */ 
  public function setPassHashed($passHashed)
  {
    $this->passHashed = $passHashed;

    return $this;
  }
}