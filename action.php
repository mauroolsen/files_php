<?php
use Controllers\UserController;

include_once('./Controllers/UserController.php');
$userController = new UserController();

if(isset($_SESSION['user'])){
  if(isset($_GET['logout'])){
    $userController->logout();
  }
  if(isset($_GET['upload'])){
    
  }
}