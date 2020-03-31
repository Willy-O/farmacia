<?php require_once '../../modelo/patologia.php';  ?>
<?php require_once '../../modelo/conexion.php'; ?>
<?php  $id_patologia = $_POST['id_patologia'];
       $nuevo = new Patologia();
       $consulta = $nuevo->consultarPatologia($db, $id_patologia);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar usuario</title>
</head>
<body>
    <div class="contenedor-form">
        <div class="formulario"><center>
            <h2>Crear usuario</h2></center>
                <?php foreach($consulta as $row) { ?>
                    <b>id_patologia:</b>
                       <input type="text" name="id_patologia" value="<?php echo $consulta['id_patologia']; ?>" placeholder="Nombre" readonly>  
                    <b>tipo_enfermedad:</b>
                        <input type="text" name="tipo_enfermedad" value="<?php echo $consulta['tipo_enfermedad']; ?>" placeholder="Usuario" readonly>
                    <b>tiempo:</b>
                        <input type="text" name="tiempo" value="<?php echo $consulta['tiempo']; ?>" placeholder="Cedula" readonly>
                    <b>promedio_med:</b>
                        <input type="text" name="promedio_med" value="<?php echo $consulta['promedio_med']; ?>" placeholder="Usuario" readonly> 
                    <b>nom_enfermedad:</b>
                        <input type="text" name="nom_enfermedad" value="<?php echo $consulta['nom_enfermedad']; ?>"  placeholder="Contraseña" readonly> 
                    <b>id_med</b>
                        <input type="text" name="id_med" value="<?php echo $consulta['id_med']; ?>" placeholder="Nombre" readonly>  
                   <br><input type="button" value="Volver" onClick="history.go(-1);">  
                    <?php unset($consulta); 
              exit;  }
                     ?>
                        


                </form>
        </div>
    </div>
</body>
</html>