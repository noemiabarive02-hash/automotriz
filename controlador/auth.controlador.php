<?php
require_once __DIR__ . '/../modelo/registro_cliente.modelo.php';

class AuthControlador {

  public static function registrarAjax($post) {

    // Validaciones mínimas
    if (empty($post["password"]) || empty($post["confirm_password"])) {
      return ["status" => "error", "message" => "Faltan contraseñas"];
    }

    if ($post["password"] !== $post["confirm_password"]) {
      return ["status" => "error", "message" => "Las contraseñas no coinciden"];
    }

    // ✅ Mapeo correcto (claves que el modelo espera)
    $datos = [
      "nombre"            => trim($post["nombre"] ?? ""),
      "apellido"          => trim($post["apellido"] ?? ""),
      "telefono"          => trim($post["telefono"] ?? ""),
      "correo"            => trim($post["correo"] ?? ""),
      "password_hash"     => password_hash($post["password"], PASSWORD_DEFAULT),
      "id_empresa"        => $post["id_empresa"] ?? null,
      "id_zona_localidad" => $post["id_zona"] ?? null,      // viene del select name="id_zona"
      "id_compania"       => $post["id_compania"] ?? null
    ];

    // Validar campos vacíos clave
    if (!$datos["id_empresa"] || !$datos["id_zona_localidad"] || !$datos["id_compania"]) {
      return ["status" => "error", "message" => "Seleccione empresa, zona y compañía"];
    }

    $ok = RegistroClienteModelo::registrar($datos);

    return $ok
      ? ["status" => "success", "message" => "Usuario registrado correctamente"]
      : ["status" => "error", "message" => "No se pudo registrar (¿correo duplicado?)"];
  }



  public static function loginAjax($post) {

    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    $correo = trim($post["correo"] ?? "");
    $password = $post["password"] ?? "";

    if ($correo === "" || $password === "") {
      return ["status" => "error", "message" => "Complete correo y contraseña"];
    }

    $usuario = LoginModelo::obtenerPorCorreo($correo);

    if (!$usuario) {
      return ["status" => "error", "message" => "Credenciales incorrectas"];
    }

    if (!password_verify($password, $usuario["password_hash"])) {
      return ["status" => "error", "message" => "Credenciales incorrectas"];
    }

    // Seguridad de sesión
    session_regenerate_id(true);

    $_SESSION["auth"] = true;
    $_SESSION["usuario"] = [
      "id" => $usuario["id_registro_clientes"],
      "nombre" => $usuario["nombre"],
      "apellido" => $usuario["apellido"],
      "correo" => $usuario["correo"],
      "id_empresa" => $usuario["id_empresa"]
    ];

    return [
      "status" => "success",
      "message" => "Bienvenido/a " . $usuario["nombre"],
      "redirect" => "modelo/atencion_cliente.php" // cambia a tu ruta real
    ];
  }
}
