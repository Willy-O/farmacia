<?php
	session_start();

    require_once('../../modelo/estadisticas.php');
    require_once('../../modelo/conexion.php'); 

    if (!isset($_POST["fechaA"]) || !isset($_POST['fechaB'])) {
            exit();
        }
        $nuevo = new Estadistica();
        $fechaA = $_POST['fechaA'];
        $fechaB = $_POST['fechaB']; 
        $fedes = $nuevo->fechaDespacho($db, $fechaA, $fechaB);
            if(!isset($fedes)){
                 echo "error consulta";
            }else{
                $_SESSION['fedes'] = $fedes;
                header('Location: ../../vista/Estadistica/estadistica_pie_fd.php');
            }



    