<nav class="navbar navbar-dark navbar-expand-md  bg-dark py-3"
    style="--bs-primary: #fec006; --bs-primary-rgb: 254, 192, 6">
    <!--class='sticky-top'-->
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" data-bss-hover-animate="pulse" href="<?= base_url() ?>"
            style="height: 50px"><img class="rounded-circle img-fluid"
                style="margin-right: 5px; height: 75px; width: 75px" src="/assets/img/CondominioLogoOnly.png" width="0"
                height="0" loading="auto" /><span class="fs-1 text-light"
                style="font-family: 'IM Fell Great Primer SC', serif">Hacienda el Coyol</span></a><button
            data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5">
            <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-5">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active fw-semibold" data-bss-hover-animate="pulse" href="<?= base_url() ?>"
                        style="
              padding-left: 11px;
              --bs-primary: #fec006;
              --bs-primary-rgb: 254, 192, 6;
              color: #fec006;
            ">Inicio</a>
                </li>
                <li class="nav-item text-warning">
                    <a class="nav-link fw-semibold" data-bss-hover-animate="pulse" href="#" style="
              padding-left: 11px;
              --bs-primary: #fec006;
              --bs-primary-rgb: 254, 192, 6;
              color: #fec006;
            ">Reservar</a>
                </li>
                <li class="nav-item text-warning visually-hidden">
                    <a class="nav-link fw-semibold" data-bss-hover-animate="pulse" href="#" style="
              padding-left: 11px;
              --bs-primary: #fec006;
              --bs-primary-rgb: 254, 192, 6;
              color: #fec006;
            ">Registrarse</a>
                </li>
                <li class="nav-item text-warning visually-hidden">
                    <a class="nav-link fw-bold link-light bg-primary" data-bss-hover-animate="pulse" href="#"
                        style="border-radius: 8px; padding-left: 11px">Iniciar Sesion</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link fw-semibold" aria-expanded="false" data-bs-toggle="dropdown"
                        data-bss-hover-animate="pulse" href="#" style="
              padding-left: 11px;
              --bs-primary: #fec006;
              --bs-primary-rgb: 254, 192, 6;
              color: #fec006;
            ">Opciones</a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" data-bss-hover-animate="pulse" href="#">Perfil</a><a
                            class="dropdown-item" data-bss-hover-animate="pulse"
                            href="<?= base_url('maintenance') ?>">Mantenimientos</a>
                        <hr />
                        <a class="dropdown-item" data-bss-hover-animate="pulse" href="#">Cerrar Sesion</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>