<?php
    require_once '../../modelo/familia.php';
    require_once '../../modelo/conexion.php';
    if  ($_POST["editar"] = true){
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
           $registro = $nuevo->editarFamilia($db, $nombre, $apellido, $cedula, $num_seguro, $id_patologia, $parentesco, $direccion);
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