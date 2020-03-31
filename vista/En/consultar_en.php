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
<div class="container col-6 bg-">
    <div class="formulario" style="margin-top: 100px;"><center>
        <h2>Consultar ente</h2></center>
            <form action="consultar2_ase.php" method="POST">
                <input class="form-control col-12" style="margin-top: 50px;" type="text" name="nombre" id="nombre" placeholder="Nombre del ente" required>
                <br><input type="submit" class="btn btn-info" value="registrar" onclick="validar()" name="registrar"> 
            </form>
    </div>
</div>
<?php include "../include/footer.php";?>