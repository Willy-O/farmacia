<?php

session_start();

require_once '../../modelo/factura.php';
require_once '../../modelo/conexion.php';

     //RECIBO LA VARIABLE 
     $num_factur_fiscal = $_POST['num_factur_fiscal'];    
     //CREO UN OBJETO DE LA CLASE MODELO
        $nuevo = new Factura();
     //LLAMO LA FUNCION eliminarUsuario
       $consulta = $nuevo->borrarFactura($db, $num_factur_fiscal);
       if($consulta){
            header('Location: ../../vista/En/eliminar_en.html');
       }else{
        echo "<script type=\"text/javascript\">
              history.go(-1);
             </script>";
             exit;
       }
?>