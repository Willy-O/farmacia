<?php include "../include/header.php";?>
<?php include "../include/menu_administrador.php";?>
<?php include_once('../../modelo/usuario.php');  ?>
<?php require_once('../../modelo/conexion.php'); ?>
<?php  
    $cedula = $_POST['cedula'];
    $nuevo = new Usuario();
    $consulta = $nuevo->consultarUsuario($db, $cedula);
     if($cedula != $consulta['cedula']){
        ?>
            <script type="text/javascript">
                alert('La cedula ingresada no está registrada');
                window.location="lis_all_adu.php";
            </script>
        <?php
    }
?>
    <link rel="stylesheet" type="text/css" href="../../recursos/css/estilos_listar.css">
    <script src="../../recursos/js/fontawesome-all.js"></script>
    <script src="../../recursos/js/all.js"></script>
        <form id="listado"  action="lis_adu.php" method="post"> 
            
    <div class="container">
        <div class="row">
            <div class="fixed-left buscador" style="margin-top: 100px;">
                <div class="col-4 ">
                    <h5>Bucar usuario</h5>
                    <h2>Cedula:</h2>
                            <input type="text" autocomplete="off" class="btn btn-outline-primary" name="cedula" placeholder="cedula" required>
                            <br><button type="submit" style="margin-top: 15px; aling: center;" class="btn btn-primary" value="Consultar" name="ListarOne">Consultar</button>
                </div>
            </div>
            <div class="col-8">
                <div class="listar" style="margin-top: 100px;">
                    <h1>Usuarios del sistema</h1>
                    <table style="max-height: 100%; max-width: 100%;">
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
                    <tbody>
                            <tr>
                                <td><?php echo $consulta['nombre']; ?></td>
                                <td><?php echo $consulta['apellido']; ?></td>
                                <td><?php echo $consulta['cedula']; ?></td>
                                <td><?php echo $consulta['nom_user']; ?></td>
                                <td><?php echo $consulta['contrasenna']; ?></td>
                                <td style="max-width: 250px;"><?php echo $consulta['cargo']; ?></td>
                                <td>
                                <center> 
                                    <ACRONYM title="Eliminar" name="elimina_lis"><a href="../../controlador/adu/con_eliminar_adu.php?id=<?php echo $consulta['cedula']; ?>"><i class="icono fas fa-trash-alt"></i></a></ACRONYM>
                                    <ACRONYM title="Consultar" name="consultar_lis"><a href="consultar2_adu.php?id=<?php echo $consulta['cedula']; ?>"><i class="icono fas fa-search"></i></a></ACRONYM>
                                    <ACRONYM title="Editar" name="editar_lis"><a href="editar2_adu.php?id=<?php echo $consulta['cedula']; ?>"><i class="icono far fa-edit"></i></i></a></ACRONYM>
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

