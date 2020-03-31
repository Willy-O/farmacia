<?php 
VerificarSession();


$usuario = 'PNFA';
$pass = 123456;
$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    limpiarDatosNoMayus($_POST['txt']);
    limpiarDatos($_POST['num']);

    if ($_POST['txt'] == $usuario && $_POST['num'] == $pass) {
        $_SESSION['usuario'] = $usuario;
        header ('location: ../../index.php');
    }else{
        $errores .= '<li>Los Datos estan erroneos</li>';
    }
}

Vista('login');

?>