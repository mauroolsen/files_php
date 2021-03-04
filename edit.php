<?php

use Controllers\PostController;

session_start();
include_once('./header.php');

if (!isset($_SESSION['user'])) {
  header('Location: login.php');
} else {
  include_once('./Controllers/PostController.php');
  $postController = new PostController();
  if (isset($_GET['post'])) {
    $post = $postController->getById($_GET['post']);
    if (!$post || ($_SESSION['user']['name'] != $post->user))
      header('Location: home.php');
  }
  if (isset($_POST['submit'])) {
    $post->text = (isset($_POST['text'])) ? ($_POST['text']) : '';
    $postController->edit($post);
  }
}
?>

<div class="container my-4">
  <div class="row mx-auto">
    <form class="form col-5 alert alert-success mx-auto" action="" method="POST" enctype="multipart/form-data">
      <img class="img-fluid mb-3" src="<?= $post->image ?>" alt="" srcset="">
      <div class="form-group">
        <label for="text">Texto</label>
        <input type="text" class="form-control" placeholder="Texto..." name="text" id="text" value="<?= $post->text ?>" onkeyup="" />
      </div>
      <button class="btn btn-primary col-10 offset-1" type="submit" name="submit" id="edit">
        Edit
      </button>
    </form>
  </div>
</div>