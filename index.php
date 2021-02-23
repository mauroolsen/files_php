<?php

require('./Controllers/ViewController.php');

use Controllers\ViewController;

session_start();
require('config.php');
require('header.php');
require('includes/validations.php');

$view = new ViewController();
?>

<div class="container">
  <?php
  
  if (isset($_SESSION['user'])) {
    if(isset($_GET['image'])){
      $view->showUploadView();
    }else{
      $view->showHomeView();
    }
  } else {
    $view->showLoginView();
  }
  ?>
</div>

</body>

</html>