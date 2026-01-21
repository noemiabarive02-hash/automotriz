<?php
$dsn = 'mysql:dbname=plastiauto;host=localhost';
$user = 'root';
$password = 'root';

try {
    $dbh = new PDO($dsn, $user, $password);
    
} catch (PDOException $e) {
    
}
