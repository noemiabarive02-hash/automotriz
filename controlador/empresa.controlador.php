<?php

require_once __DIR__ . '/../modelo/cone.php';
require_once __DIR__ . '/../modelo/empresa_modelo.php';

$empresaModel = new EmpresaModel($dbh);
$empresas = $empresaModel->obtenerEmpresas();
