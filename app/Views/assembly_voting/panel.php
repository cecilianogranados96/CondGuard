<div class="container" style="margin-top: 4%;margin-bottom: 4%;">
    <h1>Votación</h1>
    <div class="text-center text-white-50 bg-primary border rounded border-0 p-3">
        <div class="row row-cols-2 row-cols-md-4">
            <div class="col">
                <div class="p-3">
                    <h4 class="display-5 fw-bold text-white mb-0"><?= $item['total_votes'] ?></h4>
                    <p class="mb-0">Total de votos</p>
                </div>
            </div>
            <div class="col">
                <div class="p-3">
                    <h4 class="display-5 fw-bold text-white mb-0"><?= $item['up_votes'] ?></h4>
                    <p class="mb-0">Votos favor</p>
                </div>
            </div>
            <div class="col">
                <div class="p-3">
                    <h4 class="display-5 fw-bold text-white mb-0"><?= $item['down_votes'] ?></h4>
                    <p class="mb-0">Votos en contra</p>
                </div>
            </div>
            <div class="col">
                <div class="p-3" style="margin-top: 10px;margin-left: -34px;">
                    <?php
                    $status = null;
                    switch ($item['status']) {
                        case 'pending':
                            $status = 'Pendiente';
                            break;
                        case 'approved':
                            $status = 'Aprobado';
                            break;
                        case 'rejected':
                            $status = 'Rechazado';
                            break;

                        default:
                            $status = 'Pendiente';
                            break;
                    }


                    ?>
                    <h1 class="display-5 fw-bold text-white mb-0" style="font-size: 32.784px;"><?= $status ?>
                    </h1>
                    <p class="mt-2 mb-0">Resultado</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card" style="margin-top: 16px;">
        <div class="card-body">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col">
                    <h5>Descripción:</h5>
                    <p><?= $item['description'] ?></p>
                    <h5>Pregunta:</h5>
                    <p><?= $item['question'] ?></p>
                    <hr>
                    <h5>Votar</h5>
                    <h6 class="text-muted card-subtitle ">Participe en la votación:</h6>
                    <br>
                    <form id="myForm" action="<?= base_url('assembly_voting/vote') ?>" method="post"
                        class="g-3  form-floating needs-validation" novalidate>
                        <!-- input -->
                        <div class="form-floating">
                            <h5>Respuesta <b class="required-feedback">*</b></h5>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="answer" id="answer1" value="1">
                                <label class="form-check-label" for="answer">
                                    A favor.
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="answer" id="answer2" value="0"
                                    checked>
                                <label class="form-check-label" for="answer">
                                    En contra.
                                </label>
                            </div>
                            <div class="valid-feedback ">Correcto.</div>
                            <div class="invalid-feedback ">
                                Invalido, debe ingresar respuesta correspondiente.
                            </div>
                        </div>
                        <br>

                        <!-- Error -->
                        <?php if (isset($error)) { ?>
                        <div class="required-feedback"><?= $error ?></div>
                        <?php } ?>
                        <!-- required message -->
                        <div class="required-feedback">
                            <?= isset($voted) ? 'Voto realizado.' : 'Campos requeridos*' ?></div>
                        <!-- hidden input -->
                        <input name="assembly_voting_id" type="hidden" value=<?= $item['assembly_voting_id'] ?>>
                        <!-- hidden input -->
                        <input name="condo_owner_id" type="hidden" value=<?= session()->get('condo_owner_id') ?>>
                        <br>
                        <input class="btn btn-primary btn-lg" type="submit" value="Votar" data-bs-toggle="tooltip"
                            <?= isset($voted) ? 'disabled' : '' ?> data-bs-placement="right" title="Votar">

                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
<script>
window.addEventListener('load', (event) => {
    $('form#myForm').submit(function(e) {
        $(this).children('input[type=submit]').attr('disabled', 'disabled');
    });
});
</script>