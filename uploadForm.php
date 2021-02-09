<?php
if (isset($_GET['message'])) {
    if ($_GET['message'] == 'true') {
        echo 'Archivo subido correctamente...';
    } else {
        echo 'El archivo no pudo ser subido...';
    }
}
?>
<form class="form m-2" action="upload.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <input class="form-control-files" type="file" name="file">
    </div>
    <button class="btn btn-primary" type="submit" name="submit">UPLOAD</button>
</form>
