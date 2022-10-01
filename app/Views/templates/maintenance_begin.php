<div class="container" style="padding-bottom: 160px;">

    <section class="py-5">
        <div
            class="text-white bg-secondary  border rounded border-0 border-primary d-block flex-column justify-content-between flex-lg-row  p-4 p-md-3">
            <div class="pb-2 pb-lg-1">
                <h2 class="fw-bold mb-2">Mantenimientos</h2>
            </div>
            <div class="my-0">
                <ul class="nav nav-pills" style="font-size:18px;font-weight: bold;">
                    <li class="nav-item "><a
                            class="nav-link link-light <?= current_url(true)->getSegment(1) == 'relative' ? 'active' : '' ?>"
                            data-bss-hover-animate="pulse" href="<?= base_url('relative') ?>">Acreditados</a>
                    </li>
                    <li class="nav-item "><a
                            class="nav-link  link-light <?= current_url(true)->getSegment(1) == 'administrator' ? 'active' : '' ?>"
                            data-bss-hover-animate="pulse" href="<?= base_url('administrator') ?>">Administradores</a>
                    </li>
                    <li class="nav-item"><a
                            class="nav-link  link-light <?= current_url(true)->getSegment(1) == 'assembly' ? 'active' : '' ?>"
                            data-bss-hover-animate="pulse" href="<?= base_url('assembly') ?>">Asambleas</a>
                    </li>
                    <li class="nav-item"><a
                            class="nav-link  link-light <?= current_url(true)->getSegment(1) == 'common_area' ? 'active' : '' ?>"
                            data-bss-hover-animate="pulse" href="<?= base_url('common_area') ?>">Areas
                            Comunes</a></li>
                    <li class="nav-item"><a
                            class="nav-link  link-light <?= current_url(true)->getSegment(1) == 'authorized' ? 'active' : '' ?>"
                            data-bss-hover-animate="pulse" href="<?= base_url('authorized') ?>">Autorizados</a>
                    </li>
                    <li class="nav-item"><a
                            class="nav-link  link-light <?= current_url(true)->getSegment(1) == 'condo_owner' ? 'active' : '' ?>"
                            data-bss-hover-animate="pulse" href="<?= base_url('condo_owner') ?>">Condominos</a>
                    </li>
                    <li class="nav-item"><a
                            class="nav-link  link-light <?= current_url(true)->getSegment(1) == 'officer' ? 'active' : '' ?>"
                            data-bss-hover-animate="pulse" href="<?= base_url('officer') ?>">Oficiales</a>
                    </li>
                    <li class="nav-item"><a
                            class="nav-link  link-light <?= current_url(true)->getSegment(1) == 'patrol' ? 'active' : '' ?>"
                            data-bss-hover-animate="pulse" href="<?= base_url('patrol') ?>">Patrullas</a>
                    </li>
                    <li class="nav-item"><a
                            class="nav-link  link-light <?= current_url(true)->getSegment(1) == 'reservation' ? 'active' : '' ?>"
                            data-bss-hover-animate="pulse" href="<?= base_url('reservation') ?>">Reservaciones</a>
                    </li>
                    <li class="nav-item"><a
                            class="nav-link  link-light <?= current_url(true)->getSegment(1) == 'relative_vehicle' ? 'active' : '' ?>"
                            data-bss-hover-animate="pulse" href="<?= base_url('relative_vehicle') ?>">Vehículos</a>
                    </li>
                    <li class="nav-item"><a
                            class="nav-link  link-light <?= current_url(true)->getSegment(1) == 'assembly_voting' ? 'active' : '' ?>"
                            data-bss-hover-animate="pulse" href="<?= base_url('assembly_voting') ?>">Votaciones</a>
                    </li>
                    <li class="nav-item"><a
                            class="nav-link  link-light <?= current_url(true)->getSegment(1) == 'vote' ? 'active' : '' ?>"
                            data-bss-hover-animate="pulse" href="<?= base_url('vote') ?>">Votos</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div class="card card-body">