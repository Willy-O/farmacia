<?php

require_once('../../modelo/factura.php');
require_once('../../modelo/conexion.php');

$consulta = new Factura();
$result = $consulta->listarAllFactura($db);

