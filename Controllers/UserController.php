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
    if ($this->validateUser($name, $pass)) {
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
    $response = false;
    $user = $this->getUserByName($name);
    if ($user && password_verify($pass, $user->passHashed)) {
      $response = true;
    }
    return $response;
  }

  private function getUserByName($name)
  {
    $user = null;
    return $user;
  }

  private function getUserByEmail($email)
  {
    $user = null;
    return $user;
  }
}
