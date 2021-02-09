<?php
require('includes/images.php');

$dir = 'uploads/default/';
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
                <a class="btn btn-danger" href="#">Eliminar</a>
            </div>
            <img src="<?= $dir . $image ?>" class="card-img-top my-1" alt="<?= $image ?>" srcset="">
        </div>

<?php
    }
}
?>