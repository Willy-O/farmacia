<?php
    require_once '../../modelo/traspaso.php';
    require_once '../../modelo/conexion.php';
    if  ($_POST["editar"] = true){
        if (!isset($_POST["id_traspaso"]) || !isset($_POST['id_pedido']) || !isset($_POST['id_sucursal']) || !isset($_POST['id_inventario'])) {
            exit();
        }
    
        $id_traspaso = $_POST['id_traspaso'];
        $id_pedido = $_POST['id_pedido'];
        $id_sucursal = $_POST['id_sucursal'];
        $id_inventario = $_POST['id_inventario']; 
    
           $nuevo = new Traspaso();
           $registro = $nuevo->editarTraspaso($db, $id_traspaso, $id_pedido, $id_sucursal, $id_inventario);
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