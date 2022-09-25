<nav class="navbar navbar-dark navbar-expand-md bg-dark py-3" style="
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        margin-bottom: 0px;
      ">
    <div class="container-fluid">
        <a class="navbar-brand d-flex" href="#" style="padding-left: 2%"><span
                class="bs-icon-sm bs-icon-rounded d-flex justify-content-center align-items-center me-2 bs-icon"
                style="background: #f28e13"><img style="height: 65px; width: 65px; padding: 0; margin: 0"
                    src="assets/img/Logo.png" /></span><span
                style="padding-left: 15px; font-weight: bold; font-size: 22px">Hacienda El Coyol</span></a><button
            data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3">
            <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-3" style="padding-left: 0%; padding-right: 0">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Reservar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Nosotros</a>
                </li>
            </ul>
            <hr style="background: var(--bs-yellow); border-color: #f5cc58" />
            <div class="btn-group" role="group" style="background: #f5cc58; border: 3px solid #f5cc58">
                <a class="btn btn-light border rounded border-0" role="button" style="font-weight: bold">Iniciar
                    Sesion</a><a class="btn btn-primary border rounded border-0" role="button"
                    style="margin-left: 1px; background: #f5cc58; font-weight: bold">Registrarse</a>
                <div class="dropdown btn-group bg-light" role="group" style="padding: 6px;"><a class="dropdown-toggle"
                        aria-expanded="false" data-bs-toggle="dropdown" href="#" style="font-weight: bold;"
                        target="_blank">UserLogged1</a>
                    <div class="dropdown-menu"><a class="dropdown-item" href="#">Perfil</a><a class="dropdown-item"
                            href="<?= base_url('condoowner') ?>">Mantenimientos</a><a class="dropdown-item"
                            href="#">Cerrar Sesion</a></div>
                </div>
            </div>
        </div>
    </div>
</nav>