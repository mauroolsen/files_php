<?php
    if(isset($_POST['submit'])){
        $uploadPath = '/uploads/';
        $fileName = (isset($_FILES['file'])) ? basename($_FILES['file']['name']) : '';
        $filePath = $uploadPath . $fileName;
        var_dump($fileName);
        var_dump($filePath);
        if(var_dump(move_uploaded_file($fileName, $filePath))){
            echo 'Archivo subido correctamente...';
        }else{
            echo 'El archivo no se pudo subir correctamente...';
        }

    }