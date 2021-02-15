<?php
if(isset($_GET)){
    $response = $_GET;

    if (isset($response['message'])) {
        if ($response['message'] == 'true') {
            echo '
            <div class="alert alert-success my-2">
                Archivo subido correctamente...
            </div>
            ';
        } else {
            echo '
            <div class="alert alert-danger my-2">
                El archivo no pudo ser subido...
            </div>
            ';
        }
    }
    if (isset($response['delete'])) {
        if ($response['delete'] == 'success') {
            echo '
            <div class="alert alert-success my-2">
                Imagen eliminada con éxito.
            </div>
            ';
        } else {
            echo '
            <div class="alert alert-danger my-2">
                La imagen no pudo ser eliminada.
            </div>
            ';
        }
    }
    
    if(isset($response['signin'])){
        if($response['signin'] == 'success'){
          echo '
          <div class="alert alert-success my-2">
              Registrado correctamente...
          </div>
          ';
      } else {
          echo '
          <div class="alert alert-danger my-2">
              Error en el registro...
          </div>
          ';
      }
    }

    if(isset($response['login'])){
        echo '
          <div class="alert alert-danger my-2">
              Error en el login...
          </div>
          ';
    }
}
