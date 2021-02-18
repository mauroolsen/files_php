<?php
session_start();
require('config.php');
require('header.php');
require('includes/validations.php');
?>

<div class="container">
  <?php
  if (isset($_SESSION['user'])) {
    if(isset($_GET['image'])){
      require('image.php');
    }else{
      require('home.php');
    }
  } else {
    require('login.php');
  }
  ?>
</div>

</body>

</html>