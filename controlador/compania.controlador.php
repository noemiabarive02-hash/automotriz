|<?php

require_once __DIR__ . '/../modelo/cone.php';
require_once __DIR__ . '/../modelo/compania.modelo.php';

$companiaModel = new CompaniaModel($dbh);
$compania = $companiaModel->obtenerCompania(); 