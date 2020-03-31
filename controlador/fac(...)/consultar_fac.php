<?php

session_start();

require_once '../../modelo/factura.php';
require_once '../../modelo/conexion.php';

     //RECIBO LA VARIABLE "CEDULA"
     $num_factur_fiscal = $_POST['num_factur_fiscal']; 
     //CREO UNA INSTANCIA DE LA CLASE MODELO
        $nuevo = new Factura();
     //LLAMO LA FUNCION consultarUsuario
        $consulta = $nuevo->consultarFacturaNum($db, $num_factur_fiscal);
        if($consulta){
            header('Location: ../../vista/Me/consultar2_adu.php');
       }
?>