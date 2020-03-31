<?php

session_start(); 

require_once '../../modelo/despacho.php';
require_once '../../modelo/conexion.php';

          $id_despacho = $_POST['id_despacho'];
          $nuevo = new Despacho();
          $consulta = $nuevo->consultarDespacho($db, $id_despacho);
          if($consulta){
                header('Location: ../../vista/Des/consultar2_des.php');
         }
        
?>