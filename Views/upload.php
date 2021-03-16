<?php
session_start();
include_once('./header.php');

if (!isset($_SESSION['user'])) {
  header('Location: login.php');
}
?>

<div class="container my-4">
  <div class="row mx-auto">
    <form class="form col-5 alert alert-success mx-auto" action="action.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="uploadSubmit" value="true" />
      <div class="form-group">
        <input 
          type="file" 
          name="image-post" 
          id="file-input"
        />
      </div>
      <div class="form-group">
        <label for="text">Texto</label>
        <input 
          type="text" 
          class="form-control" 
          placeholder="Texto..." 
          name="text" 
          id="text" 
        />
      </div>
      <button class="btn btn-primary col-10 offset-1" type="submit" name="submit" id="Upload">
        Upload
      </button>
    </form>
  </div>
</div>