<?php
require_once('../../modelo/conexion.php');
require_once('../../modelo/familia.php');

$consulta = new Familia();
$result = $consulta->listarFamilia($db);

