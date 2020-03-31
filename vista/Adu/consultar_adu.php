<?php include "../include/header.php";?>
<?php include "../include/menu_administrador.php";?>
    <div class="contenedor-form">
        <div class="row"><center>
            <h2>Consultar usuario</h2></center>
                <form action="consultar2_adu.php" method="POST">
                    <b>Cedula:</b>
                        <input type="text" autocomplete="off" name="cedula" placeholder="cedula" required>
                    <br><input type="submit" value="Consultar" name="Consultar">
                    <input type="button" value="Volver" onClick="history.go(-1);">      
                </form>
        </div>
    </div>
<?php include "../include/footer.php";?>