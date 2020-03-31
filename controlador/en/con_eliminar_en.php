<?php

session_start();

require_once '../../modelo/entes.php';
require_once '../../modelo/conexion.php';

     
      $id = $_GET['id'];
      $nuevo = new Ente();
      $q = $nuevo->consultarEnteAsegurado($db, $id);
      if($q == true){
            ?>
            <script type="text/javascript">
                alert('Esta sucursal tiene personal registrado, no puede eliminarla');
                window.location="../../vista/En/lis_all_en.php";
            </script>
        <?php
      }
      $consulta = $nuevo->borrarEnte($db, $id);
      if($consulta == true){
            ?>
            <script type="text/javascript">
                alert('Se eliminó con exito');
            </script>
            <?php
            header('Location: ../../vista/En/lis_all_en.php');
      }else{
            ?>
            <script type="text/javascript">
                alert('Se eliminó con exito');
                window.location="../../vista/En/lis_all_en.php";
            </script>
            <?php
       }
?>