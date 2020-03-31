<?php
require_once '../../modelo/factura.php';
require_once '../../modelo/conexion.php';
    if  ($_POST["editar"] = true){
        if (!isset($_POST["fecha"]) || !isset($_POST['num_factur_fiscal']) || !isset($_POST['razon_social'])) {
        exit();
        }

        $fecha = $_POST['fecha'];
        $num_factur_fiscal = $_POST['num_factur_fiscal'];   
        $razon_social = $_POST['razon_social'];   

           $nuevo = new Factura();
           $registro = $nuevo->editarFactura($db, $fecha, $num_factur_fiscal, $razon_social);
                if(isset($registro)){
                    echo "<script type=\"text/javascript\">
                        history.go(-1);
                         </script>";
                        exit;
                    //header('Location: ../../vista/Adu/editar_adu.html');
                }
                else{
                    echo "error";
                }
        }
    //else{
      //  echo "<script type=\"text/javascript\">
       // history.go(0);
        // </script>";
       // exit;;
    //}
?>