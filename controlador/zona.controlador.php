<?php

require_once __DIR__ . '/../modelo/cone.php';
require_once __DIR__ . '/../modelo/zona.modelo.php';

$zonaModel = new ZonaModel($dbh);
$zona = $zonaModel->obtenerZona();
