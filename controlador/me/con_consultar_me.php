<?php

session_start();

require_once '../../modelo/medicamento.php';
require_once '../../modelo/conexion.php';


        $codigo_med = $_POST['$codigo_med'];
        $nuevo = new Medicamento();
        $consulta = $nuevo->consultarMedicamento($db, $codigo_med);
        if($consulta){
            header('Location: ../../vista/Me/consultar2_me.php');
       }
?>