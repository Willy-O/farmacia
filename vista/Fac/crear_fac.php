<?php include "../include/header.php"; ?>
<?php
if ($_SESSION['cargo'] == 'administrador') {
    include "../include/menu_administrador.php";
}
if ($_SESSION['cargo'] == 'farmaceuta') {
    include "../include/menu_farmaceuta.php";
}
if ($_SESSION['cargo'] == 'auxiliar') {
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
    <div class="formulario" style="margin-top: 100px;">
        <center>
            <h2>Registrar factura</h2>
        </center>
        <form style="margin-top: 50px;" method="POST" id="form">
            <div class="row">
                <div class="form-group col-4">
                    <label class="form-label " for="fecha">Número de factura</label>
                    <input class="form-control" autocomplete="off" style="margin-right: 10px;" type="text" name="num_factura" id="num_factura" placeholder="Número de factura" required>
                </div>
                <div class="form-group col-4">
                    <label class="form-label " for="fecha">Proveedor</label>
                    <input class="form-control" autocomplete="off" type="text" name="proveedor" id="proveedor" placeholder="Proveedor" required>
                </div>
                <div class="form-group col-4">
                    <label class="form-label " for="fecha">Fecha de factura</label>
                    <input class="form-control" type="date" name="fecha_factura">
                </div>
                <div class="form-group col-12">
                    <label class="form-label" for="gridRadios1">Comentario:</label>
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
                        for ($i = 0; $i < count($consulta); $i++) {
                            ?>
                            <option value="<?php echo $consulta[$i]['codigo_med'] ?>"><?php echo $consulta[$i]['nombre'] . ' ' . $consulta[$i]['concentracion'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-3" style="margin-top: 30px">
                    <button class="btn btn-info" onclick="llenartabla();" type="button">Agregar</button>
                </div>
            </div>
            <table id="tabla" class="table table-bordered">
                <thead>
                    <tr>
                        <td>Codigo</td>
                        <td>Nombre</td>
                        <td>Concentración</td>
                        <td>Medida</td>
                        <td>Forma farmaceutica</td>
                        <td>Fecha de vencimiento</td>
                        <td>Cantidad</td>
                        <td>Precio unitario</td>
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
        var dato = $('#codigo_med').val();
        $.ajax({
            url: '../../controlador/fac/json_fac.php?dato=' + dato,
        }).done(function(c) {
            if (c != '') {
                c = JSON.parse(c);
                if (typeof $('table').find('[data-med="' + c.id + '"]')[0] === 'undefined') {
                    var fila = $('#tc').html();
                    $('#tc').html(fila + c.table);
                } else {
                    alert('No puede agregar el mismo medicamento');
                }
            } else {
                alert('El medicamento no esta registrado');
            }
        });
    }

    function enviardatos() {
        $.ajax({
            url: '../../controlador/fac/con_crear_fac.php',
            data: $('#form').serialize(),
            type: 'POST',
        }).done(function(res) {
            console.log(res)
            if (res == '1') {
                alert('Error al registrar factura');
            } else if (res == '2') {
                alert('Error al registrar en el anquel');
            } else if (res == '3') {
                alert('Error al registrar en el inventario');
            } else if (res == '4') {
                alert('Faltan datos por ingresar');
            } else {
                alert('Registro exitoso');
            }
        });
    }
    // var contenido_fila = document.querySelectorAll('tbody td:nth-child(9)');
    var tabla = document.getElementById('tabla')
    tabla.addEventListener('click', e => {
        var t = e.target,
            btnDelete = Array.from(tabla.querySelectorAll('.btnDelete'));
        // i = indexOf(t);
        console.log(btnDelete.value);
    })

    function deleteRow() {
        $(".btnDelete").click(function(event) {
            alert($(this).closest('.element').find('.btnDelete').text());
        });
    }
    $(document).ready(function() {
        $('#codigo_med').select2();
    });
</script>
<?php include "../include/footer.php"; ?>