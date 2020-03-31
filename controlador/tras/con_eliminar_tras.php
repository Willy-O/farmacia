<?php

session_start(); 

require_once '../../modelo/traspaso.php';
require_once '../../modelo/conexion.php';

     //RECIBO LA VARIABLE "CEDULA"
       $id_trapaso = $_POST['id_trapaso'];
     //CREO UN OBJETO DE LA CLASE MODELO
       $nuevo = new Traspaso();
     //LLAMO LA FUNCION eliminarUsuario
       $consulta = $nuevo->borrarTraspaso($db, $id_trapaso);
       if($consulta){
            header('Location: ../../vista/Tras/eliminar_tras.php');
       }else{
        echo "<script type=\"text/javascript\">
              history.go(-1);
             </script>";
             exit;
       }
?>
