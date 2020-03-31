<?php
require_once('../../modelo/conexion.php');
require_once('../../modelo/entes.php');

$consulta = new Ente();
$result = $consulta->listarAllEnte($db);

