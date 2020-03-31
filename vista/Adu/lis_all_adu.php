<?php include "../include/header.php";?>
<?php include "../include/menu_administrador.php";?>
<?php require_once('../../controlador/adu/con_listar_adu.php'); ?>
    <link rel="stylesheet" type="text/css" href="../../recursos/css/estilos_listar.css">
    <script src="../../recursos/js/fontawesome-all.js"></script>
    <script src="../../recursos/js/all.js"></script>
    <form id="listado"  action="lis_adu.php" method="post"> 
            
    <div class="container">
        <div class="row">
            <div class="fixed-left buscador" style="margin-top: 100px;">
                <div class="col-12">
                    <h5>Bucar usuario</h5>
                    <h2>Cedula:</h2>
                            <input type="number" autocomplete="off" class="btn btn-outline-primary" name="cedula" placeholder="cedula" required>
                            <br><button type="submit" style="margin-top: 15px; aling: center;" class="btn btn-primary" value="Consultar" name="Consultar">Consultar</button>
                </div>
            </div>
                <div class="col-8">
                    <div class="listar" style="margin-top: 100px;">
                        <h1>Usuarios del sistema</h1>
                        <table style="max-height: 100%; max-width: 100% ; table-layout: fixed;">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Cedula</th>
                                    <th>Usuario</th>
                                    <th>Contraseña</th>
                                    <th>Cargo</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody id="p" style="max-height: 100%; max-width: 100%;">
                        <?php foreach($result as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['nombre']; ?></td>
                                        <td><?php echo $row['apellido']; ?></td>
                                        <td><?php echo $row['cedula']; ?></td>
                                        <td><?php echo $row['nom_user']; ?></td>
                                        <td><?php echo $row['contrasenna']; ?></td>
                                        <td style="max-width: 250px;"><?php echo $row['cargo']; ?></td>
                                        <td>
                                        <center> 
                                            <ACRONYM title="Eliminar" name="elimina_lis"><a href="../../controlador/adu/con_eliminar_adu.php?id=<?php echo $row['cedula']; ?>"><i class="icono fas fa-trash-alt"></i></a></ACRONYM>
                                            <ACRONYM title="Consultar" name="consultar_lis"><a href="consultar2_adu.php?id=<?php echo $row['cedula']; ?>"><i class="icono fas fa-search"></i></a></ACRONYM>
                                            <ACRONYM title="Editar" name="editar_lis"><a href="editar2_adu.php?id=<?php echo $row['cedula']; ?>"><i class="icono far fa-edit"></i></i></a></ACRONYM>
                                        </center>
                                        </td>		
                                    </tr>
                            </tbody>                            
                        <?php   }  ?>
                    </table>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <ul class="pagination pagination-lg pager" id="developer_page"></ul>
            </div>
        </div>	
    </div>
    </form>
<?php include "../include/footer.php";?>

