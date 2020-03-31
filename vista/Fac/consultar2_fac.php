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
<?php require_once '../../modelo/factura.php';  ?>
<?php require_once '../../modelo/conexion.php'; ?>
<?php
    $id = $_GET['id'];
    $factura = new Factura();
    $consulta = $factura->consultarAllFactura($db, $id);   
?>
<link rel="stylesheet" type="text/css" href="../../recursos/css/estilos_tabla.css">
    <div class="container col-11 bg-">
        <div class="col-12"></div>
            <div class="formulario" style="margin-top: 100px;"><center>
                <h2>Registrar factura</h2></center>
                    <form style="margin-top: 50px;" method="POST" id="form">
                        <div class="row">
                            <div class="form-group col-4">
                                <label class="form-label " for="fecha">Número de factura</label>
                                <input class="form-control" style="margin-right: 10px;" type="text" name="num_factura" value="<?php echo $consulta[0]["num_factura"]; ?>" id="num_factura" placeholder="Número de factura" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label class="form-label " for="fecha">Proveedor</label>
                                <input class="form-control" type="text" name="proveedor" id="proveedor" value="<?php echo $consulta[0]["proveedor"]; ?>" placeholder="Proveedor" readonly>
                            </div>                            
                            <div class="form-group col-4">
                                <label class="form-label " for="fecha">Fecha de factura</label>
                                <input class="form-control" type="date" value="<?php echo $consulta[0]["fecha_factura"]; ?>" name="date" readonly>
                            </div>
                            <div class="form-group col-12">
                                <label class="form-label" for="gridRadios1">Comentario:</label>
                                <input class="form-control" type="text" value="<?php echo $consulta[0]["informacion"]; ?>" name="info" readonly>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-3 offset-3">
                                <label class="form-label">Medicamentos</label>
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
                            <?php
                                foreach ($consulta as $rows) {
                                $total = $rows['cantidad_medicamento'] * $rows['precio_facturado'];
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $rows['codigo_med']; ?></td>
                                    <td><?php echo $rows['nombre']; ?></td>
                                    <td><?php echo $rows['concentracion']; ?></td>
                                    <td><?php echo $rows['dosis']; ?></td>
                                    <td><?php echo $rows['forma_farmaceutica']; ?></td>
                                    <td><?php echo $rows['fecha_vencimiento']; ?></td>
                                    <td><?php echo $rows['cantidad_medicamento']; ?></td>
                                    <td><?php echo $rows['precio_facturado']; ?></td>
                                </tr>
                            </tbody>
                            <?php
                                }
                            ?>
                        </table>
                        </div> 
                        <center><br>
                        <button id="register " class="btn btn-info col-2" onClick="history.go(-1);" type="button">Volver</button>
                        </center>
                    </form>
            </div>
        </div>
    </div>
<?php include "../include/footer.php";?>
