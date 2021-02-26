<?php
session_start();
include_once('./includes.php');
if (isset($_SESSION['user'])) {
  require('imageList.php');
} else {
  header('Location: index.php');
}
