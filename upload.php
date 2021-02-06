<?php
function subir($fileName, $filePath)
{
    $message = false;
    if (move_uploaded_file($fileName, $filePath)) {
        $message = true;
    }
    return $message;
}

function validarArchivo($fileName, $filePath)
{
    $ret = true;
    if ($fileName == '' || basename($filePath) == '') {
        $ret = false;
    } else {
        if (file_exists($filePath)) {
            $ret = false;
        }
    }
    return $ret;
}

function validarPath($path){
    if(!file_exists($path))
        mkdir($path);
}

if (isset($_POST['submit'])) {
    $uploadPath = 'uploads\\';
    validarPath($uploadPath);
    $fileName = (isset($_FILES['file'])) ? ($_FILES['file']['tmp_name']) : '';
    $targetfileName = (isset($_FILES['file'])) ? basename($_FILES['file']['name']) : '';
    $filePath = $uploadPath . $targetfileName;
    $message = false;

    if (validarArchivo($fileName, $filePath)) {
        $message = subir($fileName, $filePath);
    }

    $message = ($message) ? 'true' : 'false';
    header('Location: index.php?message=' . strval($message));
}
