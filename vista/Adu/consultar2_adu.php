<?php require_once '../../modelo/usuario.php';  ?>
<?php require_once '../../modelo/conexion.php'; ?>
<?php  
                if(isset($_GET['id'])){
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
    <div class="container col-6 bg-">
        <div class="col-12"></div>  
            <div class="formulario" style="margin-top: 100px;"><center>
                <h2>Consulta de usuario</h2></center>
                    <form class="text-center border border-light p-5" action="" id="usuario" onsubmit="return validar(event)" method="POST">
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="form-label " for="nombre">Nombre</label>
                                <input class="form-control" autocomplete="off" value="<?php echo $consulta['nombre']; ?>" style="margin-right: 10px;" type="text" name="nombre" id="nombre" placeholder="Nombre" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label " for="apellido">Apellido</label>
                                <input class="form-control" autocomplete="off" value="<?php echo $consulta['apellido']; ?>" type="text" name="apellido" id="apellido" placeholder="Apellido" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="cedula" class="form-label">Cedula</label>
                                <input class="form-control" autocomplete="off" value="<?php echo $consulta['cedula']; ?>" type="number" name="cedula" id="cedula" placeholder="Cedula" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="nom_usuario" class="form-label">Nombre de usuario</label>
                                <input class="form-control" autocomplete="off" value="<?php echo $consulta['nom_user']; ?>" type="text" name="usuario" id="usuario" placeholder="Nombre de usuario" readonly> 
                            </div>
                            <div class="form-group col-6">
                                <label for="contraseña" class="form-label">Contraseña</label>
                                <input class="form-control" autocomplete="off" value="<?php echo $consulta['contrasenna']; ?>"  type="text" name="password" id="password" placeholder="Contraseña" readonly> 
                            </div>
                            <div class="form-group col-6">
                                <label for="perfil" class="form-label">Perfil</label>
                                <input class="form-control col-6" type="text" name="perfil" value="<?php echo $consulta['cargo']; ?>" readonly> 
                            </div>
                        </div>
                            <button id="back" class="btn btn-info" onClick="history.go(-1);" style="margin: 0 auto;" type="button">Volver</button>
                </form>
            </div>
        </div>
    </div>
<?php include "../include/footer.php";?>

