<?php
if (!isset($_SESSION['user']))
  header('Location: home.php');

use Controllers\PostController;

include_once('../Controllers/PostController.php');
$postController = new PostController;

if (isset($_GET['profile'])) {
  $posts = array_reverse($postController->getByUser($_GET['profile']));
} else {
  $posts = array_reverse($postController->getAll());
}
?>
<div class="container">
  <div class="row mx-2">
    <?php
    foreach ($posts as $key => $post) {
      if ($key % 3 == 0)
        echo '</div><div class="row mx-2">'
    ?>

      <div class="card m-2 p-2 col" onclick="location.href='action.php?post=<?= $post->id ?>';">
        <img class="card-img-top" src="<?= $post->image ?>" alt="Card image cap">
        <div class="card-body text-dark">
          <h5 class="card-title text-uppercase"><?= $post->user ?></h5>
          <small><?= $post->date ?></small>
          <p class="card-text font-weight-bold"><?= $post->text ?></p>
        </div>
      </div>

    <?php
    }
    ?>
  </div>