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
<?php require_once '../../modelo/entes.php';  ?>
<?php require_once '../../modelo/conexion.php'; ?>
<?php  
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $nuevo = new Ente();
            $consulta = $nuevo->consultarEnteId($db, $id);
        }else{
            $id = $_GET['id'];
            $nuevo = new Ente();
            $consulta = $nuevo->consultarEnteId($db, $id);
        }
?>
    <div class="container col-6 bg-">
        <div class="col-12"></div>
            <div class="formulario" style="margin-top: 100px;"><center>
                <h2>Editar ente</h2></center>
                    <form action="../../controlador/en/con_editar_en.php" style="margin-top: 50px;" method="POST">
                        <div class="form-group row">
                            <label class="col-form-label col-6">Rif del ente</label>      
                            <input class="form-control col-6" autocomplete="off" type="text" name="rif" id="rif" value="<?php echo $consulta['rif']; ?>" placeholder="RIF del ente" >
                        </div> 
                        <div class="form-group row">
                            <label class="col-form-label col-6">Nombre del ente</label> 
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" >     
                        </div> 
                        <div class="form-group row">                    
                            <input class="form-control col-12" autocomplete="off" type="text" name="nombre" id="nombre" value="<?php echo $consulta['nombre']; ?>" >  
                        </div>
                        <br><center><input type="submit" class="btn btn-info" value="Editar" onclick="validar()" name="editar">
                            <input type="button" class="btn btn-info" value="Volver" onClick="history.go(-1);"></center>
                    </form>
            </div>
        </div>
    </div>
<?php include "../include/footer.php";?>
</html>