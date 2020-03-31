<?php

require_once '../../modelo/familia.php';
require_once '../../modelo/conexion.php';

if (!isset($_POST["nombre"]) || !isset($_POST['apellido']) || !isset($_POST['cedula']) || !isset($_POST['num_seguro']) || !isset($_POST['id_patologia']) || !isset($_POST['parentesco']) || !isset($_POST['direccion'])) {
        exit();
    }

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $num_seguro = $_POST['num_seguro'];
        $id_patologia = $_POST['id_patologia'];
        $parentesco = $_POST['parentesco'];   
        $direccion = $_POST['direccion'];   

       $nuevo = new Familia();
       $registro = $nuevo->registrarFamilia($db, $nombre, $apellido, $cedula, $num_seguro, $id_patologia, $parentesco, $direccion);
?>

