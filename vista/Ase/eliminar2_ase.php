<?php require_once '../../modelo/asegurado.php';  ?>
<?php require_once '../../modelo/conexion.php'; ?>
<?php  
        if(isset($_GET['id'])){
            $cedula = $_GET['id'];
            $nuevo = new Asegurado();
            $consulta = $nuevo->consultarAsegurado($db, $cedula);
        }
        if(isset($_POST['cedula'])){
            $cedula = $_POST['cedula'];
            $nuevo = new Asegurado();
            $consulta = $nuevo->consultarAsegurado($db, $cedula);
            }
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
            <form action="../../controlador/ase/con_eliminar_ase.php" method="POST">
                <?php foreach($consulta as $row) {//while($row = $consulta->fetch_assoc()){      while($row = $consulta->fetch(PDO::FETCH_ASSOC)){ //  ?>
                <b>Nombre:</b>
                       <input type="text" name="nombre" value="<?php echo $consulta['nombre']; ?>" placeholder="Nombre" readonly>  
                    <b>Apellido:</b>
                        <input type="text" name="apellido" value="<?php echo $consulta['apellido']; ?>" placeholder="Usuario" readonly>
                    <b>Cedula:</b>
                        <input type="text" name="cedula" value="<?php echo $consulta['cedula']; ?>" placeholder="Cedula" readonly>
                    <b>Usuario:</b>
                        <input type="text" name="num_asegurado" value="<?php echo $consulta['num_asegurado']; ?>" placeholder="Usuario" readonly> 
                    <b>Contraseña:</b>
                        <input type="text" name="cant_familiares" value="<?php echo $consulta['cant_familiares']; ?>"  placeholder="Contraseña" readonly> 
                    <b>poliza:</b>
                        <input type="text" name="poliza" value="<?php echo $consulta['poliza']; ?>" placeholder="Usuario" readonly> 
                    <b>direccion:</b>
                        <input type="text" name="direccion" value="<?php echo $consulta['direccion']; ?>" placeholder="Usuario" readonly> 
                    <br><input type="button" value="Volver" onClick="history.go(-1);">  
                    <input type="submit" value="Eliminar" name="eliminar">  
                    <?php unset($consulta); 
              exit;  }
                     ?>
                </form>
        </div>
    </div>
</body>
</html>