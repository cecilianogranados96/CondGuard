<div class="w3-center w3-display-container m-auto" style=" max-width:400px;">
    <div class="col-auto">
        <div class="card card-body">
            <form action="<?= base_url('officer/save') ?>" method="post" class="row g-3 form-floating needs-validation"
                novalidate>
                <!-- timezone-->
                <?php date_default_timezone_set('America/Costa_Rica');
                ?>

                <!-- title -->
                <h1>
                    <?= isset($edit_enabled) ? 'Editar' : 'Nuevo'; ?>
                    Oficial
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
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control" type="text" id="name" name="name"
                        placeholder="Nombre completo del oficial" data-bs-toggle="tooltip" data-bs-placement="right"
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
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control only-number " type="password" id="pin" name="pin" placeholder="Pin"
                        data-bs-toggle="tooltip" data-bs-placement="right"
                        value="<?= isset($item) ? $item['phone'] : ''; ?>"
                        title="Ingrese su pin de seguridad para realizar su voto, formato de 10 dígitos." required=''
                        pattern="[0-9]{8,10}" />
                    <label for="pin">Pin de acceso<b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar un pin de seguridad máximo 10 dígitos.
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
                <input name="officer_id" type="hidden" value=<?= isset($edit_enabled) ? $item['officer_id'] : ''; ?>>
                <!-- submit -->
                <div style="margin-top: 20px">
                    <a class="btn btn-secondary btn-lg" role="button" style="width: 39%"
                        href="<?= base_url('officer') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
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