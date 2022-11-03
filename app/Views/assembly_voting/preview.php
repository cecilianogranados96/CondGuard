<section>
    <div class="img-fluid" style="height: 1100px;background: url('/assets/img/voting_preview.png') center / cover;">
        <div class="container h-100">
            <div class="row h-100">
                <div
                    class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                    <div style="max-width: 500px;">
                        <h1 style="font-size: 60px;color: var(--bs-pink);width: 500px;">Votación en linea</h1>
                        <p class="fw-semibold my-3" style="font-size: 25px;">Le invitamos a participar en las votaciones
                            activas del condominio.<br /></p>
                        <div class="dropdown"><button class="btn btn-primary dropdown-toggle" aria-expanded="false"
                                data-bs-toggle="dropdown" type="button">Seleccione una votación </button>
                            <div class="dropdown-menu">
                                <?php foreach ($items as $item) : ?>
                                <a class="dropdown-item"
                                    href="<?= base_url('assembly_voting/panel?id=' . $item['assembly_voting_id']) ?>"><?= $item['question'] . ' - ' . $item['description']  ?></a>
                                <?php endforeach ?>
                            </div>
                        </div><label class="form-label fw-light" style="font-size: 14px;">Seleccione la
                            votación.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>