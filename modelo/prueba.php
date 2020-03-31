<?php
	require_once'conexion.php';
	require_once'estadisticas.php';

    $fechaA='10/10/2019';
    $fechaB='20/10/2019';
	$nuevo = new Estadistica();
    $result = $nuevo->fechaDespacho($db, $fechaA, $fechaB);
    var_dump($result);