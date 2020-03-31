<?php

require_once '../../modelo/usuario.php';
require_once '../../modelo/conexion.php';
require_once '../validall.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (!isset($_POST["nombre"]) || !isset($_POST['apellido']) || !isset($_POST['cedula']) || !isset($_POST['usuario']) || !isset($_POST['password']) || !isset($_POST['perfil'])) {
        exit();
    }


        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $nom_user = $_POST['usuario'];
        $cargo = $_POST['perfil'];
        $contrasenna = $_POST['password'];

        $nuevo = new Usuario();
        $consulta = $nuevo->consultarUsuario($db, $cedula);
        if($cedula == $consulta['cedula']){
            ?>
                <script type="text/javascript">
                    alert('La cedula ingresada ya existe');
                    window.location="../../vista/Adu/crear_adu.php";
                </script>
            <?php
        }else{  
            ?>
                <script type="text/javascript">
                    alert('Registro exitoso');
                    window.location="../../vista/Adu/crear_adu.php";
                </script>
            <?php

        }

        $registro = $nuevo->registrarUsuario($db, $nombre, $apellido, $cedula, $cargo, $nom_user, $contrasenna);
     
}
?>

