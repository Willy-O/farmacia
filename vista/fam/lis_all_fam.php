<?php include "../include/header.php";?>
<?php include "../include/menu_administrador.php";?>
<?php require_once('../../controlador/fam/con_listar_fam.php'); 
//id_familia, nombre, apellido, cedula, id_patologia, parentesco, direccion, id_asegurado)
?>
        <link rel="stylesheet" type="text/css" href="../../recursos/css/estilos_listar.css">
        <script src="../../recursos/js/fontawesome-all.js"></script>
        <script src="../../recursos/js/all.js"></script>
        <form id="listado"  action="consultar2_adu.php" method="post"> 
            <div class="container">
                    <div class="row">
                        <div class="fixed-left buscador" style="margin-top: 100px;">
                            <div class="col-4 ">
                                <h5>Bucar paciente</h5>
                                <h2>Cedula:</h2>
                                        <input type="text" class="btn btn-outline-primary" name="cedula" placeholder="cedula" required>
                                        <br><button type="submit" style="margin-top: 15px; aling: center;" class="btn btn-primary" value="Consultar" name="Consultar">Consultar</button>
                            </div>
                            </div>
                            <div class="col-8">
                                <div class="listar" style="margin-top: 100px;">
                                    <h1>Pacientes</h1>
                                    <table style="max-height: 100%; max-width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>id_familia</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Cedula</th>
                                                <th>id_patologia</th>
                                                <th>parentesco</th>
                                                <th>direccion</th>
                                                <th>Id asegurado</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php foreach($result as $row) {  ?>
                                            <tr>
                                                <td><?php echo $row['id_familia']; ?></td>
                                                <td><?php echo $row['nombre']; ?></td>
                                                <td><?php echo $row['apellido']; ?></td>
                                                <td><?php echo $row['cedula']; ?></td>
                                                <td><?php echo $row['id_patologia']; ?></td>
                                                <td><?php echo $row['parentesco']; ?></td>
                                                <td><?php echo $row['direccion']; ?></td>
                                                <td><?php echo $row['id_asegurado']; ?></td>
                                                <td> 
                                                    <ACRONYM title="Eliminar" name="elimina_lis"><a href="../../controlador/des/con_eliminar_des.php?id=<?php echo $row['id_despacho']; ?>"><i class="icono fas fa-trash-alt"></i></a></ACRONYM>
                                                    <ACRONYM title="Consultar" name="consultar_lis"><a href="consultar2_des.php?id=<?php echo $row['id_despacho']; ?>"><i class="icono fas fa-search"></i></a></ACRONYM>
                                                    <ACRONYM title="Editar" name="editar_lis"><a href="editar2_des.php?id=<?php echo $row['id_despacho']; ?>"><i class="icono far fa-edit"></i></i></a></ACRONYM>
                                                    <ACRONYM title="Crear PDF" name="pdf_lis"><a href="pdf_des.php?id=<?php echo $row['id_despacho']; ?>"><i class="icono fas fa-file-pdf"></i></a></ACRONYM>
                                                </td>		
                                            </tr>	
                                        </tbody>                            
                                    <?php  } ?>
                                </table>
                            </div>
                        </div>
                    </div>	
                </div>
<?php include "../include/footer.php";?>