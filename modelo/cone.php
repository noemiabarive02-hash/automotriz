<?php
$dsn = "mysql:host=localhost;dbname=plastiauto;charset=utf8mb4";
$user = "root";
$password = "";

try {
  $dbh = new PDO($dsn, $user, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
} catch (PDOException $e) {
  die("Error de conexión: " . $e->getMessage());
}

return $dbh; // 👈 clave