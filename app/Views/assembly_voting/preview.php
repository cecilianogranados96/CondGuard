<section>
    <div class="img-fluid" style="height: 1100px;background: url('/assets/img/voting_preview.png') center / cover;">
        <div class="container h-100">
            <div class="row h-100">
                <div
                    class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                    <div class="card card-body p-5" style="max-width: 500px;">
                        <h1 style="font-size: 55px;color: var(--bs-pink);">Votación en línea</h1>
                        <p class="fw-semibold my-3" style="font-size: 25px;">Le invitamos a participar en las votaciones
                            activas del condominio:<br /></p>
                        <div class="row">
                            <?php foreach ($items as $item) : ?>
                            <div class="col-lg-6 mb-4">
                                <div class="card text-white bg-primary shadow">
                                    <div class="card-body">
                                        <div id="voteinfo">
                                            <i data-bs-toggle="popover" data-bs-placement="top"
                                                data-bs-content="Descripción: <?= $item['description'] ?>"
                                                class="fas fa-info"></i>
                                        </div>
                                        <a class="text-white fw-bold"
                                            href="<?= base_url('assembly_voting/panel?id=' . $item['assembly_voting_id']) ?>">Votar
                                            <i class="far fa-hand-point-right"></i></a>
                                        <p class="text-white small m-0 fw-semibold">
                                            Pregunta: <?= $item['question'] ?></p>

                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>