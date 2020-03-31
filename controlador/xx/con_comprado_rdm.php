<?php

require_once '../../modelo/medicamentos.php';
require_once '../../modelo/conexion.php';
//!isset($_POST["date"]) || || !isset($_POST['time'])
if ( !isset($_POST['medicamento']) || !isset($_POST['facdpro']) || !isset($_POST['npedido']) ) {
        exit();
    }
    
     //   $date = $_POST['date'];
        $medicamento = $_POST['medicamento'];
        $nfacturaproveedor = $_POST['facdpro'];
        $npedido = $_POST['npedido'];
       // $time = $_POST['time'];   

       $nuevo = new MedicamentoComprado();
       $registro = $nuevo->registrarMedicamentoComprado($db,  $medicamento, $nfacturaproveedor, $npedido);
       if($registro==true){
           echo "bien";
       }else{
           echo "mal";
       }
?>

