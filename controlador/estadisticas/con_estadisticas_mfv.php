<?php
	session_start();

    require_once('../../modelo/estadisticas.php');
    require_once('../../modelo/conexion.php'); 

    if (!isset($_POST["fechaMA"]) || !isset($_POST['fechaMB'])) {
            exit();
        }
        $nuevo = new Estadistica();
        $fechaMA = $_POST['fechaMA'];
        $fechaMB = $_POST['fechaMB']; 
        $feven = $nuevo->fechaVencimiento($db, $fechaMA, $fechaMB);
            if(!isset($feven)){
                 echo "error consulta";
            }else{
                $_SESSION['feven'] = $feven;
                header('Location: ../../vista/Estadistica/estadistica_pie_mfv.php');
            }


