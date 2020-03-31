<?php

session_start(); 

require_once '../../modelo/medicamento.php';
require_once '../../modelo/conexion.php';


        $codigo_med = $_GET['codigo_med'];
       $nuevo = new Medicamento();
       $consulta = $nuevo->borrarMedicamento($db, $codigo_med);
       if($consulta){
            header('Location: ../../vista/Me/lis_all_me.php');
       }else{
        echo "<script type=\"text/javascript\">
              history.go(-1);
             </script>";
             exit;
       }
?>