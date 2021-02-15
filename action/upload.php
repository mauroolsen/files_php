<?php
require('../includes/files.php');
session_start();
if (isset($_POST['submit']) && isset($_SESSION['user'])) {
    $message = false;
    if (isset($_FILES['file'])) {
        $uploadPath = '../uploads/default/'. $_SESSION['user']['username'] . '/';
        validarPath($uploadPath);
        $fileName = $_FILES['file']['tmp_name'];
        $targetfileName = basename($_FILES['file']['name']);
        $filePath = $uploadPath . $targetfileName;
        if(validarArchivo($filePath)) $message = subir($fileName, $filePath);
    }
    redireccion($message);
}
