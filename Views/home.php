<?php
session_start();
include_once('./header.php');
if (isset($_SESSION['user'])) {
  if (isset($_GET['post']))
    require('post.php');
  else
    require('postlist.php');
} else {
  header('Location: ../index.php');
}
