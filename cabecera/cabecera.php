<?php
require_once "cabecera/cabecera.php";
require_once "controlador/empresa.controlador.php";
require_once "controlador/zona.controlador.php";
require_once "controlador/compania.controlador.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Plastiauto Perú | Reparación Automotriz</title>

<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./node_modules/select2/dist/css/select2.min.css">

</head>

<body>

<!-- TOP BAR -->
<div class="container-fluid top-bar py-2 text-center">
  <div class="row">
    <div class="col-md-4"><i class="bi bi-whatsapp"></i> 999 999 999</div>
    <div class="col-md-4"><i class="bi bi-envelope"></i> contacto@plastiauto.pe</div>
    <div class="col-md-4"><i class="bi bi-geo-alt"></i> Lima – Perú</div>
  </div>
</div>

<!-- NAVBAR MEJORADO - LOGO IZQUIERDA -->
<nav class="navbar navbar-expand-lg bg-white sticky-top" id="mainNavbar">
  <div class="container">
    <!-- Logo a la izquierda -->
    <a class="navbar-brand" href="#">
      <i class="bi bi-car-front-fill"></i>
      <span>PLASTIAUTO</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
      <!-- Menús alineados a la derecha -->
      <ul class="navbar-nav ms-auto gap-lg-3">
        <li class="nav-item">
          <a class="nav-link active" href="#inicio">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#nosotros">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#servicios">Servicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#beneficios">Beneficios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contacto">Contacto</a>
        </li>
        
        <!-- Separador y CTA en versión mobile -->
        <li class="nav-item d-lg-none mt-3">
          <div class="navbar-separator d-none"></div>
          <a  class="btn btn-orange w-100" data-bs-toggle="modal" data-bs-target="#exampleModal"   >
            <i class="bi bi-chat-dots me-2"></i>Iniciar Session
          </a>
        </li>
      </ul>
      
      <!-- Botón CTA solo visible en desktop -->
      <div class="d-none d-lg-flex align-items-center ms-4">
        <div class="navbar-separator"></div>
        <a  class="nav-link navbar-cta" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="bi bi-chat-dots"></i>Iniciar Session
        </a>
      </div>
    </div>
  </div>
</nav>

