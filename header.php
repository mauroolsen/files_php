<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/styles.css">

  <title>Document</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light justify-content-between" style="background-color: rgb(255 255 255);">
    <a class="navbar-brand" href="#">IMAGES.PHP</a>
    <?php
    if (isset($_SESSION['user'])) {
      echo '
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="action/logout.php">Log out</a>
            </li>
            <li class="nav-item">
              <a class="file-upload nav-link" onclick="desvio()">UPLOAD</a>
            </li>
          </ul>
        </div>
        <form class="form m-2" action="action/upload.php" method="POST" enctype="multipart/form-data">
          <input type="file" name="file" id="file-input" onchange="submit()" class="visuallyhidden">
        </form>
        ';
    }
    ?>

  </nav>

  <script>
    function desvio() {
      document.getElementById('file-input').click();
    }
  </script>