<?php

require_once '../../modelo/medicamentos.php';
require_once '../../modelo/conexion.php';

if (!isset($_POST["date"]) || !isset($_POST['medicamento']) || !isset($_POST['nfacturaproveedor']) || !isset($_POST['npedido']) || !isset($_POST['time'])) {
        exit();
    }

        $date = $_POST['date'];
        $medicamento = $_POST['medicamento'];
        $nfacturaproveedor = $_POST['nfacturaproveedor'];
        $npedido = $_POST['npedido'];
        $time = $_POST['time'];   

       $nuevo = new MedicamentoDonado();
       $registro = $nuevo->registrarMedicamentoDonado($db, $date, $medicamento, $nfacturaproveedor, $npedido, $time);
?>

