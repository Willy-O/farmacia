<?php include "../include/header.php";?>
<?php include "../include/menu_administrador.php";?>
<div class="contenedor-form">
    <div class="formulario"><center>
        <h2>Consultar usuario</h2></center>
            <form action="eliminar_adu.php" method="POST">
                <b>Cedula:</b>
                    <input type="text" name="cedula" placeholder="Cedula" required>
                <br> <input type="button" value="Volver" onClick="history.go(-1);"> 
                <input type="submit" value="Consultar" name="eliminar">   
            </form>
    </div>
</div>
<?php include "../include/footer.php";?>