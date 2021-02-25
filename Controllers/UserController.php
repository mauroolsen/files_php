<?php

namespace Controllers;

include_once('./Models/User.php');
include_once('./DAO/UserDAO.php');

use Models\User as User;
use DAO\UserDAO as UserDAO;

class UserController
{

  private $dao;

  public function __construct()
  {
    $this->dao = new UserDAO();
  }

  public function register($name, $email, $pass)
  {
    $user = new User($name, $email, password_hash($pass, PASSWORD_DEFAULT));
    $this->addUser($user);
  }

  public function login($name, $pass)
  {
    $user = $this->validateUser($name, $pass);
    if ($user) {
      $_SESSION['user'] = $user; 
    }
  }

  public function getUsers()
  {
    $users = $this->dao->getAll();
    return $users;
  }

  private function addUser($user)
  {
    $this->dao->add($user);
  }

  private function validateUser($name, $pass)
  {
    $response = null;
    $user = $this->getUserByName($name);
    if ($user && password_verify($pass, $user->passHashed)) {
      $response = $user;
    }
    return $response;
  }

  private function getUserByName($name)
  {
    $user = $this->dao->getByName($name);
    return $user;
  }

  private function getUserByEmail($email)
  {
    $user = $this->dao->getByEmail($email);
    return $user;
  }
}
