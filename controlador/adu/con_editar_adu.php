<?php
    require_once '../../modelo/usuario.php';
    require_once '../../modelo/conexion.php';
        if (!isset($_POST["nombre"]) || !isset($_POST['apellido']) || !isset($_POST['cedula']) || !isset($_POST['usuario']) || !isset($_POST['password']) || !isset($_POST['perfil'])) {
        }
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $cedula = $_POST['cedula'];
            $nom_user = $_POST['usuario'];
            $contrasenna = $_POST['password'];
            $cargo = $_POST['perfil'];               
            $id = $_POST['id'];   

           $nuevo = new Usuario();
           $registro = $nuevo->editarUsuario($db, $nombre, $apellido, $cedula, $cargo, $nom_user, $contrasenna, $id);
            ?>
                <script type="text/javascript">
                    alert('Modificación realizada con exitos');
                    window.location="../../vista/adu/lis_all_adu.php";
                </script>
            <?php
?>