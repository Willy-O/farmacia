<?php require_once '../../modelo/medicamento.php';  ?>
<?php require_once '../../modelo/conexion.php'; ?>
<?php  
                if(isset($_POST['codigo_med'])){
                    $codigo_med = $_POST['codigo_med'];
                    $nuevo = new Medicamento();
                    $consulta = $nuevo->consultarMedicamento($db, $codigo_med);
                }else{
                    $codigo_med = $_GET['codigo_med'];
                    $nuevo = new Medicamento();
                    $consulta = $nuevo->consultarMedicamento($db, $codigo_med);
                }
?>
<?php include "../include/header.php";?>
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
    <div class="container col-6 bg-">
        <div class="col-12"></div>  
            <div class="formulario" style="margin-top: 100px;"><center>
                <h2>Consultar medicamento</h2></center>
                    <form class="text-center border border-light p-5" action="" id="usuario" onsubmit="return validar(event)" method="POST">
                    <div class="row">
                            <div class="form-group col-6">
                                <label class="form-label " for="codigo">Codigo</label>
                                <input class="form-control" autocomplete="off" type="text" value="<?php echo $consulta['codigo_med']; ?>" name="codigo_med" id="codigo_med" placeholder="Codigo del medicamento" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label " for="nombre">Nombre</label>
                                <input class="form-control" autocomplete="off" type="text" value="<?php echo $consulta['nombre']; ?>" name="nombre" id="nombre" placeholder="Nombre" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label " for="Concentracion">Concentracion</label>
                                <input class="form-control" autocomplete="off" type="number" value="<?php echo $consulta['concentracion']; ?>" name="concentracion" id="concentracion" placeholder="Concentracion" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label " for="Medida">Medida</label>
                                <input class="form-control" autocomplete="off" type="text" value="<?php echo $consulta['dosis']; ?>" name="dosis" id="dosis" placeholder="Medida" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label " for="Forma farmaceutica">Forma farmaceutica</label>
                                <input class="form-control" autocomplete="off" type="text" value="<?php echo $consulta['forma_farmaceutica']; ?>" name="forma_farmaceutica" id="forma_farmaceutica" placeholder="Forma farmaceutica" readonly>
                            </div>
                            <fieldset class="form-group col-6">
                                    <legend class="col-form-label col-sm-2 pt-0">Unidosis</legend>
                                    <label class="col-form-label col-1" name="unidosis"><?php if($consulta['unidosis'] = true)
                                                                                                {  echo "Si";
                                                                                                        }else{
                                                                                                        echo "No"; }?></label> 
                            </fieldset>
    <!--                         <div class="form-group row">
                            <input class="form-control col-6" type="text" name="indice_atc" id="indice_atc" placeholder="Indice atc" readonly>  
                            </div>  -->
                            <div class="form-group">
                                <label class="col-form-label" for="gridRadios1">Información:</label>
                            </div>
                            <div class="form-group">
                                <textarea rows="3" cols="80" name="informacion" placeholder="Informacion ... (campo no obligatorio)"></textarea>
                            </div>
                                         
                        </div>
                    <button type="button" class="btn btn-info" value="Registrar"  onClick="history.go(-1);" name="registrar">Volver</button>
                </form>
            </div>
        </div>
    </div>
<?php include "../include/footer.php";?>