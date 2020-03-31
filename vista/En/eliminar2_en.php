<?php require_once '../../modelo/entes.php';  ?>
<?php require_once '../../modelo/conexion.php'; ?>
<?php  $num_ente = $_POST['num_ente'];
       $nuevo = new Ente();
       $consulta = $nuevo->consultarEnte($db, $num_ente);
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
        <form action="../../controlador/en/con_eliminar_en.php" method="POST">
        <?php foreach($consulta as $row) {//while($row = $consulta->fetch_assoc()){      while($row = $consulta->fetch(PDO::FETCH_ASSOC)){ //  ?>
                 <b>num_ente:</b>
                        <input type="text" name="num_ente" value="<?php echo $consulta['num_ente']; ?>"  placeholder="Nombre" > 
                    <b>rif_ente:</b>
                        <input type="text" name="rif_ente" value="<?php echo $consulta['rif_ente']; ?>" placeholder="Nombre" >  
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