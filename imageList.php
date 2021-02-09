<?php
$dir = 'uploads\\';

function showImage($image){
    echo '
    <img class="img-thumbnail col-2" src="'. $image .'" alt="'. $image .'" srcset="">
    ';
}
function showImageGray($image){
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    switch($ext){
        case 'png':
            $imageCreated = imagecreatefrompng($image);
            break;
        case 'jpeg':
            //rename($image, str_replace('.jpg', '.jpeg', $image));
            //var_dump($image);
            return 0;
            $imageCreated = imagecreatefromjpeg($image);
            break;
    }
    imagefilter($imageCreated, IMG_FILTER_GRAYSCALE);
    $functionDisplayImage = 'image' . 'png';
    $functionDisplayImage($imageCreated, $image);
}

if(file_exists($dir)){
    $array = array_diff(scandir($dir),array('..', '.'));
    foreach($array as $image){
        showImageGray($dir . $image);
        showImage($dir . $image);
    }
}

?>