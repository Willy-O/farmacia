<?php

session_start(); 

require_once '../../modelo/asegurado.php';
require_once '../../modelo/conexion.php';

     //RECIBO LA VARIABLE "CEDULA"
       $cedula = $_POST['cedula'];
     //CREO UNA INSTANCIA DE LA CLASE MODELO
       $nuevo = new Asegurado();
     //LLAMO LA FUNCION consultarUsuario
       $consulta = $nuevo->consultarAsegurado($db, $cedula);
       if($consulta){
            header('Location: ../../vista/Ase/consultar2_ase.php');
       }
?>