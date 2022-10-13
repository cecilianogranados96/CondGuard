<div class="col-auto" style="width: 440px">
    <div class="card card-body">
        <form action="<?= base_url('reservation/save') ?>" method="post" class="row g-3 form-floating needs-validation"
            novalidate>
            <!-- timezone-->
            <?php date_default_timezone_set('America/Costa_Rica');
            ?>

            <!-- title -->
            <h1>
                <?= isset($edit_enabled) ? 'Editar' : 'Nueva'; ?>
                Reservación
            </h1>
            <!-- select -->
            <div data-bs-toggle="tooltip" data-bs-placement="right" title="Seleccione la área común que reserva">
                <select class="form-select single-select-clear-field" name="common_area_id" id="common_area_id"
                    data-placeholder="Área común*" required="" style="font-size: 1px;">
                    <option></option>
                    <?php foreach ($relations as $relation) :
                        $selected = '';
                        if (isset($item)) {
                            if ($relation['common_area_id'] == $item['common_area_id']) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }
                        }
                    ?>
                    <option <?= "$selected" ?> value="<?= $relation['common_area_id'] ?>">
                        <?= $relation['name'] . ' - ' . $relation['status']  ?>
                    </option>
                    <?php endforeach ?>
                </select>
                <div class="valid-feedback">Correcto.</div>
                <div class="invalid-feedback">
                    Debe seleccionar una área común.
                </div>
            </div>
            <br />
            <!-- select -->
            <div data-bs-toggle="tooltip" data-bs-placement="right" title="Seleccione el condómino que va reservar">
                <select class="form-select single-select-clear-field" name="condo_owner_id" id="condo_owner_id"
                    data-placeholder="Condómino*" required="" style="font-size: 1px;">
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
                    Debe seleccionar un condómino.
                </div>
            </div>
            <br />
            <!-- select -->
            <div data-bs-toggle="tooltip" data-bs-placement="right" title="Seleccione el acreditado que va reserva">
                <select class="form-select single-select-clear-field" name="relative_id" id="relative_id"
                    data-placeholder="Acreditado*" required="" style="font-size: 1px;">
                    <option></option>
                    <?php foreach ($relations3 as $relation) :
                        $selected = '';
                        if (isset($item)) {
                            if ($relation['relative_id'] == $item['relative_id']) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }
                        }
                    ?>
                    <option <?= "$selected" ?> value="<?= $relation['relative_id'] ?>">
                        <?= $relation['identity'] . ' - ' . $relation['name'] ?>
                    </option>
                    <?php endforeach ?>
                </select>
                <div class="valid-feedback">Correcto.</div>
                <div class="invalid-feedback">
                    Debe seleccionar un acreditado.
                </div>
            </div>
            <br />
            <!-- Input -->
            <div class="form-floating">
                <?php
                $date_entry = null;
                if (isset($item)) {
                    if ($item['entry_at'] != null) {
                        $time_input = strtotime($item['entry_at']);
                        $date_input = getDate($time_input);
                        if ($date_input['year'] != '-1') {
                            $date_entry = $date_input['year'] . $date_input['mon'] . $date_input['mday'];
                        } else {
                            $date_entry = date('Y-m-d');
                        }
                    }
                }
                ?>
                <input class="form-control" type="datetime-local" id="entry_at" name="entry_at"
                    placeholder="Fecha de entrada" data-bs-toggle="tooltip" data-bs-placement="right"
                    title="Fecha de entrada ej: <?= date('Y-m-d H:i:s') ?>"
                    value="<?= isset($item) ? $item['entry_at'] : ''; ?>"
                    min="<?= isset($item) ? $date_entry : date('Y-m-d') ?>T00:00"
                    max="<?= date('Y-m-d', strtotime('+1 year')) ?>T00:00" />

                <label for="entry_at">Fecha de entrada </label>
                <!--<div class="valid-feedback">Correcto.</div>-->
                <div class="invalid-feedback">
                    Invalido, debe ingresar una fecha válida ej:<?= date('Y-m-d H:i:s') ?>.
                </div>
            </div>
            <!-- Input -->
            <div class="form-floating">
                <?php
                $date_out = null;
                if (isset($item)) {
                    if ($item['out_at'] != null) {
                        $time_input = strtotime($item['out_at']);
                        $date_input = getDate($time_input);
                        if ($date_input['year'] != '-1') {
                            $date_out = $date_input['year'] . $date_input['mon'] . $date_input['mday'];
                        } else {
                            $date_out = date('Y-m-d');
                        }
                    }
                }
                ?>
                <input class="form-control" type="datetime-local" id="out_at" name="out_at"
                    placeholder="Fecha de salida" data-bs-toggle="tooltip" data-bs-placement="right"
                    title="Fecha de salida ej: <?= date('Y-m-d H:i:s') ?>"
                    value="<?= isset($item) ? $item['out_at'] : ''; ?>"
                    min="<?= isset($item) ? $date_out : date('Y-m-d') ?>T00:00"
                    max="<?= date('Y-m-d', strtotime('+1 year')) ?>T00:00" />
                <label for="out_at">Fecha de salida </label>
                <!--<div class="valid-feedback">Correcto.</div>-->
                <div class="invalid-feedback">
                    Invalido, debe ingresar una fecha válida ej:<?= date('Y-m-d H:i:s') ?>.
                </div>
            </div>
            <!-- input -->
            <div class="form-floating">
                <input class="form-control only-alphanumeric" type="text" id="status" name="status" placeholder="Estado"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Estado correspondiente."
                    value="<?= isset($item) ? $item['status'] : ''; ?>" required
                    pattern="^[\w\s'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$" />
                <label for="status">Estado <b class="required-feedback">*</b></label>
                <div class="valid-feedback">Correcto.</div>
                <div class="invalid-feedback">
                    Invalido, debe ingresar estado correspondiente.
                </div>
            </div>
            <!-- required message -->
            <div class="required-feedback">Campos requeridos*.</div>
            <!-- hidden input -->
            <input name="reservation_id" type="hidden"
                value=<?= isset($edit_enabled) ? $item['reservation_id'] : ''; ?>>
            <!-- submit -->
            <div style="margin-top: 20px">
                <a class="btn btn-secondary btn-lg" role="button" style="width: 39%"
                    href="<?= base_url('reservation') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Atrás">
                    Atrás </a><input class="btn btn-primary btn-lg" style="width: 59%; margin-left: 2%" type="submit"
                    value="<?= isset($edit_enabled) ? 'Editar' : 'Guardar'; ?>" data-bs-toggle="tooltip"
                    data-bs-placement="right" title="<?= isset($edit_enabled) ? 'Editar' : 'Guardar'; ?>" />
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