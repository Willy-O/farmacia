<?php

session_start(); 

require_once '../../modelo/pedido.php';
require_once '../../modelo/conexion.php';

     //RECIBO LA VARIABLE "CEDULA"
       $id_pedido = $_POST['id_pedido'];
     //CREO UNA INSTANCIA DE LA CLASE MODELO
       $nuevo = new Pedido();
     //LLAMO LA FUNCION consultarUsuario
       $consulta = $nuevo->consultarPedido($db, $id_pedido);
       if($consulta){
            header('Location: ../../vista/Ped/consultar2_ped.php');
       }
?>