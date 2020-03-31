<?php require_once '../../modelo/despacho.php';  ?>
<?php 
    if($_SESSION['cargo'] == 'administrador'){
        include "../include/menu_administrador.php";
    }
    if($_SESSION['cargo'] == 'farmaceuta'){
        include "../include/menu_farmaceuta.php";
    }
    if($_SESSION['cargo'] == 'auxiliar'){
        include "../include/menu_auxiliar.php";
    }
 ?>
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
        <form action="../../controlador/des/con_editar_des.php" method="POST">
    <div class="contenedor-form">
        <div class="formulario"><center>
            <h2>Crear usuario</h2></center>
                <?php foreach($consulta as $row) {     ?>
                    <b>id_despacho:</b>
                       <input type="text" name="id_despacho" value="<?php echo $consulta['id_despacho']; ?>" placeholder="Nombre" readonly>  
                    <b>fecha_despacho:</b>
                        <input type="text" name="fecha_despacho" value="<?php echo $consulta['fecha_despacho']; ?>" placeholder="Usuario" readonly>
                    <b>id_pedido:</b>
                        <input type="text" name="id_pedido" value="<?php echo $consulta['id_pedido']; ?>" placeholder="Cedula" readonly>
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
