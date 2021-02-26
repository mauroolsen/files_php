<?php
if (isset($_SESSION['user']) && isset($_GET['image'])) {
  $image = $_GET['image'];
  $url = './uploads/default/' . $_SESSION['user']['username'] . '/' . $image;
}
?>
<div class="container mt-2">
  <div class="col-4">
    <img src="<?= $url ?>" class="img-thumbnail" alt="<?= $image ?>">
  </div>
</div>