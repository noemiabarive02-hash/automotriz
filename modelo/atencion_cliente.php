<?php
session_start();

if (empty($_SESSION["auth"])) {
  header("Location: ../index.php");
  exit;
}
?>
