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
<?php include "../include/header.php";?>
<?php include "../include/menu_administrador.php";?>
<?php include_once('../../modelo/factura.php');  ?>
<?php require_once('../../modelo/conexion.php'); ?>
<?php  
    $num_factura = $_POST['num_factura'];
    $nuevo = new Factura();
    $consulta = $nuevo->consultarFactura($db, $num_factura);
    if($num_factura != $consulta['num_factura']){
        ?>
            <script type="text/javascript">
                alert('El número de factura ingresado no está registrado');
                window.location="lis_all_fac.php";
            </script>
        <?php
    }else{
    $lisDate = $nuevo->listarDateFactura($db, $num_factura);
?>
    <link rel="stylesheet" type="text/css" href="../../recursos/css/estilos_listar.css">
    <script src="../../recursos/js/fontawesome-all.js"></script>
    <script src="../../recursos/js/all.js"></script>
    <form id="listado"  action="lis_fac.php" method="post"> 
            <div class="container">
                    <div class="row">
                        <div class="fixed-left buscador" style="margin-top: 100px;">
                            <div class="col-12">
                                <h5>Bucar factura</h5>
                                <h2>Número de factura:</h2>
                                        <input type="text" class="btn btn-outline-primary" name="num_factura" placeholder="número de factura" required>
                                        <br><button type="submit" style="margin-top: 15px; aling: center;" class="btn btn-primary" value="Consultar" name="Consultar">Consultar</button>
                            </div>
                        </div>
                            <div class="col-8">
                                <div class="listar" style="margin-top: 100px;">
                                    <h1>Factura</h1>
                                <table style="max-height: 100%; max-width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Número de factura</th>
                                            <th>Proveedor</th>
                                            <th>Fecha de factura</th>
                                            <th>Precio total</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php foreach($lisDate as $row) { ?>
                                        <tr>
                                            <td><?php echo $row['num_factura']; ?></td>
                                            <td><?php echo $row['proveedor']; ?></td>
                                            <td><?php echo $row['fecha_factura']; ?></td>
                                            <td><?php echo $row['precio_total_factura']; ?></td>
                                            <td>
                                            <center>
                                                <ACRONYM title="Eliminar" name="elimina_lis"><a href="../../controlador/fac/con_eliminar_fac.php?id=<?php echo $consulta['num_factura']; ?>"><i class="icono fas fa-trash-alt"></i></a></ACRONYM>
                                                <ACRONYM title="Consultar" name="consultar_lis"><a href="consultar2_fac.php?id=<?php echo $consulta['id']; ?>"><i class="icono fas fa-search"></i></a></ACRONYM>
                                                <ACRONYM title="Crear PDF" name="pdf_lis"><a href="pdf_fac.php?id=<?php echo $consulta['id']; ?>"><i class="icono fas fa-file-pdf"></i></a></ACRONYM>
                                            </center>
                                            </td>		
                                        </tr>
                                <?php } ?>
                                    </tbody>                            
                                </table>
                            </div>
                        </div>
                    </div>	
                </div>
<?php} include "../include/footer.php";?>