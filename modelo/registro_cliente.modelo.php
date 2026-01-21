<?php

class RegistroClienteModelo {

  public static function registrar($datos) {

    // 👇 obtiene el PDO retornado por cone.php
    $db = require __DIR__ . '/cone.php';

    $stmt = $db->prepare("
      INSERT INTO registro_clientes
      (nombre, apellido, telefono, correo, password_hash,
       id_empresa, id_zona_localidad, id_compania)
      VALUES
      (:nombre, :apellido, :telefono, :correo, :password_hash,
       :id_empresa, :id_zona_localidad, :id_compania)
    ");

    return $stmt->execute([
      ":nombre"            => $datos["nombre"],
      ":apellido"          => $datos["apellido"],
      ":telefono"          => $datos["telefono"],
      ":correo"            => $datos["correo"],
      ":password_hash"     => $datos["password_hash"],
      ":id_empresa"        => $datos["id_empresa"],
      ":id_zona_localidad" => $datos["id_zona_localidad"],
      ":id_compania"       => $datos["id_compania"]
    ]);
  }
}
