<?php
require_once('../../modelo/conexion.php');
require_once('../../modelo/traspaso.php');

$consulta = new Traspaso();
$result = $consulta->listarTraspaso($db);

