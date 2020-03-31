<?php

require_once '../../modelo/usuario.php';
require_once '../../modelo/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (!isset($_POST["id_med"]) ||  !isset($_POST['cantidad']) || !isset($_POST['precio_unitario']) || !isset($_POST['fecha_ven'])) {
            ?>
                <script type="text/javascript">
                    alert('Hubo un error ingresando los datos al inventario, intentelo de nuevo');
                </script>
            <?php
        }


        $id_med = $_POST['id_med'];
        $cantidad = $_POST['cantidad'];
        $precio_unitario = $_POST['precio_unitario'];
        $fecha_ven = $_POST['fecha_ven'];

        $nuevo = new Inventario();
        $registro = $nuevo->crearInventario($db, $cantidad, $fecha_ven, $id_med_inventario, $id_fac_inventario, $precio_unitario);
        //if($cedula == $consulta['cedula']){
            ?>
              <script type="text/javascript">
            //        alert('La cedula ingresada ya existe');
              //      window.location="../../vista/Adu/crear_adu.php";
                </script>
            <?php
       // }else{  
            ?>
                <script type="text/javascript">
           //         alert('Registro exitoso');
             //       window.location="../../vista/Adu/crear_adu.php";
                </script>
            <?php

        }
     
}