<div class="container-fluid my-auto" style="
        display: flex;
        align-items: center;
        justify-content: center;">
    <div class="col-auto" style="width: 440px">
        <div class="card card-body">
            <form action="<?= base_url('vote/save') ?>" method="post" class="row g-3 form-floating needs-validation"
                novalidate>
                <!-- timezone-->
                <?php date_default_timezone_set('America/Costa_Rica');
                ?>

                <!-- title -->
                <h1>
                    <?= isset($edit_enabled) ? 'Editar' : 'Nuevo'; ?>
                    Voto
                </h1>
                <!-- select -->
                <div data-bs-toggle="tooltip" data-bs-placement="right" title="Seleccione la votación">
                    <select class="form-select single-select-clear-field" name="assembly_voting_id"
                        id="assembly_voting_id" data-placeholder="Votación*" required="" style="font-size: 1px;">
                        <option></option>
                        <?php foreach ($relations as $relation) :
                            $selected = '';
                            if (isset($item)) {
                                if ($relation['assembly_voting_id'] == $item['assembly_voting_id']) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';
                                }
                            }
                        ?>
                        <option <?= "$selected" ?> value="<?= $relation['assembly_voting_id'] ?>">
                            <?= $relation['question'] . ' - ' . $relation['description']  ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Debe seleccionar una votación.
                    </div>
                </div>
                <br />
                <!-- select -->
                <div data-bs-toggle="tooltip" data-bs-placement="right" title="Seleccione el condomino que va vota">
                    <select class="form-select single-select-clear-field" name="condo_owner_id" id="condo_owner_id"
                        data-placeholder="Condomino*" required="" style="font-size: 1px;">
                        <option></option>
                        <?php foreach ($relations2 as $relation) :
                            $selected = '';
                            if (isset($item)) {
                                if ($relation['condo_owner_id'] == $item['condo_owner_id']) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';
                                }
                            }
                        ?>
                        <option <?= "$selected" ?> value="<?= $relation['condo_owner_id'] ?>">
                            <?= $relation['identity'] . ' - ' . $relation['name']  ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Debe seleccionar un condomino.
                    </div>
                </div>
                <br />
                <!-- input -->
                <div class="form-floating">
                    <h5>Respuesta <b class="required-feedback">*</b></h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer" id="answer1" value="1">
                        <label class="form-check-label" for="answer">
                            A favor.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer" id="answer2" value="0" checked>
                        <label class="form-check-label" for="answer">
                            En contra.
                        </label>
                    </div>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar respuesta correspondiente.
                    </div>
                </div>

                <!-- required message -->
                <div class="required-feedback">Campos requeridos*.</div>
                <!-- hidden input -->
                <input name="vote_id" type="hidden" value=<?= isset($edit_enabled) ? $item['vote_id'] : ''; ?>>
                <!-- submit -->
                <div style="margin-top: 20px">
                    <a class="btn btn-secondary btn-lg" role="button" style="width: 39%" href="<?= base_url('vote') ?>"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Atrás">
                        Atrás </a><input class="btn btn-primary btn-lg" style="width: 59%; margin-left: 2%"
                        type="submit" value="<?= isset($edit_enabled) ? 'Editar' : 'Guardar'; ?>"
                        data-bs-toggle="tooltip" data-bs-placement="right"
                        title="<?= isset($edit_enabled) ? 'Editar' : 'Guardar'; ?>" />
                </div>
            </form>
        </div>
    </div>
    <div class="w-100 d-xl-none d-xxl-none" style="margin: 4%"></div>
    <div class="col visually-hidden">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
            </div>
        </div>
    </div>
</div>