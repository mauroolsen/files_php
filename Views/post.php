<?php
if (!isset($_SESSION['user']))
  header('location: home.php');

use Controllers\PostController;

include_once('../Controllers/PostController.php');
$postController = new PostController();

if (isset($_GET['post'])) {

  $post = $postController->getById($_GET['post']);
  if (!$post)
    header('location: home.php');

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

          <?php
          if ($_SESSION['user']['name'] == $post->user) {
            echo '
            <a class="btn btn-danger" href="action.php?delete=' . $post->id . '">ELIMINAR</a>
            <a class="btn btn-info" href="action.php?edit=' . $post->id . '">EDITAR</a>
          ';
          }
          ?>

          <a 
            href="action.php?like=<?=$post->id?>" 
            class="btn btn-primary 
            <?php
            if(array_search($_SESSION['user']['name'], $post->likes) !== false)
              echo 'liked';
            ?>" 
            data-toggle="tooltip" 
            data-placement="right" 
            title="<?php 
              foreach($post->likes as $liker){
                echo "$liker, ";
              }
            ?>"
          >
            <span class="material-icons">thumb_up</span>
            <?= count($post->likes)?>
          </a>


          <ul class="list-group my-1">
            <?php
            foreach ($post->comments as $comment) {
            ?>
              <li class="list-group-item my-1">
                <small><?= $comment->date?></small><br>
                <p style="padding-left:20px;"><?= $comment->user . ': ' . $comment->text ?></p>
              </li>
            <?php
            }
            ?>
          </ul>

          <form class="form" action="action.php" method="post">
            <input type="hidden" value="<?= $post->id ?>" name="post-id">
            <div class="input-group">
              <input type="text" class="form-control" name="comment" placeholder="Comentario...">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Comentar</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

<?php
}
