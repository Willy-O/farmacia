<?php

session_start();

require_once '../../modelo/traspaso.php';
require_once '../../modelo/conexion.php';

     //RECIBO LA VARIABLE "CEDULA"
       $id_traspaso = $_POST['id_traspaso'];
     //CREO UNA INSTANCIA DE LA CLASE MODELO
       $nuevo = new Traspaso();
     //LLAMO LA FUNCION consultarUsuario
       $consulta = $nuevo->consultarTraspaso($db, $id_traspaso);
       if($consulta){
            header('Location: ../../vista/Tras/consultar2_tras.php');
       }
?>