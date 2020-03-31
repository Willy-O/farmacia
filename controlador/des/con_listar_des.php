<?php

require_once('../../modelo/despacho.php');
require_once('../../modelo/conexion.php');

$consulta = new Despacho();
$result = $consulta->listarAllDespacho($db);

