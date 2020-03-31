<?php require_once '../../modelo/usuario.php';  ?>
<?php require_once '../../modelo/conexion.php'; ?>
<?php  $cedula = $_POST['cedula'];
       $nuevo = new Usuario();
       $consulta = $nuevo->consultarUsuario($db, $cedula);
?>
<?php include "../include/header.php";?>
<?php include "../include/menu_administrador.php";?>
    <div class="container col-6 bg-">
        <div class="col-12"></div>
            <div class="formulario" style="margin-top: 100px;"><center>
                <h2>Registrar familiar</h2></center>
                <form action="../../controlador/des/con_crear_des.php" style="margin-top: 50px;" method="POST">
                    <?php foreach($consulta as $row) {     ?>
                        <div class="form-group row">
                            <input class="form-control col-6" type="text" name="nombre" id="nombre" placeholder="Nombre" required>  
                            <input class="form-control col-6" type="text" name="apellido" id="apellido" placeholder="Apellido" required>
                        </div>
                        <div class="form-group row">
                            <input class="form-control col-6" type="text" name="cedula" id="cedula" placeholder="Cedula" required>  
                            <input class="form-control col-6" type="text" name="parentesco" id="parentesco" placeholder="Parentesco" required>
                        </div>
                        <div class="form-group row">
                            <textarea rows="3" cols="100" name="direccion" placeholder="Direccion ... (campo no obligatorio)"></textarea>
                        </div>
                        <div class="form-group row">
                            <input class="form-control col-6" type="text" name="ced_use_familia" id="ced_use_familiar" placeholder="Cedula de asegurado" required>                          
                        </div>
                        <center><input type="submit" class="btn btn-info" value="registrar" onclick="validar()" name="registrar"></center>
                            <?php unset($consulta); 
                exit;  }
                        ?> 
                       
                </form>
            </div>
        </div>
    </div>
<?php include "../include/footer.php";?>