<?php

session_start();

require_once '../../modelo/entes.php';
require_once '../../modelo/conexion.php';

     
        $id_ente = $_POST['id'];
        $nuevo = new Ente();
        $consulta = $nuevo->consultarEnte($db, $id_ente);
        if($consulta){
            header('Location: ../../vista/En/consultar2_en.php');
       }
?>