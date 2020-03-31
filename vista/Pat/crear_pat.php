<?php include "../include/header.php";?>
<?php include "../include/menu_administrador.php";?>
    <div class="container col-6 bg-">
        <div class="col-12"></div>
            <div class="formulario" style="margin-top: 100px;"><center>
                <h2>Registrar patología</h2></center>
                    <form action="../../controlador/pat/con_crear_pat.php" style="margin-top: 50px;" method="POST">
                        <div class="form-group row">
                            <input class="form-control col-12" type="text" name="id_patologia" id="id_patologia" placeholder="Id patología" required>  
                        </div>
                        <div class="form-group row">
                            <input class="form-control col-12" type="text" name="nom_enfermedad" id="nom_enfermedad" placeholder="Nombre de enfermedad" required>  
                        </div> 
                        <div class="form-group row">
                            <select class="form-control col 6" id="select">
                                <option value="0">Tipo de enfermedad</option>
                                <option value="Venerias">Venerias</option>
                                <option value="mentales">Mentales</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <input class="form-control col-12" type="text" name="id_med_patologia" id="id_med_patologia" placeholder="Id del medicamento asociado" required>  
                        </div>
                        <br><input type="submit" class="btn btn-info" value="registrar" onclick="validar()" name="registrar">  
                    </form>
                <script language="JavaScript" src="../../recursos/js/valida_formularios.js"></script>
            </div>
        </div>
    </div>
<?php include "../include/footer.php";?>