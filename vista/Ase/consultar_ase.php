<?php include "../include/header.php";?>
<?php include "../include/menu_administrador.php";?>
<div class="container col-6 bg-">
    <div class="formulario" style="margin-top: 100px;"><center>
        <h2>Consultar paciente</h2></center>
            <form action="consultar2_ase.php" method="POST">
                <input class="form-control col-12" autocomplete="off" style="margin-top: 50px;" type="number" name="cedula" id="cedula" placeholder="Cedula" required>
                <br><input type="submit" class="btn btn-info" value="consultar" name="consultar"> 
            </form>
    </div>
</div>
<?php include "../include/footer.php";?>