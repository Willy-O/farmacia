<?php
    require_once '../../modelo/patologia.php';
    require_once '../../modelo/conexion.php';
    if  ($_POST["editar"] = true){
        if (!isset($_POST["id_patologia"]) || !isset($_POST['tipo_enfermedad']) || !isset($_POST['nom_enfermedad']) || !isset($_POST['id_med'])) {
            exit();
        }
    
        $id_patologia = $_POST['id_patologia'];
        $tipo_enfermedad = $_POST['tipo_enfermedad'];
        $nom_enfermedad = $_POST['nom_enfermedad'];
        $tiempo = $_POST['tiempo'];
        $promedio_med = $_POST['promedio_med'];
        $id_med = $_POST['id_med'];   
    
           $nuevo = new Patologia();
           $registro = $nuevo->editarPatologia($db, $id_patologia, $tipo_enfermedad, $nom_enfermedad, $tiempo, $promedio_med, $id_med);
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