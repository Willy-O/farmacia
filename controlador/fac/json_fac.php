<?php
require_once('../../modelo/conexion.php');
require_once('../../modelo/medicamento.php');
    $nuevo = new Medicamento();
    $consulta = $nuevo->jsonMedicamentos($db,$_GET['dato']);
    $fila=0;
    for ($i=0; $i < count($consulta); $i++) { 
        $td = "<tr id='fila".$i." class='element'>";
        $td = $td. "<td>".$consulta[$i]['codigo_med']."</td>";
        $td = $td. "<td>".$consulta[$i]['nombre']."</td>";
        $td = $td. "<td>".$consulta[$i]['concentracion']."</td>";
        $td = $td. "<td>".$consulta[$i]['dosis']."</td>";
        $td = $td. "<td>".$consulta[$i]['forma_farmaceutica']."</td>";
        $td = $td. "<td>"."<input type='date' name='date[".$consulta[$i]['codigo_med']."][]'>"."</td>";
        $td = $td. "<td>"."<input type='number' name='count[".$consulta[$i]['codigo_med']."][]'>"."</td>";
        $td = $td. "<td>"."<input type='number' name='price[".$consulta[$i]['codigo_med']."][]'>"."</td>";
        $td = $td. "<td>"."<button type='button' id='row".$id."' clas='btnDelete'>X</button>"."</td>";
        $td = $td. "<input type='hidden' name='codigo_med[]'  value='".$consulta[$i]['codigo_med']."' class='med' data-med='".$consulta[$i]['codigo_med']."'>";
        $td = $td. "<input type='hidden' name='id[".$consulta[$i]['codigo_med']."][]' value='".$consulta[$i]['id']."'>";
        $td = $td. "</tr>";

        echo json_encode(array('table'=>$td,'id'=>$consulta[$i]['codigo_med'] ));
    }
