<?php include "../include/header.php";?>
<?php include "../include/menu_administrador.php";?>
<?php require '../../controlador/ase/con_listar_ase.php'; ?>
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
                                <input type="text" class="btn btn-outline-primary" autocomplete="off" name="cedula" placeholder="cedula" required>
                                <br><button type="submit" style="margin-top: 15px; aling: center;" class="btn btn-primary" value="Consultar" name="Consultar">Consultar</button>
                    </div>
                </div>
                <div class="col-8">
                    <div class="listar" style="margin-top: 100px;">
                        <h1>Beneficiario</h1>
                        <table style="max-height: 100%; max-width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Cedula</th>
                                    <th>Statu</th>
                                    <th>Poliza</th>
                                    <th>Ente</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php foreach($result as $row) { ?>
                                <tr>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['apellido']; ?></td>
                                    <td><?php echo $row['cedula']; ?></td>
                                    <td><?php if($row['statu'] == true){
                                                    echo 'Activo';
                                                }else{
                                                    echo 'Jubilado';
                                                } ?></td>
                                    <td><?php echo $row['poliza']; ?></td>
                                    <td><?php echo $row['nombre_ente']; ?></td>
                                    <td>
                                    <center> 
                                        <ACRONYM title="Eliminar" name="elimina_lis"><a href="../../controlador/ase/con_eliminar_ase.php?id=<?php echo $row['cedula']; ?>"><i class="icono fas fa-trash-alt"></i></a></ACRONYM>
                                        <ACRONYM title="Consultar" name="consultar_lis"><a href="consultar2_ase.php?id=<?php echo $row['cedula']; ?>"><i class="icono fas fa-search"></i></a></ACRONYM>
                                        <ACRONYM title="Editar" name="editar_lis"><a href="editar2_ase.php?id=<?php echo $row['cedula']; ?>"><i class="icono far fa-edit"></i></i></a></ACRONYM>
                                    </center>
                                    </td>		
                                </tr>	
                            </tbody>                            
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>	
    </div>
<?php include "../include/footer.php";?>

