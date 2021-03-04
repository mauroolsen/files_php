<?php
session_start();
if (isset($_SESSION['user'])) {
  header('Location: ./Views/home.php');
} else {
  header('Location: ./Views/login.php');
}
