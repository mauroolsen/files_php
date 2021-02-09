<?php
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
  if (!$ext == ('jpeg' || 'png')) {
    $ext = false;
  }
  return $ext;
}
function showImageGray($image)
{
  $ext = pathinfo($image, PATHINFO_EXTENSION);
  $grayPath = 'uploads/gray/';
  switch ($ext) {
    case 'png':
      $imageCreated = imagecreatefrompng($image);
      break;
    case 'jpeg':
      $imageCreated = imagecreatefromjpeg($image);
      break;
    default:
      return 0;
  }
  imagefilter($imageCreated, IMG_FILTER_GRAYSCALE);
  $functionDisplayImage = 'image' . 'png';
  $grayPathImage = $grayPath . basename($image);
  if (!file_exists($grayPath))
    mkdir($grayPath);
  $functionDisplayImage($imageCreated, $grayPathImage);
}
