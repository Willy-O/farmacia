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
                <h2>Registrar ente</h2></center>
                    <form action="../../controlador/en/con_crear_en.php" style="margin-top: 50px;" method="POST">
                        <div class="form-group row">
                            <input class="form-control col-6" type="text" name="rif_ente" id="rif_ente" placeholder="RIF del ente" required>
                        </div> 
                        <div class="form-group row">
                            <input class="form-control col-12" type="text" name="nom_ente" id="nom_ente" placeholder="Nombre del ente" required>  
                        </div>
                        <br><input type="submit" class="btn btn-info" value="registrar" onclick="validar()" name="registrar">  
                    </form>
                <script language="JavaScript" src="../../recursos/js/valida_formularios.js"></script>
            </div>
        </div>
    </div>
<?php include "../include/footer.php";?>