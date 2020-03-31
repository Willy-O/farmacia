<?php require_once '../../modelo/medicamento.php';  ?>
<?php require_once '../../modelo/conexion.php'; ?>
<?php  
        if(isset($_GET['codigo_med'])){
            $codigo_med = $_GET['codigo_med'];
            $nuevo = new Medicamento();
            $consulta = $nuevo->consultarMedicamento($db, $codigo_med);
            if ($consulta == null) {
               ?>
                    <script type="text/javascript">
                        alert('No se Encuentra el medicamento');
                        window.location="../../vista/Me/editar_me.php";
                    </script>
                <?php
            }
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
            <div class="formulario" action="" style="margin-top: 100px;"><center>
                <h2>Consultar medicamento</h2></center>
                    <form class="text-center border border-light p-5" action="../../controlador/me/con_editar_me.php" id="edit_med" onsubmit="return validar(event)" method="POST">
                        <input type="hidden" name="id" value="<?php echo $consulta['id']; ?>">
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="form-label " for="codigo">Codigo</label>
                                <input class="form-control" autocomplete="off" type="text" value="<?php echo $consulta['codigo_med']; ?>" name="codigo_med" id="codigo_med" placeholder="Codigo del medicamento" required>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label " for="nombre">Nombre</label>
                                <input class="form-control" autocomplete="off" type="text" value="<?php echo $consulta['nombre']; ?>" name="nombre" id="nombre" placeholder="Nombre" required>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label " for="Concentracion">Concentracion</label>
                                <input class="form-control" autocomplete="off" type="number" value="<?php echo $consulta['concentracion']; ?>" name="concentracion" id="concentracion" placeholder="Concentracion" required>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label " for="Medida">Medida</label>
                                <select class="form-control col 6" name="dosis" id="select">
                                    <option value="<?php echo $consulta['dosis']; ?>"><?php echo $consulta['dosis']; ?></option>
                                    <option value="miligramos">miligramos</option>
                                    <option value="mililitros">mililitros</option>
                                    <option value="microgramos">microgramos</option>
                                    <option value="gramos">gramos</option>
                                    <option value="miligramos/mililitros">miligramos/mililitros</option>
                                    <option value="mEI/ml">mEI/ml</option>
                                    <option value="U.I./ml">U.I./ml</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label " for="Forma farmaceutica">Forma farmaceutica</label>
                                <select class="form-control col 6" name="forma_farmaceutica" id="select">
                                    <option value="<?php echo $consulta['forma_farmaceutica']; ?>"><?php echo $consulta['forma_farmaceutica']; ?></option>
                                    <option value="pastillas">Pastillas</option>
                                    <option value="jarabe">Jarabe</option>
                                    <option value="gotas">Gotas</option>
                                    <option value="ampollas">Ampollas</option>
                                    <option value="crema">Crema</option>
                                    <option value="supositorio">Supositorio</option>
                                </select>
                            </div>
                            <fieldset class="form-group col-6">
                                    <legend class="col-form-label col-sm-2 pt-0">Unidosis</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="unidosis" id="si" value="true" checked>
                                            <label class="form-check-label" for="gridRadios1">Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="unidosis"  id="no" value="false" >
                                            <label class="form-check-label" for="gridRadios2">No</label>
                                        </div>
                                    </div>
                            </fieldset>
    <!--                         <div class="form-group row">
                            <input class="form-control col-6" type="text" name="indice_atc" id="indice_atc" placeholder="Indice atc" required>  
                            </div>  -->
                            <div class="form-group">
                                <label class="col-form-label" for="gridRadios1">Información:</label>
                            </div>
                            <div class="form-group">
                                <textarea rows="3" cols="80" name="informacion" placeholder="Informacion ... (campo no obligatorio)"></textarea>
                            </div>
                                         
                        </div>   
                         <button type="submit" class="btn btn-primary btn-block ">Editar</button>     
                         <a class="btn btn-primary btn-block" href="editar_me.php">Volver</a>     
                </form>
            </div>
        </div>
    </div>
<?php include "../include/footer.php";?>


