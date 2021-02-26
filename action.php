<?php
use Controllers\UserController;

include_once('./Controllers/UserController.php');
$userController = new UserController();


if(isset($_GET['logout'])){
  if(isset($_SESSION['user'])){
    $userController->logout();
  }
}