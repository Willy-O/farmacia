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
<link rel="stylesheet" href="../../recursos/css/estilos_estadisticas.css" crossorigin="anonymous"> 
    <div class="container">
        <h2 class="formulario" style="margin-top: 100px; " ><center>
            <h2>Seleccione la estadística que desea realizar</h2>
        </center></h2>
    <div class="form-group">
        <label for="select">Opciones</label>
            <select class="form-control" id="select">
                <option value="">Seleccione una opcion</option>
                <option value="opc1">Periodo de fechas de vencimiento de medicamentos</option>
                <option value="opc2">Periodo de fechas de despachos</option>
                <option value="opc3">Cantidad de pacientes por estatus</option>
                <option value="opc4">Cantidad de pacientes por entes</option>
            </select>
    </div>
    <form id="opc1" action="../../controlador/estadisticas/con_estadisticas_mfv.php" method="POST">
        <div class="form-row">
            <div class="form-group col-4 ">
                    <b class="">Desde</b>
                    <input class="form-control" type="date" name="fechaMA">
            </div>
            <div class="form-group col-4">
                    <b class="">Hasta</b>
                    <input class="form-control" type="date" name="fechaMB"> 
            </div>
        </div>
        <input type="submit" class="btn btn-info" value="Generar estadística" name="fechaVen"> 
    </form>
    <form id="opc2" action="../../controlador/estadisticas/con_estadisticas_fd.php" method="POST">
        <div class="form-row">
            <div class="form-group col-4 ">
                    <b class="">Fecha inicio</b>
                    <input class="form-control" type="date" name="fechaA">
            </div>
            <div class="form-group col-4">
                    <b class="">Fecha cierre</b>
                    <input class="form-control" type="date" name="fechaB"> 
            </div>
        </div>
        <input type="submit" class="btn btn-info" value="Generar estadística" name="fechaDes"> 
    </form>

    <form id="opc3" action="../../controlador/estadisticas/con_estadisticas_aps.php" method="POST">
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Tipo de grafico</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="grafico" id="pie" value="pie" checked>
                                <label class="form-check-label" for="gridRadios1">Grafico de torta</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="grafico"  id="pyramid" value="pyramid">
                                <label class="form-check-label" for="gridRadios2">Grafico de piramide</label>
                            </div>
                        </div>
                </div>
            </fieldset>
            <input type="submit" class="btn btn-info" value="Generar estadística" name="status">            
    </form>

    <form id="opc4" action="../../controlador/estadisticas/con_estadisticas_ape.php" method="POST">
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Tipo de grafico</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="grafico" id="pie" value="pie" checked>
                                <label class="form-check-label" for="gridRadios1">Grafico de torta</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="grafico"  id="pyramid" value="pyramid">
                                <label class="form-check-label" for="gridRadios2">Grafico de piramide</label>
                            </div>
                        </div>
                </div>
            </fieldset>
                <input type="submit" class="btn btn-info" value="Generar estadística" name="aseguraEnte">
    </form>
    </div> 
    <script type="text/javascript">
        document.querySelector("#select").addEventListener("change", function(){
        if (this.value.length){
        if (document.querySelector(".visible")){
            document.querySelector(".visible").className = "";
        }
                document.querySelector("#" + this.value).className = "visible";
            }
        }, false);
    </script>
<?php include "../include/footer.php";?>