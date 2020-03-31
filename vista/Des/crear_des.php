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
<?php
    require_once('../../modelo/conexion.php');
    require_once('../../modelo/medicamento.php');
?>
<link rel="stylesheet" type="text/css" href="../../recursos/css/estilos_tabla.css">
<link rel="stylesheet" href="../../recursos/css/estilos_ocultar.css" crossorigin="anonymous"> 
    <div class="container col-11 bg-">
        <div class="col-12"></div>
            <div class="formulario" style="margin-top: 100px;"><center>
                <h2>Registrar despacho</h2></center>
                    <form style="margin-top: 50px;" method="POST" id="form">
                        <div class="row">
                            <div class="form-group col-4">
                                <label class="form-label " for="Cedula_ben">Cedula del beneficiario</label>
                                <input class="form-control"  autocomplete="off" style="margin-right: 10px;" type="number" name="ced_ase_despacho" id="beneficiario" placeholder="cedula del beneficiario" required>
                            </div>
                            <div class="form-group col-2">
                                <button type="button" class="btn btn-info" id="shear_ben" onclick="consultarAsegurado();" style="margin-top: 30px;">Consultar</button>
                            </div>
                            <div class="form-group col-4">
                                <label class="form-label " for="fecha">Fecha de despacho</label>
                                <input class="form-control" type="date" name="fecha_despacho" id="fecha_despacho" required>
                            </div>
                            <div id="re_ben" class="form-group col-12">
                            </div>                            
                            <div class="form-group col-12">
                                <label class="form-label" for="Observacion">Observacion:</label>
                                <textarea rows="3" class="form-control" name="comentario" placeholder="Informacion adicional... (campo no obligatorio)"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-3 offset-3">
                                <label class="form-label">Agregar medicamento</label>
                                <select id="codigo_med" name="codigo_med">
                                    <option disabled="" selected="">Seleccione un Medicamento</option>
                                    <?php 
                                        $select = new Medicamento();
                                        $consulta = $select->jsonMedicamentosSelect($db);
                                        print_r($consulta);
                                        for ($i=0; $i < count($consulta); $i++) { 
                                            ?>
                                            <option value="<?php echo $consulta[$i]['codigo_med'] ?>"><?php echo $consulta[$i]['nombre'].' '.$consulta[$i]['concentracion'] ?> </option>
                                            <?php 
                                        }
                                     ?>
                                </select>
                            </div>
                            <div class="col-3" style="margin-top: 30px">
                                <button class="btn btn-info" onclick="llenartabla();" type="button">Agregar</button>
                                <button class="btn btn-info" type="button">Eliminar</button>
                            </div>
                        </div>
                        <table id="tabla" class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Codigo</td>
                                    <td>Nombre</td>
                                    <td>Unidosis</td>
                                    <td>Forma farmaceutica</td>
                                    <td>Presentacion</td>
                                    <td>Concentracion</td>
                                    <td>Precio unitario</td>
                                    <td>Cantidad</td>
                                </tr>
                            </thead>
                            <tbody id="tc"></tbody>
                        </table>
                        </div> 
                        <center><br>
                        <button id="register " class="btn btn-info col-2" onclick="enviardatos();" style="margin-right: 10px;" type="button">Registrar</button>
                        </center>
                    </form>
            </div>
        </div>
    </div>
    <script>
        function llenartabla() {
            var dato=$('#codigo_med').val();    
            $.ajax({
                url: '../../controlador/des/json_des.php?dato='+dato,
            }).done(function(c){
                    if (c!='') {
                        c = JSON.parse(c);
                        if(typeof $('table').find('[data-med="'+c.id+'"]')[0]==='undefined'){
                            var fila=$('#tc').html();
                            $('#tc').html(fila+c.table);
                    }else{
                        alert('No puede agregar el mismo medicamento');
                    }
                }else{
                    alert('El medicamento no esta registrado')
                    }
            });
        }
        function enviardatos() {
            // var poliza = document.getElementById('poliza').value;
            $.ajax({
                    url: '../../controlador/des/con_crear_des.php',
                    data:$('#form').serialize(),
                    type:'POST',
                }).done(function(res){
                    console.log(res)
                    if(res == '1'){
                        alert('Error al registrar factura');
                    }else if(res == '2'){
                            alert('Error al registrar en el inventario');
                        }else if(res == '3'){
                                alert('Faltan datos por ingresar');
                            }else if(res == '4'){
                                    alert('El beneficiario no cuenta con suficiente poliza');
                    }else{
                    alert('Registro exitoso');
                    }
            });
        }
        function consultarAsegurado() {
                var ben = $('#beneficiario').val();    
            $.ajax({
                // data: ben,
                url: '../../controlador/des/con_beneficiario_des.php?ben='+ben,
                beforeSend:function(){
                    $("#re_ben").html("Procesando, espere por favor...");
                }
            }).done(function(data){
                if(data==="false"){
                    alert("La cedula ingresada no está registrada");
                    $("#re_ben").html("La cedula ingresada no está registrada");
                }else{
                    if(data==="error"){
                        alert("Debe ingresar una cedula");
                    }else{
                        $('#re_ben').html(data);
                    }
                }
            });
        }
        $(document).ready(function() {
            $('#codigo_med').select2();
        });
    </script>
<?php include "../include/footer.php";?>