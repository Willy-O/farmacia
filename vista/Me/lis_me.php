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
<?php include_once('../../modelo/medicamento.php');  ?>
<?php require_once('../../modelo/conexion.php'); ?>
<?php  
    $codigo_med = $_POST['codigo_med'];
    $nuevo = new Medicamento();
    $consulta = $nuevo->consultarMedicamento($db, $codigo_med);
     if ($consulta == null) {
       ?>
            <script type="text/javascript">
                alert('No se Encuentra el medicamento');
                window.location="../../vista/Me/lis_all_me.php";
            </script>
        <?php
    }
?>
    <link rel="stylesheet" type="text/css" href="../../recursos/css/estilos_listar.css">
    <script src="../../recursos/js/fontawesome-all.js"></script>
    <script src="../../recursos/js/all.js"></script>
    <form id="listado"  action="lis_me.php" method="post"> 
    <div class="container">
            <div class="row">
                <div class="fixed-left buscador" style="margin-top: 100px;">
                    <div class="col-4 ">
                        <h5>Bucar medicamento</h5>
                        <h2>Codigo:</h2>
                                <input type="text" autocomplete="off" class="btn btn-outline-primary" name="codigo_med" placeholder="Codigo del medicamento" require>
                                <br><button type="submit" style="margin-top: 15px; aling: center;" class="btn btn-primary" value="Consultar" name="Consultar">Consultar</button>
                    </div>
                </div>
                    <div class="col-8">
                        <div class="listar" style="margin-top: 100px;">
                            <h1>Medicamentos</h1>
                            <table style="max-height: 100%; max-width: 100%;">
                                <thead>
                                <tr>
                                        <th>Id medicamento</th>
                                        <th>Nombre</th>
                                        <th>Concentracion</th>
                                        <th>Dosis</th>
                                        <th>Forma farmaceutica</th>
                                        <th>Unidosis</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $consulta['codigo_med']; ?></td>
                                        <td><?php echo $consulta['nombre']; ?></td>
                                        <td><?php echo $consulta['concentracion']; ?></td>
                                        <td><?php echo $consulta['dosis']; ?></td>
                                        <td><?php echo $consulta['forma_farmaceutica']; ?></td>
                                        <td><?php if($consulta['unidosis'] == '1'){
                                                        echo 'Si';
                                                    }else{
                                                        echo 'No';
                                                    } ?></td>
                                        <td> 
                                        <center>
                                            <ACRONYM title="Eliminar" name="elimina_lis"><a href="../../controlador/me/con_eliminar_me.php?id=<?php echo $consulta['codigo_med']; ?>"><i class="icono fas fa-trash-alt"></i></a></ACRONYM>
                                            <ACRONYM title="Consultar" name="consultar_lis"><a href="consultar2_me.php?id=<?php echo $consulta['codigo_med']; ?>"><i class="icono fas fa-search"></i></a></ACRONYM>
                                            <ACRONYM title="Editar" name="editar_lis"><a href="editar2_me.php?id=<?php echo $consulta['codigo_med']; ?>"><i class="icono far fa-edit"></i></i></a></ACRONYM>
                                        </center>
                                        </td>		
                                    </tr>	
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