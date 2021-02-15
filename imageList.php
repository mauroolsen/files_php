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
        <div class="card col-sm-3 m-2">
            <div class="car-body my-1">
                <form action="action/delete.php" method="POST">
                    <input type="hidden" name="imagen" value="<?=$dir . $image;?>">
                    <button type="submit" name="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
            <img src="<?= $dir . $image ?>" class="card-img-top my-1" alt="<?=$image ?>" srcset="">
        </div>

<?php
    }
}
?>