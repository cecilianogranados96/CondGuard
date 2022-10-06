<div class="col-auto" style="width: 440px">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('relative_vehicle/save') ?>" method="post"
                class="row g-3 form-floating needs-validation" novalidate>
                <!-- timezone-->
                <?php date_default_timezone_set('America/Costa_Rica');
                                ?>

                <!-- title -->
                <h1>
                    <?= isset($edit_enabled) ? 'Editar' : 'Nueva'; ?>
                    Vehículo
                </h1>
                <!-- select -->
                <div data-bs-toggle="tooltip" data-bs-placement="right" title="Seleccione el acreditado que va reserva">
                    <select class="form-select single-select-clear-field" name="relative_id" id="relative_id"
                        data-placeholder="Acreditado*" required="" style="font-size: 1px;">
                        <option></option>
                        <?php foreach ($relations as $relation) :
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
                    <input class="form-control only-alphanumeric" type="text" id="vehicle_plate" name="vehicle_plate"
                        placeholder="Placa de vehículo" data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Placa de vehículo ej: AAA888" value="<?= isset($item) ? $item['vehicle_plate'] : ''; ?>"
                        required="" pattern="^[a-zA-Z0-9]{6,9}$" />
                    <label for="vehicle_plate">Placa de vehículo <b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar placa válida 6 y 11 caracteres ej:AAA888.
                    </div>
                </div>
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control" type="text" id="description" name="description" placeholder="Motivo"
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Descripción"
                        value="<?= isset($item) ? $item['description'] : ''; ?>" required
                        pattern="^[\w\s'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$" />
                    <label for="description">Descripción <b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar una descripción adecuada.
                    </div>
                </div>
                <!-- Error -->
                <?php if (isset($error)) { ?>
                <div class="required-feedback"><?= $error ?></div>
                <?php } ?>
                <!-- required message -->
                <div class="required-feedback">Campos requeridos*.</div>
                <!-- hidden input -->
                <input name="relative_vehicle_id" type="hidden"
                    value=<?= isset($edit_enabled) ? $item['relative_vehicle_id'] : ''; ?>>
                <!-- submit -->
                <div style="margin-top: 20px">
                    <a class="btn btn-secondary btn-lg" role="button" style="width: 39%"
                        href="<?= base_url('relative_vehicle') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Atrás">
                        Atrás </a><input class="btn btn-primary btn-lg" style="width: 59%; margin-left: 2%"
                        type="submit" value="<?= isset($edit_enabled) ? 'Editar' : 'Guardar'; ?>"
                        data-bs-toggle="tooltip" data-bs-placement="right"
                        title="<?= isset($edit_enabled) ? 'Editar' : 'Guardar'; ?>" />
                </div>
            </form>
        </div>
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