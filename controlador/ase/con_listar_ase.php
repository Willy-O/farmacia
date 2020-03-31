<?php
require_once('../../modelo/conexion.php');
require_once('../../modelo/asegurado.php');

$consulta = new Asegurado();
$result = $consulta->listarAllAsegurado($db);

