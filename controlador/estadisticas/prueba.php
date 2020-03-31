<?php
	session_start();

    require_once('../../modelo/estadisticas.php');
    require_once('../../modelo/conexion.php');

    $nuevo = new Estadistica();
    $id = "1";
    $consulta = $nuevo->generarEstadistica($db, $id);
    if(!isset($consulta)){
        echo "error consulta";
    }else{
        $_SESSION['prueba'] = $consulta;
        header('Location: ../../vista/Estadistica/plantilla.php');
    }