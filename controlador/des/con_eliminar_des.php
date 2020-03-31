<?php

session_start(); 

require_once '../../modelo/despacho.php';
require_once '../../modelo/conexion.php';

        if(isset($_GET['id'])){
          $id = $_GET['id'];
          $nuevo = new Despacho();
          $consulta = $nuevo->borrarDespacho($db, $id);
          header('Location: ../../vista/Des/lis_des.php');
        }else{
          $id_despacho = $_POST['id_despacho'];
          $nuevo = new Despacho();
          $consulta = $nuevo->borrarDespacho($db, $id_despacho);
          if($consulta){
                header('Location: ../../vista/Des/eliminar_des.php');
          }else{
            echo "<script type=\"text/javascript\">
                  history.go(-1);
                </script>";
                exit;
          }
        }
?>
