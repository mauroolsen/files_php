<?php
define('FORMATS', ['png', 'jpeg', 'jpg']);

function getImagenes($directorio)
{
  $response = '';
  if (file_exists($directorio)) {
    $data = scandir($directorio);
    $response = array_diff($data, array('..', '.'));
    foreach ($response as $key => $value) {
      if (!isImage($value)) {
        unset($response[$key]);
      }
    }
  }
  return $response;
}
function isImage($image)
{
  $ext = pathinfo($image, PATHINFO_EXTENSION);
  if (!(in_array($ext, FORMATS))) {
    $ext = false;
  }
  return $ext;
}

function subir($fileName, $filePath)
{
  $message = false;
  $pathInfo = pathinfo($filePath, PATHINFO_EXTENSION);
  if (
    (in_array($pathInfo, FORMATS))
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

