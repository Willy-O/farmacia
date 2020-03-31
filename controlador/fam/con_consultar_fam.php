<?php

session_start(); 

require_once '../../modelo/familia.php';
require_once '../../modelo/conexion.php';

     //RECIBO LA VARIABLE "CEDULA"
       $cedula = $_POST['cedula'];
     //CREO UNA INSTANCIA DE LA CLASE MODELO
       $nuevo = new Familia();
     //LLAMO LA FUNCION consultarUsuario
       $consulta = $nuevo->consultarFamilia($db, $cedula);
       if($consulta){
            header('Location: ../../vista/Fam/consultar2_fam.php');
       }
?>