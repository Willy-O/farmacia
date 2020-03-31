<?php require '../../modelo/asegurado.php';  ?>
<?php require '../../modelo/conexion.php'; ?>
<?php require '../../modelo/entes.php'; ?>
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
                <h2>Modificar datos del paciente</h2></center>
                <form class="text-center border border-light p-5" action="../../controlador/ase/con_editar_ase.php" method="POST">
                <div class="row">
                            <div class="form-group col-6">
                                <label class="form-label " for="nombre">Nombre</label>
                                <input class="form-control" autocomplete="off" value="<?php echo $consulta['nombre']; ?>" style="margin-right: 10px;" type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label " for="apellido">Apellido</label>
                                <input class="form-control"  autocomplete="off" value="<?php echo $consulta['apellido']; ?>"  type="text" name="apellido" id="apellido" placeholder="Apellido" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="cedula" class="form-label">Cedula</label>
                                <input class="form-control" autocomplete="off" type="number" value="<?php echo $consulta['cedula']; ?>" name="cedula" id="cedula" placeholder="Cedula" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="nom_usuario" class="form-label">Número de habitación</label>
                                <input class="form-control" autocomplete="off" value="<?php echo $consulta['numero_habitacion']; ?>"  type="number" name="numero_habitacion" id="numero_habitacion" placeholder="Número de habitación" required> 
                            </div>
                            <div class="form-group col-6">
                                <label for="nom_usuario" class="form-label">Número celular</label>
                                <input class="form-control"  autocomplete="off" value="<?php echo $consulta['numero_celular']; ?>" type="number" name="numero_celular" id="numero_celular" placeholder="Número celular" required> 
                            </div>
                            <div class="form-group col-6 ">
                                <label class="form-label">Ente al que pertenece</label>
                                <select require="" class="form-control" id="rif" name="rif">
                                    <option autocomplete="off" value="<?php echo $consulta['rif_ente']; ?>" selected=""><?php echo $consulta['nombre_ente']; ?></option>
                                    <?php 
                                        $select = new Ente();
                                        $con = $select->jsonEntesSelect($db);
                                        print_r($con);
                                        for ($i=0; $i < count($con); $i++) { 
                                            ?>
                                            <option value="<?php echo $con[$i]['rif'] ?>"><?php echo $con[$i]['nombre']?> </option>
                                            <?php 
                                        }
                                     ?>
                                </select>                            
                            </div>                            
                            <div class="form-group col-6">
                                <label for="statu" class="form-label">Statu</label>
                                <select required="" class="form-control" name="statu" id="statu">
                                    <option value="<?php if($consulta['statu'] == true){
                                                                                echo true;
                                                                            }else{
                                                                                echo false;
                                                                            } ?>" selected="">
                                                                            <?php if($consulta['statu'] == true){
                                                                                echo 'Activo';
                                                                            }else{
                                                                                echo 'Jubilado';
                                                                            } ?>
                                    </option>
                                    <option value="true">Activo</option>
                                    <option value="false">Jubilado</option>
                                </select>                     
                            </div>
                            <div class="form-group col-6 ">
                                <label class="form-label">Poliza</label>
                                <input class="form-control" value="<?php echo $consulta['poliza']; ?>" type="number" name="poliza" id="poliza" required> 
                            </div>
                            <div class="form-group col-12">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input class="form-control"  autocomplete="off" value="<?php echo $consulta['direccion']; ?>" type="text" name="direccion" id="direccion" placeholder="direccion" required> 
                            </div>
                            <input value="<?php echo $consulta['iden']; ?>" type="hidden" name="iden" id="iden"> 
                        </div>
                        <button id="back" class="btn btn-info" style="margin: 0 auto;" type="submit">Editar</button>
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
