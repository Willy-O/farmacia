<?php

session_start(); 

require_once '../../modelo/patologia.php';
require_once '../../modelo/conexion.php';

     //RECIBO LA VARIABLE "CEDULA"
       $cedula = $_POST['cedula'];
     //CREO UNA INSTANCIA DE LA CLASE MODELO
       $nuevo = new Patologia();
     //LLAMO LA FUNCION consultarUsuario
       $consulta = $nuevo->consultarPatologia($db, $cedula);
       if($consulta){
            header('Location: ../../vista/Pat/consultar2_pat.php');
       }
?>