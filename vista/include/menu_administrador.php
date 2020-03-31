<nav class="navbar navbar-expand justify-content-center bg-primary navbar-dark fixed-top col-12">
    <ul class="navbar-nav ">
        <a class="navbar-brand" href="../Inicios/inicio_administrador.php">Inicio</a>
        <li class="nav-item dropdown active">
            <a href ="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbardropu">Usuarios</a>
            <div class="dropdown-menu">
                <a href="../Adu/crear_adu.php" class="dropdown-item">Registrar</a>
                <a href="../Adu/lis_all_adu.php" class="dropdown-item">Listar</a>
            </div>
        </li>
        <li class="nav-item dropdown active">            
            <a href ="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbardroase">Beneficiario</a>
            <div class="dropdown-menu">
                <a href="../Ase/crear_ase.php" class="dropdown-item">Registrar</a>
                <a href="../Ase/consultar_ase.php" class="dropdown-item">Consultar</a>
                <a href="../Ase/editar_ase.php" class="dropdown-item">Editar</a>
                <a href="../Ase/lis_all_ase.php" class="dropdown-item">Listar</a>
                <a href ="#" class="nav-link dropdown-item dropdown-toggle active" data-toggle="dropdown" id="navbardropa">Familiares</a>
                    <div class="dropdown-menu">
                        <a href="../fam/crear_fam.php" class="dropdown-item">Registrar</a>
                        <a href="#" class="dropdown-item">Consultar</a>
                        <a href="#" class="dropdown-item">Editar</a>
                        <a href="../Ase/lis_all_ase.php" class="dropdown-item">Listar</a>
                    </div>
            </div>
        </li>
        <li class="nav-item dropdown active">
            <a href ="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbardropm">Medicamentos</a>
            <div class="dropdown-menu">
                <a href="../Me/crear_me.php" class="dropdown-item">Registrar</a>
                <a href="../Me/consultar_me.php" class="dropdown-item">Consultar</a>
                <a href="../Me/editar_me.php" class="dropdown-item">Editar</a>
                <a href="../Me/lis_all_me.php" class="dropdown-item">Listar</a>
            </div>
        </li>
        <li class="nav-item dropdown active">
        <a href ="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbardropen">Entes</a>
            <div class="dropdown-menu">
                <a href="../En/crear_en.php" class="dropdown-item">Registrar</a>
                <a href="../En/lis_all_en.php" class="dropdown-item">Listar</a>
            </div>
        </li>
        <li class="nav-item dropdown active">        
        <a href ="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbardroppe">Facturas</a>
            <div class="dropdown-menu">
                <a href="../Fac/crear_fac.php" class="dropdown-item">Registrar</a>
                <a href="../Fac/lis_all_fac.php" class="dropdown-item">Listar</a>
            </div>
        </li>
        <li class="nav-item dropdown active">        
        <a href ="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbardropd">Despacho</a>
            <div class="dropdown-menu">
                <a href="../Des/crear_des.php" class="dropdown-item">Registrar</a>
                <a href="../Des/lis_all_des.php" class="dropdown-item">Listar</a>
            </div>
        </li>
        <!-- <li class="nav-item dropdown active">        
        <a href ="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbardroppat">Patología</a>
            <div class="dropdown-menu">
                <a href="../Pat/crear_pat.php" class="dropdown-item">Registrar</a>
                <a href="#" class="dropdown-item">Consultar</a>
                <a href="#" class="dropdown-item">Editar</a>
                <a href="#" class="dropdown-item">Listar</a>
            </div>
        </li> -->
        <li class="active">        
            <a href ="../Inv/vis_inventario.php" class="nav-link"  id="navbardropi">Inventario</a>
        </li>
        <li class="active">        
            <a href ="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbardropd">Reportes</a>
            <div class="dropdown-menu">
                <a href="../Estadistica/vis1_estadistica.php" class="dropdown-item">Estadisticas</a>
                <a href="../Auditoria/vis_auditoria.php" class="dropdown-item">Auditoria</a>
            </div>
        </li>
        <li class="active">        
            <a href ="../../controlador/out.php" class="nav-link"  id="navbardropi">Cerrar Sesion</a>
        </li>
        <a class="navbar-brand"  href="#">
            <img src="../../recursos/img/logo_FASMIJ.PNG" alt="Logo de fasmij" style="margin-left: 0px; width: 150px; padding-left: 50px; ">
        </a>
    </ul>
</nav>

