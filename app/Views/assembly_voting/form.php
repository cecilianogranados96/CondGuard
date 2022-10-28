<div class="col-auto" style="width: 440px">
    <div class="card card-body">
        <!-- form -->
        <form action="<?= base_url('assembly_voting/save') ?>" method="post"
            class="row g-3 form-floating needs-validation" novalidate>
            <!-- title -->
            <h1><?= isset($edit_enabled) ? 'Editar' : 'Nueva'; ?> Votación</h1>
            <!-- select -->
            <div data-bs-toggle="tooltip" data-bs-placement="right" title="Seleccione el asamblea">
                <select class="form-select single-select-clear-field" name="assembly_id" id="assembly_id"
                    data-placeholder="Asamblea*" required="" style="font-size: 1px;">
                    <option></option>
                    <?php foreach ($relations as $relation) :
                        $selected = '';
                        if (isset($item)) {
                            if ($relation['assembly_id'] == $item['assembly_id']) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }
                        }
                    ?>
                    <option <?= "$selected" ?> value="<?= $relation['assembly_id'] ?>">
                        <?= $relation['name'] . ' - ' . $relation['place'] ?>
                    </option>
                    <?php endforeach ?>
                </select>
                <div class="valid-feedback">Correcto.</div>
                <div class="invalid-feedback">
                    Debe seleccionar una asamblea.
                </div>
            </div>
            <br />
            <!-- input -->
            <div class="form-floating">
                <input class="form-control" type="text" id="description" name="description" placeholder="Descripción"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Descripción"
                    value="<?= isset($item) ? $item['description'] : ''; ?>" required
                    pattern="^[\w\s'\-,.][^_!¡÷/\\+=@#%ˆ&*(){}|~<>;:[\]]{2,}$" />
                <label for="description">Descripción <b class="required-feedback">*</b></label>
                <div class="valid-feedback">Correcto.</div>
                <div class="invalid-feedback">
                    Invalido, debe ingresar una descripción adecuada.
                </div>
            </div>
            <!-- input -->
            <div class="form-floating">
                <input class="form-control" type="text" id="question" name="question" placeholder="Pregunta"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Pregunta"
                    value="<?= isset($item) ? $item['question'] : ''; ?>" required
                    pattern="^[\w\s'\-,.][^_!¡÷/\\+=@#%ˆ&*(){}|~<>;:[\]]{2,}$" />
                <label for="question">Pregunta <b class="required-feedback">*</b></label>
                <div class="valid-feedback">Correcto.</div>
                <div class="invalid-feedback">
                    Invalido, debe ingresar una pregunta adecuada.
                </div>
            </div>
            <!-- Input -->
            <div class="form-floating">
                <input class="form-control only-number" type="text" name="up_votes" placeholder="Votos postivos"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Votos postivos"
                    value="<?= isset($item) ? $item['up_votes'] : ''; ?>" required="" pattern="[0-9]{0,6}" />
                <label for="up_votes">Votos postivos <b class="required-feedback">*</b></label>
                <div class="valid-feedback">Correcto.</div>
                <div class="invalid-feedback">
                    Invalido, debe ingresar votos postivos ej: 25 , 50.
                </div>
            </div>
            <!-- Input -->
            <div class="form-floating">
                <input class="form-control only-number" type="text" name="down_votes" placeholder="Votos negativos"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Votos negativos"
                    value="<?= isset($item) ? $item['down_votes'] : ''; ?>" required="" pattern="[0-9]{0,6}" />
                <label for="down_votes">Votos negativos <b class="required-feedback">*</b></label>
                <div class="valid-feedback">Correcto.</div>
                <div class="invalid-feedback">
                    Invalido, debe ingresar votos negativos ej: 25 , 50.
                </div>
            </div>
            <!-- Input -->
            <div class="form-floating">
                <input class="form-control only-number" type="text" name="total_votes" placeholder="Total de votos"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Total de votos"
                    value="<?= isset($item) ? $item['total_votes'] : ''; ?>" required="" pattern="[0-9]{1,6}" />
                <label for="total_votes">Total de votos <b class="required-feedback">*</b></label>
                <div class="valid-feedback">Correcto.</div>
                <div class="invalid-feedback">
                    Invalido, debe ingresar el total de votos ej: 25 , 50.
                </div>
            </div>

            <!-- select -->
            <div data-bs-toggle="tooltip" data-bs-placement="right" title="Estado" class="mt-3">
                <select class="form-select single-select-clear-field" name="status" id="status"
                    data-placeholder="Estado*" required="">
                    <option value="pending">Pendiente</option>
                    <option value="approved">Aprobado</option>
                    <option value="rejected">Rechazado</option>
                </select>
                <div class="valid-feedback">Correcto.</div>
                <div class="invalid-feedback">
                    Debe seleccionar una estado correspondiente.
                </div>
            </div>
            <!-- required message -->
            <div class="required-feedback">Campos requeridos*.</div>
            <!-- hidden input -->
            <input name="assembly_voting_id" type="hidden"
                value=<?= isset($edit_enabled) ? $item['assembly_voting_id'] : ''; ?>>
            <!-- submit -->
            <div style="margin-top: 20px;">
                <a class="btn btn-secondary btn-lg" role="button" style="width: 39%"
                    href="<?= base_url('assembly_voting') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Atrás">
                    Atrás
                </a><input class="btn btn-primary btn-lg" style="width: 59%; margin-left: 2%" type="submit"
                    value="<?= isset($edit_enabled) ? 'Editar' : 'Guardar'; ?>" data-bs-toggle="tooltip"
                    data-bs-placement="right" title="<?= isset($edit_enabled) ? 'Editar' : 'Guardar'; ?>">
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