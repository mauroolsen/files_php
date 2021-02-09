<?php
if (isset($_GET['message'])) {
    if ($_GET['message'] == 'true') {
        echo '
        <div class="alert alert-success my-2">
            Archivo subido correctamente...
        </div>
        ';
    } else {
        echo '
        <div class="alert alert-danger my-2">
            El archivo no pudo ser subido...
        </div>
        ';
    }
}
if (isset($_GET['delete'])) {
    if ($_GET['delete'] == 'success') {
        echo '
        <div class="alert alert-success my-2">
            Imagen eliminada con éxito.
        </div>
        ';
    } else {
        echo '
        <div class="alert alert-danger my-2">
            La imagen no pudo ser eliminada.
        </div>
        ';
    }
}
?>