<?php
require_once('../../modelo/conexion.php');
require_once('../../modelo/medicamento.php');
require_once('../../modelo/inventario.php');

    $nuevo = new Medicamento();
    $consulta = $nuevo->jsonMedicamentos($db,$_GET['dato']);
    $nuevo = new Inventario();

    $fila=0;
    for ($i=0; $i < count($consulta); $i++) { 
        $aconsulta = $nuevo->jsonInventario($db,$consulta[$i]['id']);
        $unidosis;
        if ($consulta[$i]['unidosis']===true){
            $unidosis = 'Si';
        }else{
            $unidosis = 'No';
        }
        $td = "<tr>";
        $td = $td. "<td>".$consulta[$i]['codigo_med']."</td>";
        $td = $td. "<td>".$consulta[$i]['nombre']."</td>";
        $td = $td. "<td>".$unidosis."</td>";
        $td = $td. "<td>".$consulta[$i]['forma_farmaceutica']."</td>";
        $td = $td. "<td>".$consulta[$i]['presentacion']." x".$consulta[$i]['contenido']."</td>";
        $td = $td. "<td>".$consulta[$i]['concentracion']." ".$consulta[$i]['dosis']."</td>";
        $td = $td. "<td>".$aconsulta['precio_unitario']."</td>";
        $td = $td. "<td>"."<input type = 'number' name='count[".$consulta[$i]['codigo_med']."][]'>"."</td>";
        $td = $td. "<input type='hidden' name='codigo_med[]' value='".$consulta[$i]['codigo_med']."' class='med' data-med='".$consulta[$i]['codigo_med']."'>";
        $td = $td. "<input type='hidden' name='contenido[]' value='".$consulta[$i]['contenido']."'>";
        $td = $td. "<input type='hidden' name='unidosis[]' value='".$unidosis."'>";
        $td = $td. "<input type='hidden' name='precio[]' value='".$aconsulta['precio_unitario']."'>";
        $td = $td. "<input type='hidden' name='id[".$consulta[$i]['codigo_med']."][]' value='".$consulta[$i]['id']."'>";
        $td = $td. "</tr>";

        echo json_encode(array('table'=>$td,'id'=>$consulta[$i]['codigo_med'] ));
    }
