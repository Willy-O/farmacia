<?php
require_once('../../modelo/conexion.php');
require_once('../../modelo/asegurado.php');

    $asegurado = new Asegurado();

    $cedula = $_GET['ben'];
    if($cedula===''){
        echo ("error");
    }else{
        $consulta = $asegurado->consultarAsegurado($db,$cedula);

        if($cedula != $consulta['cedula']){
            echo "false";
        }else{
    
            // function conStatu(){
            //     if($consulta['statu'] == true){
            //         echo 'Activo';
            //     }else{
            //         echo 'Jubilado';
            //     } 
            // }
            
            // $st = conStatu();
            $statu;
            if ($consulta['statu']===true){
                $statu = 'Activo';
            }else{
                $statu = 'Jubilado';
            }
            $input = "<div class='row col-12'>";
            $input = $input. "<label class='label-control col-2' style='margin-right: 10px;'>Nombre</label>";
            $input = $input. "<label class='label-control col-2' style='margin-right: 10px;'>Apellido</label>";
            $input = $input. "<label class='label-control col-2' style='margin-right: 10px;'>Estatu</label>";
            $input = $input. "<label class='label-control col-2' style='margin-right: 10px;'>Ente</label>";
            $input = $input. "<label class='label-control col-2' style='margin-right: 10px;'>Poliza</label>";

            $input = $input. "<div class='row col-12'>";
            $input = $input. "<input class='form-control col-2' style='margin-right: 10px;' type='text' name='nombre' value='".$consulta['nombre']."' readonly>";
            $input = $input. "<input class='form-control col-2' style='margin-right: 10px;' name='apellido' value='".$consulta['apellido']."' readonly>";
            $input = $input. "<input class='form-control col-2' style='margin-right: 10px;' name='statu' value='".$statu."' readonly>";
            $input = $input. "<input class='form-control col-2' style='margin-right: 10px;' name='nombre_ente' value='".$consulta['nombre_ente']."' readonly>";
            $input = $input. "<input class='form-control col-2' style='margin-right: 10px;' name='poliza' id='poliza' value='".$consulta['poliza']."' readonly>";

            echo ($input);
        }
    }

