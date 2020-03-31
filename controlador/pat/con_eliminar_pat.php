<?php

session_start(); 

require_once '../../modelo/patologia.php';
require_once '../../modelo/conexion.php';

     //RECIBO LA VARIABLE "CEDULA"
       $id_patologia = $_POST['id_patologia'];
     //CREO UN OBJETO DE LA CLASE MODELO
       $nuevo = new Patologia();
     //LLAMO LA FUNCION eliminarUsuario
       $consulta = $nuevo->borrarPatologia($db, $id_patologia);
       if($consulta){
            header('Location: ../../vista/Pat/eliminar_pat.php');
       }else{
        echo "<script type=\"text/javascript\">
              history.go(-1);
             </script>";
             exit;
       }
?>
