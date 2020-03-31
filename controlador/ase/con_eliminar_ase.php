<?php

session_start(); 

require_once '../../modelo/asegurado.php';
require_once '../../modelo/conexion.php';

      if(isset($_GET['id'])){
        $cedula = $_GET['id'];
        $nuevo = new Asegurado();
        $consulta = $nuevo->borrarAsegurado($db, $cedula);
        if($consulta){
          header('Location: ../../vista/Adu/eliminar_adu.php');
        }else{
          echo "<script type=\"text/javascript\">
                history.go(-1);
              </script>";
              exit;
     }
      }
      if(isset($_POST['cedula'])){
        $cedula = $_POST['cedula'];
        $nuevo = new Asegurado();
        $consulta = $nuevo->borrarAsegurado($db, $cedula);
        if($consulta){
          header('Location: ../../vista/Adu/eliminar_adu.php');
        }else{
          echo "<script type=\"text/javascript\">
                history.go(-1);
              </script>";
              exit;
         }
        }


?>
