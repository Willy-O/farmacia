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
                <h2>Registrar medicamento</h2></center>
                    <form class="text-center border border-light p-5" action="../../controlador/me/con_crear_me.php" style="margin-top: px;" id="usuario" onsubmit="return validar(event)" method="POST">
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="form-label " for="codigo">Codigo</label>
                                <input class="form-control" autocomplete="off" type="text" name="codigo_med" id="codigo_med" placeholder="Codigo del medicamento" required>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label " for="nombre">Nombre</label>
                                <input class="form-control" autocomplete="off" type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                            </div>         
                            <div class="form-group col-6">
                                <label class="form-label " for="Forma farmaceutica">Forma farmaceutica</label>
                                <select class="form-control" name="forma_farmaceutica" id="select" required>
                                    <option disabled="" selected="" value="">Formas farmaceuticas</option>
                                    <option value="pastillas">Pastillas</option>
                                    <option value="jarabe">Jarabe</option>
                                    <option value="gotas">Gotas</option>
                                    <option value="ampollas">Ampollas</option>
                                    <option value="crema">Crema</option>
                                    <option value="supositorio">Supositorio</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label " for="Presentacion">Presentación</label>
                                <input class="form-control" autocomplete="off" type="text" name="presentacion" id="presentacion" placeholder="Presentacion" required>
                            </div>
                            <div class="form-group col-3">
                                <label class="form-label " for="Contenido">Contenido</label>
                                <input class="form-control" autocomplete="off" type="number" name="contenido" id="contenido" placeholder="Contenido" required>
                            </div>
                            <div class="form-group col-3">
                                <label class="form-label " for="Contenido">Concentracion</label>
                                <input class="form-control" autocomplete="off" type="number" name="concentracion" id="concentracion" placeholder="Concentracion" required>
                            </div>
                            <div class="form-group col-3">
                                <label class="form-label " for="Medida">Medida</label>
                                <select class="form-control col 6" name="dosis" id="select" required>
                                    <option disabled="" selected="" value="">Medida</option>
                                    <option value="miligramos">miligramos</option>
                                    <option value="mililitros">mililitros</option>
                                    <option value="microgramos">microgramos</option>
                                    <option value="gramos">gramos</option>
                                    <option value="miligramos/mililitros">miligramos/mililitros</option>
                                    <option value="mEI/ml">mEI/ml</option>
                                    <option value="U.I./ml">U.I./ml</option>
                                </select>
                            </div>
                            <fieldset class="form-group col-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Unidosis</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="unidosis" id="si" value="true">
                                                <label class="form-check-label" for="gridRadios1">Si</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="unidosis"  id="no" value="false">
                                                <label class="form-check-label" for="gridRadios2">No</label>
                                            </div>
                                        </div>
                            </fieldset>
    <!--                         <div class="form-group row">
                            <input class="form-control col-6" type="text" name="indice_atc" id="indice_atc" placeholder="Indice atc" required>  
                            </div>  -->
                            <div class="form-group col-12">
                                <label class="col-form-label" for="gridRadios1">Información:</label>
                            </div>
                            <div class="form-group col-12">
                                <textarea rows="3" cols="80" name="informacion" placeholder="Informacion ... (campo no obligatorio)"></textarea>
                            </div>
                                         
                    </div>
                    <button type="submit" class="btn btn-info" value="Registrar" name="registrar">Registrar</button>
                </form>
            </div>
        </div>
    </div>
<?php include "../include/footer.php";?>