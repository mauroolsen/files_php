<?php

use Controllers\PostController;

session_start();
include_once('./header.php');

if (!isset($_SESSION['user'])) {
  header('Location: login.php');
} else {
  if (isset($_POST['submit'])) {

    include_once('../Controllers/PostController.php');

    $postController = new PostController();
    $postController->newPost(
      (isset($_SESSION['user']['name'])) ? ($_SESSION['user']['name']) : '', 
      (isset($_FILES['image-post'])) ?($_FILES['image-post']) : '', 
      (isset($_POST['text'])) ? ($_POST['text']) : ''
    );
  }
}
?>

<div class="container my-4">
  <div class="row mx-auto">
    <form class="form col-5 alert alert-success mx-auto" action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <input type="file" name="image-post" id="file-input">
      </div>
      <div class="form-group">
        <label for="text">Texto</label>
        <input type="text" class="form-control" placeholder="Texto..." name="text" id="text" onkeyup="" />
      </div>
      <button class="btn btn-primary col-10 offset-1" type="submit" name="submit" id="Upload">
        Upload
      </button>
    </form>
  </div>
</div>