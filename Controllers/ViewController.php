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

  public function showUploadView($id = null)
  {
    if (isset($_SESSION['user'])) {
      header('Location: upload.php');
    } else {
      $this->showLoginView();
    }
  }

  public function showEditView($id){
    if (isset($_SESSION['user'])) {
      header('Location: edit.php?post=' . $id);
    } else {
      $this->showLoginView();
    }
    /* if($id)
    $header .= "?edit=$id"; */
  }

  public function showPostView($post){
    if (isset($_SESSION['user'])) {
      header('Location: home.php?post=' . $post);
    } else {
      $this->showLoginView();
    }
  }
}
