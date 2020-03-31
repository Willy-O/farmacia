<?php
require_once('../../modelo/conexion.php');
require_once('../../modelo/patologia.php');

$consulta = new Patologia();
$result = $consulta->listarPatologia($db);

