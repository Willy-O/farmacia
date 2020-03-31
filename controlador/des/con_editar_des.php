<?php
    require_once '../../modelo/usuario.php';
    require_once '../../modelo/conexion.php';
    if  ($_POST["editar"] = true){
        if (!isset($_POST["id_despacho"]) || !isset($_POST['fecha_despacho']) || !isset($_POST['id_pedido']) || !isset($_POST['id_factura'])) {
            exit();
        }
    
        $id_despacho = $_POST['id_despacho'];
        $fecha_despacho = $_POST['fecha_despacho'];
        $id_pedido = $_POST['id_pedido'];
        $id_factura = $_POST['id_factura'];
    
           $nuevo = new Despacho();
           $registro = $nuevo->editarDespacho($db, $id_despacho, $fecha_despacho, $id_pedido, $id_factura);
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
    else{
        echo "<script type=\"text/javascript\">
        history.go(0);
         </script>";
        exit;;
    }
?>