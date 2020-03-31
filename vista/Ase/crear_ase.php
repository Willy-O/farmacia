<?php include "../include/header.php";?>
<?php include "../include/menu_administrador.php";?>
<?php
    require_once('../../modelo/conexion.php');
    require_once('../../modelo/entes.php');
?>
<link rel="stylesheet" href="../../recursos/css/estilos_ocultar.css" crossorigin="anonymous"> 
    <div class="container col-6 bg-">
        <div class="col-12"></div>  
            <div class="formulario" style="margin-top: 100px;"><center>
                <h2>Registrar paciente</h2></center>
                <form class="text-center border border-light p-5" action="../../controlador/ase/con_crear_ase.php" method="POST">
                <div class="row">
                            <div class="form-group col-6">
                                <label class="form-label " for="nombre">Nombre</label>
                                <input class="form-control" autocomplete="off" style="margin-right: 10px;" type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label " for="apellido">Apellido</label>
                                <input class="form-control" autocomplete="off"  type="text" name="apellido" id="apellido" placeholder="Apellido" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="cedula" class="form-label">Cedula</label>
                                <input class="form-control" autocomplete="off"  type="number" name="cedula" id="cedula" placeholder="Cedula" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="nom_usuario" class="form-label">Número de habitación</label>
                                <input class="form-control" autocomplete="off"  type="number" name="numero_habitacion" id="numero_habitacion" placeholder="Número de habitación" required> 
                            </div>
                            <div class="form-group col-6">
                                <label for="nom_usuario" class="form-label">Número celular</label>
                                <input class="form-control" autocomplete="off"  type="number" name="numero_celular" id="numero_celular" placeholder="Número celular" required> 
                            </div>
                            <div class="form-group col-6 ">
                                <label class="form-label">Ente al que pertenece</label>
                                <select require="" class="form-control" id="rif" name="rif">
                                    <option disabled="" selected="">Seleccione un ente</option>
                                    <?php 
                                        $select = new Ente();
                                        $consulta = $select->jsonEntesSelect($db);
                                        print_r($consulta);
                                        for ($i=0; $i < count($consulta); $i++) { 
                                            ?>
                                            <option value="<?php echo $consulta[$i]['rif'] ?>"><?php echo $consulta[$i]['nombre']?> </option>
                                            <?php 
                                        }
                                     ?>
                                </select>
                            </div>                            
                            <div class="form-group col-6">
                                <label for="statu" class="form-label">Statu</label>
                                <select required="" class="form-control" name="statu" id="statu">
                                    <option disabled="" selected="">Seleccionar</option>
                                    <option value="true">Activo</option>
                                    <option value="false">Jubilado</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="nom_usuario" class="form-label">Dirección</label>
                                <textarea rows="3" cols="40" name="direccion" placeholder="Direccion"></textarea>
                            </div>
                        </div>
                    <br><input type="submit" class="btn btn-info" value="registrar" onclick="validar()" name="registrar">
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


