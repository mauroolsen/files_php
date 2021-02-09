<?php
if (isset($_GET['message'])) {
    if ($_GET['message'] == 'true') {
        echo 'Archivo subido correctamente...';
    } else {
        echo 'El archivo no pudo ser subido...';
    }
}
?>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit" name="submit">UPLOAD</button>
</form>