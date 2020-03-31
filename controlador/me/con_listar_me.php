<?php
require_once('../../modelo/conexion.php');
require_once('../../modelo/medicamento.php');

$consulta = new Medicamento();
$result = $consulta->listarAllMedicamento($db);

