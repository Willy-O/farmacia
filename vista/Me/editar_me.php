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
        <div class="col-12"></div>
            <div class="formulario" style="margin-top: 100px;"><center>
                <h2>Consultar medicamento para editar</h2></center>
                <form action="editar2_me.php" style="margin-top: 50px;" method="GET">
                    <div class="form-group row">
                        <input class="form-control col-12" type="text" name="codigo_med" id="codigo_med" placeholder="Codigo del medicamento" required>  
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-large">Consultar</button>  
                </form>
            </div>
        </div>
    </div>
<?php include "../include/footer.php";?>