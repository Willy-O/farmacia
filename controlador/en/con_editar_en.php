<?php
    require_once '../../modelo/entes.php';
    require_once '../../modelo/conexion.php';
        if (!isset($_POST["nombre"]) || !isset($_POST['rif'])) {
            ?>
            <script type="text/javascript">
                alert('Hubo un error intentelo de nuevo');
                window.location="../../vista/En/lis_all_en.php";
            </script>
        <?php
        }
        
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $rif = $_POST['rif'];   

           $nuevo = new Ente();
           $registro = $nuevo->editarEnte($db, $id, $nombre, $rif);
           if($registro == null){
            ?>
            <script type="text/javascript">
                alert('Modificacion exitosa');
                window.location="../../vista/En/lis_all_en.php";
            </script>
            <?php
            exit;
        }
        else{
            echo "error";
        }

?>