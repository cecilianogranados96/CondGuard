<section class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2 class="fw-bold">Áreas Comunes</h2>
                <p class="text-muted w-lg-50">
                    Reserve con tranquilidad su área preferida en los horarios elegibles.
                </p>
            </div>
        </div>
        <div class="row  row-cols-md-3 mx-auto">
            <?php foreach ($items as $item) : ?>

            <div class="col mb-3">
                <div class="card card-body">
                    <a href="#"><img class="rounded img-fluid shadow w-100 fit-cover"
                            src=<?= '/assets/img/common_areas/' . $item['image'] ?> style="height: 250px" /></a>
                    <div class="py-4">
                        <span class="badge bg-secondary mb-2 fs-5">Área común : <?= $item['name'] ?></span>
                        <p class="text-muted">
                            Área común <?= $item['address'] ?>.
                        </p>
                        <a href="<?php echo base_url('reservation/request?id=' . $item['common_area_id']) ?>"
                            class="btn btn-warning " role="button" data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Reservar">Reservar</a>
                    </div>
                </div>
            </div>

            <?php endforeach ?>
        </div>
    </div>
</section>