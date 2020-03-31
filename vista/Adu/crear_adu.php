<?php include "../include/header.php";?>
<?php include "../include/menu_administrador.php";?>
    <div class="container col-6 bg-">
        <div class="col-12"></div>  
            <div class="formulario" style="margin-top: 100px;"><center>
                <h2>Registrar usuario</h2></center>
                    <form class="text-center border border-light p-5" action="../../controlador/adu/con_crear_adu.php" id="usuario" onsubmit="return validar(event)" method="POST">
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="form-label " for="nombre">Nombre</label>
                                <input class="form-control" autocomplete="off" style="margin-right: 10px;" type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label " for="apellido">Apellido</label>
                                <input class="form-control" autocomplete="off"  type="text" name="apellido" id="apellido" placeholder="Apellido" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="cedula" class="form-label">Cedula</label>
                                <input class="form-control" autocomplete="off"  type="number" name="cedula" id="cedula" placeholder="Cedula" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="nom_usuario" class="form-label">Nombre de usuario</label>
                                <input class="form-control" autocomplete="off"  type="text" name="usuario" id="usuario" placeholder="Nombre de usuario" required> 
                            </div>
                            <div class="form-group col-6">
                                <label for="contraseña" class="form-label">Contraseña</label>
                                <input class="form-control" autocomplete="off"  type="text" name="password" id="password" placeholder="Contraseña" required> 
                            </div>
                            <div class="form-group col-6">
                                <label for="perfil" class="form-label">Perfil</label>
                                <select required="" class="form-control" name="perfil" style=" padding: 1%; width: 50%; margin: 5px; margin-left: 25%;">
                                    <option disabled="" selected="" value="">Seleccionar</option>
                                    <option value="administrador">Administrador</option>
                                    <option value="farmaceuta">Farmaceuta</option>
                                    <option value="auxiliar">Auxiliar</option>
                                </select>
                            </div>
                        </div>
                            <button id="register " class="btn btn-info" style="margin: 0 auto;" type="submit">Registrar</button>
                    </form>
            </div>
        </div>
    </div>
<?php include "../include/footer.php";?>
