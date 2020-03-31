<?php
    require_once '../../modelo/pedido.php';
    require_once '../../modelo/conexion.php';
    if  ($_POST["editar"] = true){
        if (!isset($_POST["id_pedido"]) || !isset($_POST['fecha_pedido']) || !isset($_POST['cedula_ase']) || !isset($_POST['id_med']) || !isset($_POST['cedula_fam'])) {
            exit();
        }
    
        $id_pedido = $_POST['id_pedido'];
        $fecha_pedido = $_POST['fecha_pedido'];
        $cedula_ase = $_POST['cedula_ase'];
        $id_med = $_POST['id_med'];
        $cedula_fam = $_POST['cedula_fam'];
    
           $nuevo = new Pedido();
           $registro = $nuevo->editarPedido($db, $id_pedido, $fecha_pedido, $cedula_ase, $id_med, $cedula_fam);
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