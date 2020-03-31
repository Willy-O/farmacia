<?php

session_start(); 

require_once '../../modelo/factura.php';
require_once '../../modelo/conexion.php';

        if(isset($_GET['id'])){
            $num_factura = $_GET['id'];
            $nuevo = new Factura();
            $consulta = $nuevo->borrarFactura($db, $num_factura);
            header('Location: ../../vista/Fac/lis_all_fac.php');
        }else{
          $id_pedido = $_POST['id_pedido'];
          $nuevo = new Pedido();
          $consulta = $nuevo->borrarPedido($db, $id_pedido);
          if($consulta){
                header('Location: ../../vista/Fac/lis_all_fac.php');
          }else{
            echo "<script type=\"text/javascript\">
                  history.go(-1);
                </script>";
                exit;
          }
        }
?>
