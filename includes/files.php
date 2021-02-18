<?php
function subir($fileName, $filePath)
{
  $formats = ['png', 'jpeg', 'jpg'];
  $message = false;
  $pathInfo = pathinfo($filePath, PATHINFO_EXTENSION);
  if (
    (in_array($pathInfo, $formats))
    &&
    (move_uploaded_file($fileName, $filePath))
  ) {
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
    mkdir($path, 0777, true); // creo mas de una carpeta
}

function redireccion($message)
{
  $message = ($message) ? 'true' : 'false';
  header('Location: ../index.php?message=' . strval($message));
}
