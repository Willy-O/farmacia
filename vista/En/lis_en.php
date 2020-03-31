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
<?php include_once('../../modelo/entes.php');  ?>
<?php require_once('../../modelo/conexion.php'); ?>
<?php  
    $rif = $_POST['rif'];
    $nuevo = new Ente();
    $consulta = $nuevo->consultarEnte($db, $rif);
    if($rif != $consulta['rif']){
        ?>
            <script type="text/javascript">
                alert('El RIF ingresado no está registrado');
                window.location="lis_all_en.php";
            </script>
        <?php
    }
?>
    <link rel="stylesheet" type="text/css" href="../../recursos/css/estilos_listar.css">
    <script src="../../recursos/js/fontawesome-all.js"></script>
    <script src="../../recursos/js/all.js"></script>
        <form id="listado"  action="lis_en.php" method="post"> 
            <div class="container">
                    <div class="row">
                        <div class="fixed-left buscador" style="margin-top: 100px;">
                            <div class="col-12 ">
                                <h5>Bucar ente</h5>
                                <h2>RIF:</h2>
                                        <input type="text" autocomplete="off" class="btn btn-outline-primary" name="rif" placeholder="RIF ente" required>
                                        <br><button type="submit" style="margin-top: 15px; aling: center;" class="btn btn-primary" value="Consultar" name="Consultar">Consultar</button>
                            </div>
                            </div>
                            <div class="col-8">
                                <div class="listar" style="margin-top: 100px;">
                                    <h1>Entes</h1>
                                    <table style="max-height: 100%; max-width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Nombre de ente</th>
                                                <th>RIF ente</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $consulta['nombre']; ?></td>
                                                <td><?php echo $consulta['rif']; ?></td>
                                                <td>
                                                <center> 
                                                    <ACRONYM title="Eliminar" name="elimina_lis"><a href="../../controlador/en/con_eliminar_en.php?id=<?php echo $consulta['id']; ?>"><i class="icono fas fa-trash-alt"></i></a></ACRONYM>
                                                    <ACRONYM title="Consultar" name="consultar_lis"><a href="consultar2_en.php?id=<?php echo $consulta['id']; ?>"><i class="icono fas fa-search"></i></a></ACRONYM>
                                                    <ACRONYM title="Editar" name="editar_lis"><a href="editar2_en.php?id=<?php echo $consulta['id']; ?>"><i class="icono far fa-edit"></i></i></a></ACRONYM>
                                                </center>
                                                </td>		
                                            </tr>	
                                        </tbody>                            
                                </table>
                            </div>
                        </div>
                    </div>	
                </div>
<?php include "../include/footer.php";?>