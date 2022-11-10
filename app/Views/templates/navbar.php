<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
            <img src="<?= base_url('assets/img/ico.png'); ?>" style="width: 40%;">
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
            <a class="nav-link" href="/home/">
                <i class="fas fa-fw fa-tachometer-alt fs-5"></i>
                <span class="fs-5">Inicio</span></a>
        </li>

        <?php if (session()->get('type') == 'condo_owner') { ?>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Reservas
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('reservation/common_areas') ?>"> <i
                    class="fas fa-ticket-alt fs-6"></i>
                <span class="fs-6">Reservar</span></a>
            <a class="nav-link" href="<?= base_url('reservation/myreservations') ?>"> <i class="fas fa-list fs-6"></i>
                <span class="fs-6">Mis reservas</span></a>
        </li>
        <?php } ?>
        <?php if (session()->get('type') == 'condo_owner') { ?>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Votaciones
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('assembly_voting/preview') ?>"> <i class="fas fa-vote-yea fs-6"></i>
                <span class="fs-6">Votación</span></a>
        </li>
        <?php } ?>
        <?php if (session()->get('type') == 'administrator') { ?>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Mantenimientos
        </div>
        <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog fs-6"></i>
                <span class="fs-6">Mantenimientos </span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Control:</h6>
                    <a class="collapse-item <?= current_url(true)->getSegment(1) == 'maintenance' ? 'active' : '' ?>"
                        href="<?= base_url('maintenance') ?>">Registro de cambios</a>
                    <hr class="my-1 bg-dark">
                    <h6 class="collapse-header">Usuarios:</h6>
                    <a class="collapse-item <?= current_url(true)->getSegment(1) == 'administrator' ? 'active' : '' ?>"
                        href="<?= base_url('administrator') ?>">Administradores</a>
                    <hr class="my-1 bg-dark">
                    <h6 class="collapse-header">Condominios:</h6>

                    <a class="collapse-item <?= current_url(true)->getSegment(1) == 'authorized' ? 'active' : '' ?>"
                        href="<?= base_url('authorized') ?>">Autorizados</a>

                    <a class="collapse-item <?= current_url(true)->getSegment(1) == 'condo_owner' ? 'active' : '' ?>"
                        href="<?= base_url('condo_owner') ?>">Condóminos</a>

                    <a class="collapse-item <?= current_url(true)->getSegment(1) == 'reservation' ? 'active' : '' ?>"
                        href="<?= base_url('reservation') ?>">Reservaciones</a>

                    <hr class="my-1 bg-dark">
                    <h6 class="collapse-header">Seguridad:</h6>

                    <a class="collapse-item <?= current_url(true)->getSegment(1) == 'officer' ? 'active' : '' ?>"
                        href="<?= base_url('officer') ?>">Oficiales</a>
                    <a class="collapse-item <?= current_url(true)->getSegment(1) == 'patrol' ? 'active' : '' ?>"
                        href="<?= base_url('patrol') ?>">Bitácora de seguridad</a>
                    <a class="collapse-item <?= current_url(true)->getSegment(1) == 'relative_vehicle' ? 'active' : '' ?>"
                        href="<?= base_url('relative_vehicle') ?>">Ingresos y Vehículos</a>

                    <hr class="my-1 bg-dark">
                    <h6 class="collapse-header">Administrativo:</h6>
                    <a class="collapse-item <?= current_url(true)->getSegment(1) == 'common_area' ? 'active' : '' ?>"
                        href="<?= base_url('common_area') ?>">Áreas Comunes</a>
                    <a class="collapse-item <?= current_url(true)->getSegment(1) == 'assembly' ? 'active' : '' ?>"
                        href="<?= base_url('assembly') ?>">Asambleas</a>
                    <a class="collapse-item <?= current_url(true)->getSegment(1) == 'assembly_voting' ? 'active' : '' ?>"
                        href="<?= base_url('assembly_voting') ?>">Votaciones</a>
                    <a class="collapse-item <?= current_url(true)->getSegment(1) == 'vote' ? 'active' : '' ?>"
                        href="<?= base_url('vote') ?>">Registro de Votos</a>





                </div>
            </div>
        </li>


        <?php } ?>
        <li class="nav-item">
            <a class="nav-link"
                href="<?= base_url() . '/' . session()->get('type') . '/profile?id=' . session()->get(session()->get('type') . '_id') ?>">
                <i class="fas fa-fw fa-user fs-6"></i>
                <span class="fs-6">Perfil</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=" <?= base_url('assets/help/Manual_de_usuario.pdf'); ?>"
                download="Manual_de_usuario">
                <i class="fas fa-info fs-6"></i>
                <span class="fs-6">Manual de usuario</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('login/signout') ?>">
                <i class="fas fa-sign-out-alt fs-6"></i>
                <span class="fs-6">Cerrar Sesión</span></a>
        </li>
        <div class="text-center  d-md-inline py-3">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="container-fluid">
            <div class="col">
                <button type="button" id="sidebarToggle" class="border rounded d-inline mt-3  mb-2"
                    style="width: 50px;"> <i class="fas fa-sliders-h"></i></button>
            </div>
        </div>