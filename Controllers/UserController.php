<?php

namespace Controllers;

include_once('../Controllers/ViewController.php');
include_once('../Models/User.php');
include_once('../DAO/UserDAO.php');

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use Models\User as User;
use DAO\UserDAO as UserDAO;

class UserController
{

  private $dao;
  private $viewController;

  public function __construct()
  {
    $this->dao = new UserDAO();
    $this->viewController = new ViewController();
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
      $_SESSION['user'] = $this->dao->toArray($user);
      $this->viewController->showHomeView();
    } else {
      $this->viewController->showLoginView();
    }
  }

  public function logout()
  {
    if (isset($_SESSION['user'])) {
      session_destroy();
    }
    $this->viewController->showHomeView();
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
