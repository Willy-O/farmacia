<?php include "../include/header.php";?>
<?php include "../include/menu_administrador.php";?>
<?php include_once('../../modelo/asegurado.php');  ?>
<?php require_once('../../modelo/conexion.php'); ?>
<?php  
    $cedula = $_POST['cedula'];
    $nuevo = new Asegurado();
    $consulta = $nuevo->consultarAsegurado($db, $cedula);
    if($cedula != $consulta['cedula']){
        ?>
            <script type="text/javascript">
                alert('La cedula ingresada no está registrada');
                window.location="lis_all_ase.php";
            </script>
        <?php
    }
?>
    <link rel="stylesheet" type="text/css" href="../../recursos/css/estilos_listar.css">
    <script src="../../recursos/js/fontawesome-all.js"></script>
    <script src="../../recursos/js/all.js"></script>    
    <form id="listado"  action="lis_ase.php" method="post"> 
        <div class="container">
            <div class="row">
                <div class="fixed-left buscador" style="margin-top: 100px;">
                    <div class="col-4 ">
                        <h5>Bucar beneficiario</h5>
                        <h2>Cedula:</h2>
                                <input type="text" autocomplete="off" class="btn btn-outline-primary" name="cedula" placeholder="cedula" required>
                                <br><button type="submit" style="margin-top: 15px; aling: center;" class="btn btn-primary" value="Consultar" name="Consultar">Consultar</button>
                    </div>
                </div>
                <div class="col-8">
                    <div class="listar" style="margin-top: 100px;">
                        <h1>Beneficiarios</h1>
                        <table style="max-height: 100%; max-width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Cedula</th>
                                    <th>Statu</th>
                                    <th>Ente</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td><?php echo $consulta['nombre']; ?></td>
                                    <td><?php echo $consulta['apellido']; ?></td>
                                    <td><?php echo $consulta['cedula']; ?></td>
                                    <td><?php if($consulta['statu'] == true){
                                                    echo 'Activo';
                                                }else{
                                                    echo 'Jubilado';
                                                } ?></td>
                                    <td><?php echo $consulta['nombre_ente']; ?></td>
                                    <td> 
                                    <center>
                                        <ACRONYM title="Eliminar" name="elimina_lis"><a href="../../controlador/ase/con_eliminar_ase.php?id=<?php echo $consulta['cedula']; ?>"><i class="icono fas fa-trash-alt"></i></a></ACRONYM>
                                        <ACRONYM title="Consultar" name="consultar_lis"><a href="consultar2_ase.php?id=<?php echo $consulta['cedula']; ?>"><i class="icono fas fa-search"></i></a></ACRONYM>
                                        <ACRONYM title="Editar" name="editar_lis"><a href="editar2_ase.php?id=<?php echo $consulta['cedula']; ?>"><i class="icono far fa-edit"></i></i></a></ACRONYM>
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

