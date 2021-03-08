<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../assets/icons/icon.css"
      rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/styles.css">

  <title>Document</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light justify-content-between" style="background-color: rgb(255 255 255);">
    <a class="navbar-brand" href="../index.php">IMAGES.PHP</a>
    <?php
    if (isset($_SESSION['user'])) {
      echo '
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a 
              class="nav-link text-uppercase" 
              href="home.php?profile=' . $_SESSION['user']['name'] . '">
                ' . $_SESSION['user']['name'] . '
              </a>
            </li>        
            <li class="nav-item">
              <a class="nav-link" href="action.php?logout">Log out</a>
            </li>
            <li class="nav-item">
              <a class="file-upload nav-link" href="action.php?upload">UPLOAD</a>
            </li>
          </ul>
        </div>
        ';
    }
    ?>

  </nav>

  <script>
    function desvio() {
      document.getElementById('file-input').click();
    }
  </script>