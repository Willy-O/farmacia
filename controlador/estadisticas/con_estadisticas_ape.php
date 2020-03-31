<?php
	session_start();

    require_once('../../modelo/estadisticas.php');
    require_once('../../modelo/conexion.php'); 
        $nuevo = new Estadistica();
        $asegurado = $nuevo->aseguradosPorEntes($db);
            if(!isset($asegurado)){
                echo "error consulta";
            }else{
                if($_POST["grafico"] == "pie"){
                    $_SESSION['asegurado'] = $asegurado;
                    header('Location: ../../vista/Estadistica/estadistica_pie_ape.php');
                }
                if($_POST["grafico"] == "pyramid"){
                    $_SESSION['asegurado'] = $asegurado;
                    header('Location: ../../vista/Estadistica/estadistica_pyramid_ape.php');
                }
                if(!isset($_POST["grafico"])){
                    ?>
                    <script type="text/javascript">
                    alert('Seleccione un tipo de grafico');
                    </script>
                    <?php
                }
            }
     