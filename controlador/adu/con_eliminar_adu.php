<?php

session_start(); 

require_once '../../modelo/usuario.php';
require_once '../../modelo/conexion.php';

       $cedula = $_GET['id'];
       $nuevo = new Usuario();
       $consulta = $nuevo->borrarUsuario($db, $cedula);
       if($consulta == true){
        ?>
            <script type="text/javascript">
                alert('Se elimino el usuario correctamente');
                window.location="../../vista/Adu/lis_all_adu.php";
            </script>
        <?php
       }else{
        ?>
            <script type="text/javascript">
                alert('El usuario no se pudo eliminar');
                window.location="../../vista/Adu/lis_all_adu.php";
            </script>
        <?php
             exit;
       }
?>
