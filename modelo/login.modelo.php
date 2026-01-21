<?php

class LoginModelo {

  public static function obtenerPorCorreo($correo) {

    $db = require __DIR__ . '/cone.php'; // Opción A

    $stmt = $db->prepare("
      SELECT id_registro_clientes, nombre, apellido, correo, password_hash, id_empresa
      FROM registro_clientes
      WHERE correo = :correo
      LIMIT 1
    ");

    $stmt->execute([":correo" => $correo]);
    return $stmt->fetch(); // FETCH_ASSOC por configuración del PDO
  }
}
