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
<?php include "../include/header.php";?>
<?php include "../include/menu_administrador.php";?>
    <div class="container col-6 bg-">
        <div class="col-12"></div>  
            <div class="formulario" style="margin-top: 100px;"><center>
                <h2>Registrar paciente</h2></center>
                <form class="text-center border border-light p-5" action="#" method="POST">
                <div class="row">
                            <div class="form-group col-6">
                                <label class="form-label " for="nombre">Nombre</label>
                                <input class="form-control" value="<?php echo $consulta['nombre']; ?>" style="margin-right: 10px;" type="text" name="nombre" id="nombre" placeholder="Nombre" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label " for="apellido">Apellido</label>
                                <input class="form-control" value="<?php echo $consulta['apellido']; ?>"  type="text" name="apellido" id="apellido" placeholder="Apellido" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="cedula" class="form-label">Cedula</label>
                                <input class="form-control" value="<?php echo $consulta['cedula']; ?>" name="cedula" id="cedula" placeholder="Cedula" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="nom_usuario" class="form-label">Número de habitación</label>
                                <input class="form-control" value="<?php echo $consulta['numero_habitacion']; ?>"  type="number" name="numero_habitacion" id="numero_habitacion" placeholder="Número de habitación" readonly> 
                            </div>
                            <div class="form-group col-6">
                                <label for="nom_usuario" class="form-label">Número celular</label>
                                <input class="form-control" value="<?php echo $consulta['numero_celular']; ?>" type="number" name="numero_celular" id="numero_celular" placeholder="Número celular" readonly> 
                            </div>
                            <div class="form-group col-6 ">
                                <label class="form-label">Ente al que pertenece</label>
                                <input class="form-control" value="<?php echo $consulta['nombre_ente']; ?>" type="text" name="nombre_ente" id="nombre_ente" placeholder="Ente" readonly> 
                            </div>                            
                            <div class="form-group col-6">
                                <label for="statu" class="form-label">Statu</label>
                                <input class="form-control" value="<?php if($consulta['statu'] == true){
                                                                                echo 'activo';
                                                                            }else{
                                                                                echo 'jubilado';
                                                                            } ?>" type="text" name="statu" id="statu" placeholder="Statu" readonly> 
                            </div>
                            <div class="form-group col-6 ">
                                <label class="form-label">Poliza</label>
                                <input class="form-control" value="<?php echo $consulta['poliza']; ?>" type="number" name="poliza" id="poliza" placeholder="Ente" readonly> 
                            </div>
                            <div class="form-group col-12">
                                <label for="nom_usuario" class="form-label">Dirección</label>
                                <input class="form-control" value="<?php echo $consulta['direccion']; ?>" type="text" name="direccion" id="direccion" placeholder="Direccion" readonly> 
                            </div>
                        </div>
                        <button id="back" class="btn btn-info" onClick="history.go(-1);" style="margin: 0 auto;" type="button">Volver</button>
                 </form>
                <script language="JavaScript" src="../../recursos/js/valida_formularios.js"></script>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#rif').select2();
        });
    </script>
<?php include "../include/footer.php";?>
