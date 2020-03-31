<?php

require_once('../../modelo/inventario.php');
require_once('../../modelo/conexion.php');

$consulta = new Inventario();
$result = $consulta->listarAllInventario($db);


