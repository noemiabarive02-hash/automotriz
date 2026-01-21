<?php
require_once __DIR__ . '/../../controlador/auth.controlador.php';
require_once __DIR__ . '/../../modelo/login.modelo.php';

header("Content-Type: application/json; charset=utf-8");

try {
  if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["status" => "error", "message" => "Método no permitido"]);
    exit;
  }

  $resp = AuthControlador::loginAjax($_POST);
  echo json_encode($resp);
  exit;

} catch (Throwable $e) {
  echo json_encode(["status" => "error", "message" => "Error interno"]);
  exit;
}
