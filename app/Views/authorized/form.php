<div class="w3-center w3-display-container m-auto" style=" max-width:400px;">
    <div class="col-auto">
        <div class="card card-body">
            <form action="<?= base_url('authorized/save') ?>" method="post"
                class="row g-3 form-floating needs-validation" novalidate>
                <!-- timezone-->
                <?php date_default_timezone_set('America/Costa_Rica');
                ?>

                <!-- title -->
                <h1>
                    <?= isset($edit_enabled) ? 'Editar' : 'Nuevo'; ?>
                    Autorizado
                </h1>
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control only-alphanumeric" type="text" id="identity" name="identity"
                        placeholder="Identificación" data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Identificación nacional ej:101110111 o extranjero en el formato correspondiente, sin caracteres especiales o espacios."
                        value="<?= isset($item) ? $item['identity'] : ''; ?>" required=""
                        pattern="^[a-zA-Z0-9]{0,50}$" />
                    <label for="identity">Identificación <b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar identificación valida nacional ej:101110111, o extranjera en el
                        formato
                        correspondiente, sin caracteres especiales o espacios.
                    </div>

                </div>

                <!-- select -->
                <div data-bs-toggle="tooltip" data-bs-placement="right" title="Seleccione el condomino que lo autoriza">
                    <select class="form-select single-select-clear-field" name="condo_owner_id" id="condo_owner_id"
                        data-placeholder="Condómino*" required="" style="font-size: 1px;">
                        <option></option>
                        <?php foreach ($relations as $relation) :
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
                            <?= $relation['identity'] . ' - ' . $relation['name'] . ' - ' . $relation['land_number'] ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Debe seleccionar un condómino.
                    </div>
                </div>
                <br />
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control" type="text" id="name" name="name"
                        placeholder="Nombre completo del autorizado" data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Nombre completo" value="<?= isset($item) ? $item['name'] : ''; ?>" required
                        pattern="^[\w\s'\-,.](?=.*[\s][\w])[^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$" />
                    <label for="name">Nombre completo <b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar el nombre completo.
                    </div>
                </div>
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
                    <input class="form-control" type="text" id="reason" name="reason" placeholder="Motivo"
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Motivo"
                        value="<?= isset($item) ? $item['reason'] : ''; ?>" required
                        pattern="^[\w\s'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$" />
                    <label for="reason">Motivo <b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar un motivo adecuado.
                    </div>
                </div>
                <!-- Input -->
                <div class="form-floating">
                    <input class="form-control only-number" type="text" id="phone" name="phone"
                        placeholder="Teléfono móvil" data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Teléfono ej: 88888888" value="<?= isset($item) ? $item['phone'] : ''; ?>" required=""
                        pattern="[0-9]{8,11}" />
                    <label for="phone">Teléfono móvil <b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar un teléfono móvil de entre 8 y 11 dígitos ej:80008000.
                    </div>
                </div>
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
                <!-- Input -->
                <div class="form-floating">
                    <?php
                    $date_expiration = null;
                    if (isset($item)) {
                        if ($item['expiration_at'] != null) {
                            $time_input = strtotime($item['expiration_at']);
                            $date_input = getDate($time_input);
                            if ($date_input['year'] != '-1') {
                                $date_expiration = $date_input['year'] . $date_input['mon'] . $date_input['mday'];
                            } else {
                                $date_expiration = date('Y-m-d');
                            }
                        }
                    }
                    ?>
                    <input class="form-control" type="datetime-local" id="expiration_at" name="expiration_at"
                        placeholder="Fecha de expiración" data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Fecha de expiración ej: <?= date('Y-m-d H:i:s') ?>"
                        value="<?= isset($item) ? $item['expiration_at'] : ''; ?>"
                        min="<?= isset($item) ? $date_expiration : date('Y-m-d') ?>T00:00"
                        max="<?= date('Y-m-d', strtotime('+1 year')) ?>T00:00" />
                    <label for="expiration_at">Fecha de expiración </label>
                    <!--<div class="valid-feedback">Correcto.</div>-->
                    <div class="invalid-feedback">
                        Invalido, debe ingresar una fecha válida ej:<?= date('Y-m-d H:i:s') ?>.
                    </div>
                </div>
                <!-- Error -->
                <?php if (isset($error)) { ?>
                <div class="form-floating required-feedback mt-3">
                    <div class="alert alert-warning d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle mr-3"></i>
                        <div style="color: black;">
                            <?= $error ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <br><br>
                <!-- required message -->
                <div class="required-feedback">Campos requeridos*.</div>

                <!-- hidden input -->
                <input name="authorized_id" type="hidden"
                    value=<?= isset($edit_enabled) ? $item['authorized_id'] : ''; ?>>
                <!-- submit -->
                <div style="margin-top: 20px">
                    <a class="btn btn-secondary btn-lg" role="button" style="width: 39%"
                        href="<?= base_url('authorized') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Atrás">
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