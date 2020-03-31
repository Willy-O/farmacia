<?php
    require_once '../../modelo/medicamento.php';
    require_once '../../modelo/conexion.php';

    if (!isset($_POST["codigo_med"]) || !isset($_POST['nombre']) || !isset($_POST['concentracion']) || !isset($_POST['forma_farmaceutica']) || !isset($_POST['unidosis']) || !isset($_POST['dosis'])) {
            ?>
<!--             <script type="text/javascript">
                alert('Hubo un error intentelo de nuevo');
                window.location="../../vista/Me/editar_me.php?codigo_med=".$_POST["codigo_med"];
            </script> -->
        <?php
    }
    
        $id = $_POST['id'];
        $codigo_med = $_POST['codigo_med'];
        $nombre = $_POST['nombre'];
        $concentracion = $_POST['concentracion'];
        $informacion = $_POST['informacion'];
        $forma_farmaceutica = $_POST['forma_farmaceutica'];
        $unidosis = $_POST['unidosis'];
        $dosis = $_POST['dosis'];  
    
       $nuevo = new Medicamento();
       $registro = $nuevo->editarMedicamento($db,$id, $codigo_med, $nombre, $concentracion, $informacion, $forma_farmaceutica, $unidosis, $dosis);
      

        if($registro){
            ?>
            <script type="text/javascript">
                alert('Modificacion exitosa');
                window.location="../../vista/Me/editar_me.php";
            </script>
            <?php
            exit;
        }
        else{
            echo "error";
        }
?>