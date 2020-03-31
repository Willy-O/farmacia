<?php

require_once '../../modelo/medicamento.php';
require_once '../../modelo/conexion.php';

if (!isset($_POST["codigo_med"]) || !isset($_POST['nombre']) || !isset($_POST['concentracion']) || !isset($_POST['forma_farmaceutica']) || !isset($_POST['unidosis']) || !isset($_POST['dosis'])) {
        ?>
            <script type="text/javascript">
                alert('Hubo un error intentelo de nuevo');
                window.location="../../vista/Me/crear_me.php";
            </script>
        <?php
    }
        $codigo_med = $_POST['codigo_med'];
        $nombre = $_POST['nombre'];
        $concentracion = $_POST['concentracion'];
        $informacion = $_POST['informacion'];
        $forma_farmaceutica = $_POST['forma_farmaceutica'];
        $unidosis = $_POST['unidosis'];
        $dosis = $_POST['dosis'];  
        $presentacion = $_POST['presentacion'];  
        $contenido = $_POST['contenido'];  
        

       $nuevo = new Medicamento();
       $consulta = $nuevo->consultarMedicamento($db, $codigo_med);
       if($codigo_med == $consulta['codigo_med']){
           ?>
               <script type="text/javascript">
                   alert('El medicamento ingresado ya existe');
                   window.location="../../vista/Me/crear_me.php";
               </script>
           <?php
       }else{  
        ?>
            <script type="text/javascript">
                alert('Registro exitoso');
                window.location="../../vista/Me/crear_me.php";
            </script>
        <?php

         $registro = $nuevo->registrarMedicamento($db, $codigo_med, $nombre, $concentracion, $informacion, $forma_farmaceutica, $unidosis, $dosis, $presentacion, $contenido);
        }
?>