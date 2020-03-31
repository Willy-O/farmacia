<?php require_once '../../modelo/usuario.php';  ?>
<?php require_once '../../modelo/conexion.php'; ?>
<?php           if(isset($_GET['id'])){
                    $cedula = $_GET['id'];
                    $nuevo = new Usuario();
                    $consulta = $nuevo->consultarUsuario($db, $cedula);
                }
                if(isset($_POST['cedula'])){
                $cedula = $_POST['cedula'];
                $nuevo = new Usuario();
                $consulta = $nuevo->consultarUsuario($db, $cedula);
                }
?>
<?php include "../include/header.php";?>
<?php include "../include/menu_administrador.php";?>
    <div class="contenedor-form">
        <div class="formulario"><center>
            <h2>Crear usuario</h2></center>
            <form action="../../controlador/adu/con_eliminar_adu.php" method="POST">
                <?php foreach($consulta as $row) {//while($row = $consulta->fetch_assoc()){      while($row = $consulta->fetch(PDO::FETCH_ASSOC)){ //  ?>
                <b>Nombre:</b>
                       <input type="text" name="nombre" value="<?php echo $consulta['nombre']; ?>" placeholder="Nombre" readonly>  
                    <b>Apellido:</b>
                        <input type="text" name="apellido" value="<?php echo $consulta['apellido']; ?>" placeholder="Usuario" readonly>
                    <b>Cedula:</b>
                        <input type="text" name="cedula" value="<?php echo $consulta['cedula']; ?>" placeholder="Cedula" readonly>
                    <b>Usuario:</b>
                        <input type="text" name="usuario" value="<?php echo $consulta['name_u']; ?>" placeholder="Usuario" readonly> 
                    <b>Contraseña:</b>
                        <input type="text" name="password" value="<?php echo $consulta['pass']; ?>"  placeholder="Contraseña" readonly> 
                    <b>Perfil</b>
                        <input type="text" name="perfil" value="<?php echo $consulta['perfil']; ?>" placeholder="Nombre" readonly>  
                    <br><input type="button" value="Volver" onClick="history.go(-1);">  
                    <input type="submit" value="Eliminar" name="eliminar">  
                    <?php unset($consulta); 
              exit;  }
                     ?>
                </form>
        </div>
    </div>
<?php include "../include/footer.php";?>