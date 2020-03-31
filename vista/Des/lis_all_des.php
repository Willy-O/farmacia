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
<?php require_once('../../controlador/des/con_listar_des.php'); ?>
    <link rel="stylesheet" type="text/css" href="../../recursos/css/estilos_listar.css">
    <script src="../../recursos/js/fontawesome-all.js"></script>
    <script src="../../recursos/js/all.js"></script>
    <form id="listado"  action="lis_des.php" method="post"> 
    <div class="container">
            <div class="row">
                <div class="fixed-left buscador" style="margin-top: 100px;">
                    <div class="col-12">
                        <h5>Bucar despacho por fecha</h5>
                        <h2>Fecha de despacho:</h2>
                                <input type="date" class="btn btn-outline-primary" name="id_despacho" placeholder="Id despacho" require>
                                <br><button type="submit" style="margin-top: 15px; aling: center;" class="btn btn-primary" value="Consultar" name="Consultar">Consultar</button>
                    </div>
                </div>

                    <div class="col-8">
                        <div class="listar" style="margin-top: 100px;">
                            <h1>Despacho</h1>
                            <table style="max-height: 100%; max-width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Nombre medicamento</th>
                                        <th>Cedula beneficiario</th>
                                        <th>Cantidad</th>
                                        <th>Fecha despacho</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php foreach($result as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['nombre']; ?></td>
                                        <td><?php echo $row['ced_ase_despacho']; ?></td>
                                        <td><?php echo $row['cantidad_despacho']; ?></td>
                                        <td><?php echo $row['fecha_despacho']; ?></td>
                                    </tr>
                            <?php } ?>	
                                </tbody>                            
                        </table>
                    </div>
                </div>
            </div>	
        </div>
        <div class="col-md-12 text-center">
                <ul class="pagination pagination-lg pager" id="developer_page"></ul>
        </div>
    </form>
<?php include "../include/footer.php";?>


