<?php
require('includes/images.php');

$dir = (isset($_SESSION['user'])) ? ('uploads/default/' . $_SESSION['user']['username'] . '/') : null;
$imagenes = array();
if (file_exists($dir)) {
  $imagenes = getImagenes($dir);
  $i = 0;
  echo '<div class="row">';
  foreach ($imagenes as $key => $image) {
    if ($i++ % 3 == 0)
      echo '</div><div class="row">';
?>
    <div class="card col-sm-3 m-2 p-2 tarjeta" onclick="redireccion(<?=$key?>);">
      <div class="car-body my-1">
        <form action="action/delete.php" method="POST">
          <input type="hidden" name="imagen" value="<?= $dir . $image; ?>">
          <button type="submit" name="submit" class="btn btn-danger">Eliminar</button>
        </form>
      </div>
      <img src="<?= $dir . $image ?>" id="imagen<?=$key?>" class="card-img-top my-1" alt="<?= $image ?>">
    </div>

<?php
  }
}
?>
<script>
  function redireccion(id) {
    let imagen = document.getElementById(`imagen${id}`).src;
    imagen = baseName(imagen);
    window.location.replace(`index.php?image=${imagen}`);
  }

  function baseName(str) {
    var base = new String(str).substring(str.lastIndexOf('/') + 1);
    return base;
  }
</script>