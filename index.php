<?php
session_start();
require('header.php');
require('includes/validations.php');
?>

<div class="container">
  <?php
  if (isset($_SESSION['user'])) {
    require('home.php');
  } else {
    require('login.php');
  }
  ?>
</div>

</body>

</html>