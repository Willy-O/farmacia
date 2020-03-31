<?php require_once '../../pedido.php';  ?>
<?php require_once '../../modelo/conexion.php'; ?>
<?php  
        if(isset($_GET['id'])){
            $id_pedido = $_GET['id'];
            $nuevo = new Pedido();
            $consulta = $nuevo->consultarPedido($db, $id_pedido);
        }else{
            $id_despacho = $_POST['id_despacho'];
            $nuevo = new Pedido();
            $consulta = $nuevo->consultarPedido($db, $id_pedido);
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
            <form action="../../controlador/ped/con_eliminar_ped.php" method="POST">
                <?php foreach($consulta as $row) {//while($row = $consulta->fetch_assoc()){      while($row = $consulta->fetch(PDO::FETCH_ASSOC)){ //  ?>
                    <b>Nombre:</b>
                       <input type="text" name="id_pedido" value="<?php echo $consulta['id_pedido']; ?>" placeholder="Nombre" readonly>  
                    <b>Apellido:</b>
                        <input type="text" name="fecha_pedido" value="<?php echo $consulta['fecha_pedido']; ?>" placeholder="Usuario" readonly>
                    <b>Cedula:</b>
                        <input type="text" name="cedula_ase" value="<?php echo $consulta['cedula_ase']; ?>" placeholder="Cedula" readonly>
                    <b>Usuario:</b>
                        <input type="text" name="id_med" value="<?php echo $consulta['id_med']; ?>" placeholder="Usuario" readonly> 
                    <b>Contraseña:</b>
                        <input type="text" name="cedula_fam" value="<?php echo $consulta['cedula_fam']; ?>"  placeholder="Contraseña" readonly> 
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