<?php
  require('./userControl.php');
  $response = 'error';
  if(isset($_POST['submit'])){
    $user = [
      "username" => (isset($_POST['username'])) ? $_POST['username'] : '',
      "pass" => (isset($_POST['pass'])) ? $_POST['pass'] : '',
    ];
    if(createUser($user)) $response = 'success';
  }

  header("Location: ../index.php?signin=$response");