<?php
use Controllers\UserController as UserController;
use Controllers\PostController as PostController;
use Controllers\ViewController as ViewController;
use Controllers\ImageController as ImageController;

include_once('./Controllers/UserController.php');
include_once('./Controllers/PostController.php');
include_once('./Controllers/ViewController.php');
include_once('./Controllers/ImageController.php');

$userController = new UserController();
$postController = new PostController();
$viewController = new ViewController();
$imageController = new ImageController();

if(isset($_SESSION['user'])){
  if(isset($_GET['logout'])){
    $userController->logout();
  }
  if(isset($_GET['upload'])){
    $viewController->showUploadView();
  }
}
