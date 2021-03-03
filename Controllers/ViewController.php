<?php

namespace Controllers;

class ViewController
{

  public function showLoginView()
  {
    header('Location: login.php');
  }

  public function showHomeView()
  {
    if (isset($_SESSION['user'])) {
      header('Location: home.php');
    } else {
      $this->showLoginView();
    }
  }

  public function showUploadView()
  {
    if (isset($_SESSION['user'])) {
      header('Location: upload.php');
    } else {
      $this->showLoginView();
    }
  }

  public function showPostView($post){
    if (isset($_SESSION['user'])) {
      header('Location: home.php?post=' . $post);
    } else {
      $this->showLoginView();
    }
  }
}
