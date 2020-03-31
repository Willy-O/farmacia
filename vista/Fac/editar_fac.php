<?php require_once '../../modelo/pedido.php';  ?>
<?php require_once '../../modelo/conexion.php'; ?>
<?php  $id_pedido = $_POST['id_pedido'];
       $nuevo = new Pedido();
       $consulta = $nuevo->consultarPedido($db, $id_pedido);
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
        <form action="../../controlador/ped/con_editar_ped.php" method="POST">
    <div class="contenedor-form">
        <div class="formulario"><center>
            <h2>Crear usuario</h2></center>
                <?php foreach($consulta as $row) {//while($row = fetch_assoc($consulta)){       ?>
                    <b>Id pedido:</b>
                       <input type="text" name="id_pedido" value="<?php echo $consulta['id_pedido']; ?>" placeholder="Nombre" >  
                    <b>Fecha pedido:</b>
                        <input type="text" name="fecha_pedido" value="<?php echo $consulta['fecha_pedido']; ?>" placeholder="Usuario" >
                    <b>Cedula asegurado:</b>
                        <input type="text" name="cedula_ase" value="<?php echo $consulta['cedula_ase']; ?>" placeholder="Cedula" >
                    <b>Id medicamento:</b>
                        <input type="text" name="id_med" value="<?php echo $consulta['id_med']; ?>" placeholder="Usuario" > 
                    <b>Cadula familiar:</b>
                        <input type="text" name="cedula_fam" value="<?php echo $consulta['cedula_fam']; ?>"  placeholder="Contraseña" > 
                    <b>Distribuidor:</b>
                        <input type="text" name="distribuidor" value="<?php echo $consulta['distribuidor']; ?>"  placeholder="Contraseña" > 
                    <br><input type="button" value="Volver" onClick="history.go(-1);">  
                    <input type="submit" value="Actualizar" name="editar">    
                        <?php unset($consulta); 
              exit;  }
                     ?> 
                       
                </form>
        </div>
    </div>
</body>
</html>
