<?php namespace Controllers;

include_once('./Models/User.php');

use Models\User as User;

class UserController {

  public function register($name, $email, $pass){
    if(!$this->getUserByName($name) && !$this->getUserByEmail($email)){
      $user = new User($name, $email, password_hash($pass, PASSWORD_DEFAULT));
      $this->saveUser($user);
    }

  }

  public function login($name, $pass){
    if($this->validateUser($name, $pass)){

    }
  }

  public function getUsers(){
    $users = null;
    return $users;
  }

  private function saveUser($user){
    $users = $this->getUsers();
    $users[] = $user;
    $this->updateUsers($users);
  }

  private function updateUsers($users){
    
  }

  private function validateUser($name, $pass){
    $response = false;
    $user = $this->getUserByName($name);
    if($user && password_verify($pass, $user->passHashed)){
      $response = true;
    }
    return $response;
  }

  private function getUserByName($name){
    $user = null;
    return $user;
  }

  private function getUserByEmail($email){
    $user = null;
    return $user;
  }

}