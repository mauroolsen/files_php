<?php
require('../includes/files.php');
if (isset($_POST['submit'])) {
    $message = false;
    if (isset($_FILES['file'])) {
        $uploadPath = '../uploads/default/';
        validarPath($uploadPath);
        $fileName = $_FILES['file']['tmp_name'];
        $targetfileName = basename($_FILES['file']['name']);
        $filePath = $uploadPath . $targetfileName;
        if(validarArchivo($filePath)) $message = subir($fileName, $filePath);
    }
    redireccion($message);
}
