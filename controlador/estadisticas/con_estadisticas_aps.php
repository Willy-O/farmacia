<?php
	session_start();

    require_once('../../modelo/estadisticas.php');
    require_once('../../modelo/conexion.php'); 

        $nuevo = new Estadistica();
        $status = $nuevo->aseguradosPorStatus($db);
            if(!isset($status)){
                echo "error consulta";
            }else{
                if($_POST["grafico"] == "pie"){
                $_SESSION['status'] = $status;
                header('Location: ../../vista/Estadistica/estadistica_pie_aps.php');
                }
                if($_POST["grafico"] == "pyramid"){
                $_SESSION['status'] = $status;
                header('Location: ../../vista/Estadistica/estadistica_pyramid_aps.php');
            }
            if(!isset($_POST["grafico"])){
                ?>
                <script type="text/javascript">
                alert('Seleccione un tipo de grafico');
                </script>
                <?php
            }
        }
