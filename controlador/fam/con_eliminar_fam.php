<?php

session_start(); 

require_once '../../modelo/familia.php';
require_once '../../modelo/conexion.php';

     //RECIBO LA VARIABLE "CEDULA"
       $cedula = $_POST['cedula'];
     //CREO UN OBJETO DE LA CLASE MODELO
       $nuevo = new Familia();
     //LLAMO LA FUNCION eliminarUsuario
       $consulta = $nuevo->borrarFamilia($db, $cedula);
       if($consulta){
            header('Location: ../../vista/Fam/eliminar_fam.php');
       }else{
        echo "<script type=\"text/javascript\">
              history.go(-1);
             </script>";
             exit;
       }
?>
