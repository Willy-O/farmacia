<?php

require_once '../../modelo/entes.php';
require_once '../../modelo/conexion.php';

if (!isset($_POST['nom_ente']) || !isset($_POST['rif_ente'])) {
    ?>
    <script type="text/javascript">
        alert('Hubo un error intentelo de nuevo');
        window.location="../../vista/En/crear_en.php";
    </script>
    <?php

    }

        $nombre = $_POST['nom_ente'];
        $rif = $_POST['rif_ente'];   

        $nuevo = new Ente();
        $consulta = $nuevo->consultarEnte($db, $rif);
        if($rif == $consulta['rif']){
            ?>
                <script type="text/javascript">
                    alert('El ente ingresado ya existe');
                    window.location="../../vista/En/crear_en.php";
                </script>
            <?php
        }else{
          
                ?>
                <script type="text/javascript">
                    alert('Registro exitoso');
                    window.location="../../vista/En/crear_en.php";
                </script>
            <?php
            $registro = $nuevo->registrarEnte($db, $nombre, $rif);
        }
?>