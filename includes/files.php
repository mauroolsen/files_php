<?php
function subir($fileName, $filePath)
{
    $message = false;
    if (move_uploaded_file($fileName, $filePath)) {
        $message = true;
    }
    return $message;
}

function validarArchivo($filePath)
{
    $ret = true;
    if (file_exists($filePath)) {
        $ret = false;
    }
    return $ret;
}

function validarPath($path)
{
    if (!file_exists($path))
        mkdir($path);
}

function redireccion($message)
{
    $message = ($message) ? 'true' : 'false';
    header('Location: index.php?message=' . strval($message));
}