<?php
  $imagen = (isset($_POST['imagen'])) ? '..\\' . $_POST['imagen'] : '';
  $response = 'error';
  if(isset($_POST['submit'])){
    if(file_exists($imagen)){
      if(unlink($imagen)) 
        $response = 'success';
    }
  }
  header('Location: ../index.php?delete=' . $response);