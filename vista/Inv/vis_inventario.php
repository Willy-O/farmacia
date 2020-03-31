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
<?php require_once('../../controlador/inv/con_inv.php'); ?>
    <link rel="stylesheet" type="text/css" href="../../recursos/css/estilos_listar.css">
    <script src="../../recursos/js/fontawesome-all.js"></script>
    <script src="../../recursos/js/all.js"></script>
    <form id="listado"  action="lis_me.php" method="post"> 
    <div class="container">
            <div class="row">
                    <div class="col-12">
                        <div class="listar" style="margin-top: 100px;">
                            <h1>Inventario</h1>
                            <table style="max-height: 100%; max-width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Codigo del medicamento</th>
                                        <th>Nombre del medicamento</th>
                                        <th>Cantidad de medicamento</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php foreach($result as $row) { ?>
                                <tr>
                                    <td><?php echo $row['codigo_med']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['cantidad']; ?></td>
                                </tr>	
                                </tbody>                            
                            <?php } ?>
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
