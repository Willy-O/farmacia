<?php
    require_once '../../modelo/asegurado.php';
    require_once '../../modelo/conexion.php';
    if (!isset($_POST['nombre']) || !isset($_POST['apellido']) || !isset($_POST['cedula']) || !isset($_POST['numero_habitacion']) || !isset($_POST['numero_celular']) || !isset($_POST['rif']) || !isset($_POST['direccion'])) {

    }

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $numero_habitacion = $_POST['numero_habitacion'];
        $numero_celular = $_POST['numero_celular'];
        $rif_ente = $_POST['rif']; 
        $statu = $_POST['statu'];  
        $direccion = $_POST['direccion']; 
        $id = $_POST['iden'];
        $poliza = $_POST['poliza']; 

    
           $nuevo = new Asegurado();
           $registro = $nuevo->editarAsegurado($db, $nombre, $apellido, $cedula, $numero_habitacion, $numero_celular, $direccion, $statu, $rif_ente, $poliza, $id);
           if($registro = null){
                ?>
                <script type="text/javascript">
                    alert('Hubo un problema al ingrear los datos, intente de nuevo');
                    window.location="../../vista/Ase/editar2_ase.php";
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript">
                    alert('Modificación exitosa');
                    window.location="../../vista/Ase/editar_ase.php";
                </script>
                <?php
            }
?>