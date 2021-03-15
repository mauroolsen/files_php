<?php

use Controllers\UserController as UserController;
use Controllers\PostController as PostController;
use Controllers\ViewController as ViewController;

include_once('../Controllers/UserController.php');
include_once('../Controllers/PostController.php');
include_once('../Controllers/ViewController.php');

if (isset($_SESSION['user'])) {
  $viewController = new ViewController();
  if (isset($_GET['logout'])) {
    $userController = new UserController();
    $userController->logout();
  }
  if (isset($_GET['upload'])) {
    $viewController->showUploadView();
  }
  if (isset($_GET['post'])) {
    $viewController->showPostView($_GET['post']);
  }
  if (isset($_GET['delete'])) {
    $postController = new PostController();
    $postController->delete($_GET['delete']);
  }
  if (isset($_GET['edit'])) {
    $viewController->showEditView($_GET['edit']);
  }
  if (isset($_POST['comment'])) {
    $postController = new PostController();
    $postController->comment(
      ($_POST['comment']),
      (isset($_POST['post-id'])) ? ($_POST['post-id']) : '',
      (isset($_SESSION['user']['name'])) ? ($_SESSION['user']['name']) : ''
    );
  }
  if (isset($_GET['like'])) {
    $postController = new PostController();
    $postController->like(
      ($_GET['like']),
      (isset($_SESSION['user']['name'])) ? ($_SESSION['user']['name']) : ''
    );
  }
} else {
  if (isset($_POST['login'])) {
    $userController = new UserController();
    $userController->login(
      (isset($_POST['username'])) ? ($_POST['username']) : '',
      (isset($_POST['pass'])) ? ($_POST['pass']) : ''
    );
  } else if (isset($_POST['register'])) {
    $userController = new UserController();
    $userController->register(
      (isset($_POST['username'])) ? ($_POST['username']) : '',
      (isset($_POST['email'])) ? ($_POST['email']) : '',
      (isset($_POST['pass'])) ? ($_POST['pass']) : ''
    );
  } else {
    $viewController = new ViewController();
    $viewController->showHomeView();
  }
}
