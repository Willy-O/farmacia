<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']!='') {
        print_r($_SESSION['cargo']);
        switch ($_SESSION['cargo']) {
            case 'administrador':
            ?>
            <script type="text/javascript">
                window.location="./vista/Inicios/inicio_administrador.php";
            </script>
            <?php 
                break; 

            case 'farmaceuta':
            ?>
            <script type="text/javascript">
                window.location="./vista/Inicios/inicio_farmaceuta.php";
            </script>
            <?php 
                break;

            case 'auxiliar':
            ?>
            <script type="text/javascript">
                window.location="./vista/Inicios/inicio_auxiliar.php";
            </script>
            <?php 
                break;
            
            default:
                # code...
                break;
        }
    }else{
        session_unset();
    }
 ?>
<!DOCTYPE>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>FASMIJ</title>
        <link rel="stylesheet" type="text/css" href="recursos/css/inicio.css">
    </head>
    <body>
        <img src="recursos/img/logo_FASMIJ.PNG" style="width: 50%; margin-left: 20%; height: 200px;">
            <SCRIPT  language=JavaScript> 
                function go()
                {
                    if (document.form.password.value=='CONTRASEÑA' && document.form.login.value=='USUARIO')
                    { 
                        document.form.submit(); 
                    } 
                    else
                    { 
                        alert("Porfavor ingrese, nombre de usuario y contraseña correctos."); 
                    } 
                } 
            </SCRIPT> 
            <div class="contenedor-form">
               
            <div class="toggle">
            </div>
            <div class="formulario"><center>
                <h2>Iniciar sesión</h2></center>
                    <form action="controlador/valida.php" method="POST">
                        <select required="" name="perfil" id="usuario"  style=" padding: 1%; width: 50%; margin: 5px; margin-left: 25%;">
                        <option disabled="" selected="" value="">Seleccionar</option>
                        <option value="administrador">Administrador</option>
                        <option value="farmaceuta">Farmaceuta</option>
                        <option value="auxiliar">Auxiliar</option>
                        </select> 
                        <b>Usuario:</b>
                            <input autocomplete="off" type="text" name="usuario" placeholder="Usuario" required=""> 
                        <b>Contraseña:</b>
                            <input type="password" name="password" placeholder="Contraseña" required=""> 
                                
                            <br><input type="submit" value="ingresar" name="ingresar">             
            </center>
                    </form>
            </div>
    </body>
</html>