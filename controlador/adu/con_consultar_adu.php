<?php

session_start();

require_once '../../modelo/usuario.php';
require_once '../../modelo/conexion.php';

       if(isset($_POST['cedulaOne'])){
        $cedula = $_POST['cedulaOne'];
        $nuevo = new Usuario();
        $consulta = $nuevo->consultarUsuario($db, $cedula);
        if($consulta[cedula] !== $cedula){
          ?>
            <script type="text/javascript">
                alert('La cedula ingresada es incorrecta o no está registrada');
                window.location="../../vista/Adu/lis_all_adu.php";
            </script>
          <?php
           }else{
        header('Location: ../../vista/Adu/lis_adu.php');
           }
       }
       if(isset($_POST['cedula'])){
        $cedula = $_POST['cedula'];
        $nuevo = new Usuario();
        $consulta = $nuevo->consultarUsuario($db, $cedula);
        if($consulta[cedula] !== $cedula){
          ?>
          <script type="text/javascript">
              alert('La cedula ingresada es incorrecta o no está registrada');
              window.location="../../consultar_adu.php";
          </script>
        <?php
        }else{
                  header('Location: ../../vista/Adu/consultar2_adu.php');
            }
          }
?>