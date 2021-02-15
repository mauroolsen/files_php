<?php
require('userControl.php');

if (isset($_POST['submit'])) {
  $user = [
    "username" => (isset($_POST['username'])) ? $_POST['username'] : '',
    "pass" => (isset($_POST['pass'])) ? $_POST['pass'] : '',
  ];
  $data = isUsuario($user);
  if($data && password_verify($user['pass'], $data['pass'])){
    session_start();
    $_SESSION['user']['username'] = $user['username'];
    header('Location: ../index.php');
  }else{
    header('Location: ../index.php?login=error');
  }
}

