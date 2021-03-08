<?php

use Controllers\UserController as UserController;
use Controllers\PostController as PostController;
use Controllers\ViewController as ViewController;

include_once('../Controllers/UserController.php');
include_once('../Controllers/PostController.php');
include_once('../Controllers/ViewController.php');

$userController = new UserController();
$postController = new PostController();
$viewController = new ViewController();

if (isset($_SESSION['user'])) {
  if (isset($_GET['logout'])) {
    $userController->logout();
  }
  if (isset($_GET['upload'])) {
    $viewController->showUploadView();
  }
  if (isset($_GET['post'])) {
    $viewController->showPostView($_GET['post']);
  }
  if (isset($_GET['delete'])) {
    $postController->delete($_GET['delete']);
  }
  if (isset($_GET['edit'])) {
    $viewController->showEditView($_GET['edit']);
  }
  if(isset($_POST['comment'])){
    $postController->comment($_POST['comment'], $_POST['post-id'], $_SESSION['user']['name']);
  }
}
