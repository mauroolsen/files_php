<?php
if (!isset($_SESSION['user']))
  header('location: home.php');

use Controllers\PostController;

include_once('./Controllers/PostController.php');
$postController = new PostController;

if (isset($_GET['post'])) {
  $post = $postController->getById($_GET['post']);
?>

<div class="post my-3">
  <div class="container py-4">
    <h5 class="text-uppercase"><?= $post->user ?></h5>
    <div class="row">
      <div class="col-6">
        <img class="img-fluid" src="<?= $post->image ?>" alt="" srcset="">
      </div>
      <div class="col-6">
        <small><?= $post->date ?></small>
        <p><?= $post->text ?></p>
      </div>
    </div>
  </div>
</div>

<?php
}
