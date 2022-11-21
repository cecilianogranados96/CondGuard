<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div id="dismiss">
            <i class="fas fa-arrow-left"></i>
        </div>

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
            <img src="<?= base_url('assets/img/ico.png'); ?>" style="width: 40%;">
        </a>

        <ul class="list-unstyled components">
            <li class="nav-item">
                <a class="nav-link" href="/home/">
                    <i class="fas fa-fw fa-tachometer-alt fs-5"></i>
                    <span class="fs-5">Inicio</span></a>
            </li>
            <?php if (session()->get('type') == 'condo_owner') { ?>

            <li>
                <a href="#reserveSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                    Reservas
                </a>
                <ul class="collapse list-unstyled" id="reserveSubmenu">
                    <li>
                        <a class="nav-link" href="<?= base_url('reservation/common_areas') ?>"> <i
                                class="fas fa-ticket-alt fs-6"></i>
                            <span class="fs-6">Reservar</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= base_url('reservation/myreservations') ?>"> <i
                                class="fas fa-list fs-6"></i>
                            <span class="fs-6">Mis reservas</span></a>
                    </li>
                </ul>
            </li>

            <?php } ?>


            <?php if (session()->get('type') == 'condo_owner') { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('assembly_voting/preview') ?>"> <i
                        class="fas fa-vote-yea fs-6"></i>
                    <span class="fs-6">Votación</span></a>
            </li>
            <?php } ?>
            <?php if (session()->get('type') == 'administrator') { ?>
            <li class="active">
                <a href="#maintenenceSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="fas fa-tools"></i>
                    Mantenimientos
                </a>
                <ul class="collapse list-unstyled" id="maintenenceSubmenu">
                    <h6 class="collapse-header">Control:</h6>
                    <li>
                        <a class="nav-link <?= current_url(true)->getSegment(1) == 'maintenance' ? 'active' : '' ?>"
                            href="<?= base_url('maintenance') ?>">Registro de cambios</a>
                    </li>
                    <h6 class="collapse-header">Usuarios:</h6>
                    <li>
                        <a class="nav-link <?= current_url(true)->getSegment(1) == 'administrator' ? 'active' : '' ?>"
                            href="<?= base_url('administrator') ?>">Administradores</a>
                    </li>
                    <h6 class="collapse-header">Condominios:</h6>
                    <li>
                        <a class="nav-link <?= current_url(true)->getSegment(1) == 'authorized' ? 'active' : '' ?>"
                            href="<?= base_url('authorized') ?>">Autorizados</a>
                    </li>
                    <li>
                        <a class="nav-link <?= current_url(true)->getSegment(1) == 'condo_owner' ? 'active' : '' ?>"
                            href="<?= base_url('condo_owner') ?>">Condóminos</a>
                    </li>
                    <li>
                        <a class="nav-link <?= current_url(true)->getSegment(1) == 'reservation' ? 'active' : '' ?>"
                            href="<?= base_url('reservation') ?>">Reservaciones</a>
                    </li>
                    <h6 class="collapse-header">Seguridad:</h6>
                    <li>
                        <a class="nav-link <?= current_url(true)->getSegment(1) == 'officer' ? 'active' : '' ?>"
                            href="<?= base_url('officer') ?>">Oficiales</a>
                    </li>
                    <li>
                        <a class="nav-link <?= current_url(true)->getSegment(1) == 'patrol' ? 'active' : '' ?>"
                            href="<?= base_url('patrol') ?>">Bitácora de seguridad</a>
                    </li>
                    <li>
                        <a class="nav-link <?= current_url(true)->getSegment(1) == 'relative_vehicle' ? 'active' : '' ?>"
                            href="<?= base_url('relative_vehicle') ?>">Ingresos y Vehículos</a>
                    </li>
                    <h6 class="collapse-header active">Administrativo:</h6>
                    <li>
                        <a class="nav-link <?= current_url(true)->getSegment(1) == 'common_area' ? 'active' : '' ?>"
                            href="<?= base_url('common_area') ?>">Áreas Comunes</a>
                    </li>
                    <li>
                        <a class="nav-link <?= current_url(true)->getSegment(1) == 'assembly' ? 'active' : '' ?>"
                            href="<?= base_url('assembly') ?>">Asambleas</a>
                    </li>
                    <li>
                        <a class="nav-link <?= current_url(true)->getSegment(1) == 'assembly_voting' ? 'active' : '' ?>"
                            href="<?= base_url('assembly_voting') ?>">Votaciones</a>
                    </li>
                    <li>
                        <a class="nav-link <?= current_url(true)->getSegment(1) == 'vote' ? 'active' : '' ?>"
                            href="<?= base_url('vote') ?>">Registro de Votos</a>
                    </li>
                </ul>
            </li>
            <?php } ?>

            <li class="nav-item">
                <a class="nav-link"
                    href="<?= base_url() . '/' . session()->get('type') . '/profile?id=' . session()->get(session()->get('type') . '_id') ?>">
                    <i class="fas fa-fw fa-user fs-6"></i>
                    <span class="fs-6">Perfil</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('assets/help/Manual_de_usuario.pdf'); ?>"
                    download="Manual_de_usuario">
                    <i class="far fa-question-circle"></i>
                    <span class="fs-6">Manual de usuario</span></a>
            </li>
            <?php if (session()->get('type') == 'officer') { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('assets/security/CondGuard_Seguridad.apk'); ?>"
                    download="CondGuard Seguridad">
                    <i class="far fa-question-circle"></i>
                    <span class="fs-6">App de seguridad</span></a>
            </li>
            <?php } ?>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a class="nav-link" href="<?= base_url('login/signout') ?>">
                    <i class="fas fa-sign-out-alt fs-6"></i>
                    <span class="fs-6">Cerrar Sesión</span></a>
            </li>
        </ul>
    </nav>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->

    <div id="content-wrapper" class="d-flex flex-column mx-lg-5 mx-sm-auto">
        <div class="container-fluid">
            <div class="col">
                <button type="button" id="sidebarCollapse" class="btn border rounded d-inline mt-3  mb-2">
                    <i class="fas fa-align-left"></i>
                    <span>Menú</span>
                </button>
            </div>
        </div>