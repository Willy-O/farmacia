<?php
require_once('../../modelo/conexion.php');
require_once('../../modelo/usuario.php'); 

$consulta = new Usuario();
$result = $consulta->listarallUsuario($db);

