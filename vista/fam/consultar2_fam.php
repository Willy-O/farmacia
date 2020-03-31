<?php require_once '../../modelo/familia.php';  ?>
<?php require_once '../../modelo/conexion.php'; ?>
<?php  $cedula = $_POST['cedula'];
       $nuevo = new Familia();
       $consulta = $nuevo->consultarFamilia($db, $cedula);
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
                    <b>Nombre:</b>
                       <input type="text" name="nombre" value="<?php echo $consulta['nombre']; ?>" placeholder="Nombre" readonly>  
                    <b>Apellido:</b>
                        <input type="text" name="apellido" value="<?php echo $consulta['apellido']; ?>" placeholder="Usuario" readonly>
                    <b>Cedula:</b>
                        <input type="text" name="cedula" value="<?php echo $consulta['cedula']; ?>" placeholder="Cedula" readonly>
                    <b>num_seguro:</b>
                        <input type="text" name="num_seguro" value="<?php echo $consulta['num_seguro']; ?>" placeholder="Usuario" readonly> 
                    <b>id_patologia:</b>
                        <input type="text" name="id_patologia" value="<?php echo $consulta['id_patologia']; ?>"  placeholder="Contraseña" readonly> 
                    <b>parentesco</b>
                        <input type="text" name="parentesco" value="<?php echo $consulta['parentesco']; ?>" placeholder="Nombre" readonly>  
                    <b>direccion</b>
                        <input type="text" name="direccion" value="<?php echo $consulta['direccion']; ?>" placeholder="Nombre" readonly>  
                        <input type="text" name="direccion" placeholder="Usuario">                    
                        <br><input type="button" value="Volver" onClick="history.go(-1);">  
                </form>
        </div>
    </div>
</body>
</html>