<section>
    <div class="container" style="margin-top: 130px;">
        <div class="row row-cols-1 row-cols-md-2 mx-auto">
            <div class="col mb-4">
                <img class="rounded img-fluid float-end w-100"
                    src=<?= '/assets/img/common_areas/' . $item['image'] ?> />
                <span class="badge bg-secondary float-end w-100 fs-5 mt-1">Área común :
                    <?= $item['name'] ?></span>
            </div>
            <div class="col mb-4">
                <div class="card card-body">
                    <form action="<?= base_url('reservation/reserve') ?>" method="post"
                        class="row g-3 form-floating needs-validation" novalidate>
                        <!-- timezone-->
                        <?php date_default_timezone_set('America/Costa_Rica');
                        ?>

                        <!-- title -->
                        <h1>
                            Datos de la reservación
                        </h1>

                        <br>
                        <!-- input -->
                        <div class="form-floating">
                            <input class="form-control" type="text" id="identity" name="identity"
                                placeholder="Identificación." data-bs-toggle="tooltip" data-bs-placement="right"
                                title="Identificación." value="<?= session()->get('identity') ?>" readonly />
                            <label for="identity">Identificación </label>
                        </div>
                        <!-- input -->
                        <div class="form-floating">
                            <input class="form-control " type="text" id="name" name="name" placeholder="Nombre completo"
                                data-bs-toggle="tooltip" data-bs-placement="right" title="Nombre completo."
                                value="<?= session()->get('name') ?>" readonly />
                            <label for="name">Nombre completo </label>
                        </div>

                        <!-- input -->
                        <div class="form-floating">
                            <?php if (session()->get('type') == 'condo_owner') {
                                $valueland = session()->get('land_number');
                            } else {
                                foreach ($relations2 as $condo_owner) {
                                    if ($condo_owner['condo_owner_id'] == session()->get('condo_owner_id')) {
                                        $valueland = $condo_owner['land_number'];
                                    }
                                }
                            } ?>
                            <input class="form-control" type="text" id="land_number" name="land_number"
                                placeholder="Filial" data-bs-toggle="tooltip" data-bs-placement="right" title="Filial."
                                value="<?= $valueland ?>" readonly />
                            <label for="land_number">Filial </label>
                        </div>
                        <!-- Input -->
                        <div class="form-floating">
                            <input class="form-control" placeholder="Fecha de reserva" data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Fecha de entrada ej: <?= date('Y-m-d') ?>" type="date"
                                id="entry_at" name="entry_at" min="<?= date('Y-m-d') ?>"
                                max="<?= date('Y-m-d', strtotime('+1 year')) ?>" required
                                onchange="validate(this.value)">
                            <label for="entry_at">Fecha de entrada </label>
                            <div class="valid-feedback">Correcto.</div>
                            <div class="invalid-feedback">
                                Invalido, debe ingresar una fecha válida ej:<?= date('Y-m-d') ?>.
                            </div>
                        </div>

                        <!-- select -->
                        <div class="mt-3">
                            <select class="form-control" name="schedule" id="schedule" required="">
                                <option></option>
                                <option value="1">7 am - 11 am</option>
                                <option value="2">11 am - 3 pm</option>
                                <option value="3">3 pm - 7 pm</option>
                            </select>
                            <div class="valid-feedback">Correcto.</div>
                            <div class="invalid-feedback">
                                Debe seleccionar una horario.
                            </div>
                        </div>
                        <br>
                        <br />
                        <!-- hidden input -->
                        <input name="common_area_id" type="hidden" value="<?php echo $item['common_area_id'] ?>">
                        <br>
                        <!-- required message -->
                        <div class="required-feedback">Campos requeridos*.</div>
                        <br>
                        <!-- submit -->
                        <div style="margin-top: 20px">
                            <a class="btn btn-secondary btn-lg" role="button" style="width: 29%"
                                href="<?= base_url('reservation/common_areas') ?>" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Atrás">
                                Atrás </a><button class="btn btn-primary btn-lg" style="width: 69%; margin-left: 2%"
                                type="submit" data-bs-toggle="tooltip" data-bs-placement="right"
                                title="Reservar">Reservar <i class="fas fa-check fs-4"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function validate(fecha) {
    $.post("../ajaxvalidate", {
            id: "<?php echo $item['common_area_id'] ?>",
            date: fecha
        })
        .done(function(data) {
            alert("Data Loaded: " + data);
            const obj = JSON.parse(data);
            console.log(obj);
            for (const key in obj) {
                $('#schedule').append('< option value = ' + obj[key] + ' > ' + obj[key] + '< /option>');
                if (obj.hasOwnProperty(key)) {
                    console.log(`${key} : ${obj[key]}`)
                }
            }
        });
}
</script>