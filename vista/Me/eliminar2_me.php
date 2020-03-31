<?php require_once '../../modelo/medicamento.php';  ?>
<?php require_once '../../modelo/conexion.php'; ?>
<?php  $id_med = $_POST['id_med'];
       $nuevo = new Medicamento();
       $consulta = $nuevo->consultarMedicamento($db, $id_med);
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
        <h2>registrar medicamento</h2></center>
        <form action="../../controlador/me/con_eliminar_me.php" method="POST">
        <?php foreach($consulta as $row) {//while($row = $consulta->fetch_assoc()){      while($row = $consulta->fetch(PDO::FETCH_ASSOC)){ //  ?>
                     <b>Id:</b>
                        <input type="text" name="id_med" value="<?php echo $consulta['id_med']; ?>"  placeholder="Nombre"> 
                    <b>Nombre:</b>
                        <input type="text" name="nombre" value="<?php echo $consulta['nombre']; ?>" placeholder="Nombre">  
                    <b>Tipo:</b>
                        <input type="text" name="tipo" value="<?php echo $consulta['tipo']; ?>" placeholder="Tipo">
                    <b>Cantidad de miligramos:</b>
                        <input type="text" name="cant_mg" value="<?php echo $consulta['cant_mg']; ?>" placeholder="Cant_mg">
                    <b>Fecha recibido:</b>
                        <input type="text" name="fecha_ele" value="<?php echo $consulta['fecha_ele']; ?>" placeholder="Usuario"> 
                    <b>Fecha de vencimiento:</b>
                        <input type="text" name="fecha_ven" value="<?php echo $consulta['fecha_ven']; ?>" placeholder="Fecha de vencimiento"> 
                    <b>Informacion:</b>
                        <input type="text" name="informacion" value="<?php echo $consulta['informacion']; ?>" placeholder="Contraseña"> 
                    <b>Uso:</b>
                        <input type="text" name="uso" value="<?php echo $consulta['uso']; ?>" placeholder="Contraseña">
                    <b>Cantidad:</b>
                        <input type="text" name="cantidad" value="<?php echo $consulta['cantidad']; ?>" placeholder="Contraseña"> 
                    <b>Presentacion:</b>
                    <input type="text" name="presentacion" value="<?php echo $consulta['presentacion']; ?>" placeholder="Contraseña"> 
                    <input type="button" value="Volver" onClick="history.go(-1);">  
                    <input type="submit" value="Eliminar" name="eliminar">      
                    <?php unset($consulta); 
              exit;  }
                     ?>
                </form>
        </div>
    </div>
</body>
</html>