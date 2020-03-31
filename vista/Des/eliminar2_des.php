<?php require_once '../../modelo/despacho.php';  ?>
<?php require_once '../../modelo/conexion.php'; ?>
<?php  $id_despacho = $_POST['id_despacho'];
       $nuevo = new Despacho();
       $consulta = $nuevo->consultarUsuario($db, $id_despacho);
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
            <form action="../../controlador/des/con_eliminar_des.php" method="POST">
                <?php foreach($consulta as $row) {  ?>
                    <b>id_despacho:</b>
                       <input type="text" name="id_despacho" value="<?php echo $consulta['id_despacho']; ?>" placeholder="Nombre" readonly>  
                    <b>fecha_despacho:</b>
                        <input type="text" name="fecha_despacho" value="<?php echo $consulta['fecha_despacho']; ?>" placeholder="Usuario" readonly>
                    <b>id_pedido:</b>
                        <input type="text" name="id_pedido" value="<?php echo $consulta['id_pedido']; ?>" placeholder="Cedula" readonly>
                    <b>id_factura:</b>
                        <input type="text" name="id_factura" value="<?php echo $consulta['id_factura']; ?>" placeholder="Usuario" readonly> 
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