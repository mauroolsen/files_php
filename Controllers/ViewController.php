<?php namespace Controllers;

class ViewController{

  function showLoginView(){
    require_once('./login.php');
  }

  function showHomeView(){
    require_once('./home.php');
  }

  function showUploadView(){
    require_once('./upload.php');
  }
}