<div class="col-auto" style="width: 440px">
    <div class="card card-body">
        <form action="<?= base_url('administrator/save') ?>" method="post"
            class="row g-3 form-floating needs-validation" novalidate>
            <!-- title -->
            <h1>
                <?= isset($edit_enabled) ? 'Editar' : 'Nuevo'; ?>
                Administrador
            </h1>
            <!-- input -->
            <div class="form-floating">
                <input class="form-control only-alphanumeric" type="text" id="identity" name="identity"
                    placeholder="Identificación" data-bs-toggle="tooltip" data-bs-placement="right"
                    title="Identificación nacional ej:101110111 o extranjero en el formato correspondiente, sin caracteres especiales o espacios."
                    value="<?= isset($item) ? $item['identity'] : ''; ?>" required="" pattern="^[a-zA-Z0-9]{0,50}$" />
                <label for="identity">Identificación <b class="required-feedback">*</b></label>
                <div class="valid-feedback">Correcto.</div>
                <div class="invalid-feedback">
                    Invalido, debe ingresar identificación valida nacional ej:101110111, o extranjera en el formato
                    correspondiente, sin caracteres especiales o espacios.
                </div>

            </div>
            <!-- input -->
            <div class="form-floating">
                <input class="form-control" type="text" id="name" name="name"
                    placeholder="Nombre completo del acreditado" data-bs-toggle="tooltip" data-bs-placement="right"
                    title="Nombre completo" value="<?= isset($item) ? $item['name'] : ''; ?>" required
                    pattern="^[\w\s'\-,.](?=.*[\s][\w])[^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$" />
                <label for="name">Nombre completo <b class="required-feedback">*</b></label>
                <div class="valid-feedback">Correcto.</div>
                <div class="invalid-feedback">
                    Invalido, debe ingresar el nombre completo.
                </div>
            </div>
            <!-- input -->
            <div class="form-floating">
                <input class="form-control" type="email" id="email" name="email" placeholder="Correo electrónico"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Correo electrónico ej: nombre@mail.com"
                    value="<?= isset($item) ? $item['email'] : ''; ?>" required="" />
                <label for="email">Correo electrónico <b class="required-feedback">*</b></label>
                <div class="valid-feedback">Correcto.</div>
                <div class="invalid-feedback">
                    Inválido, debe ingresar un correo electrónico valido, ej:nombre@mail.com.
                </div>
            </div>
            <!-- input -->
            <div class="form-floating">
                <input class="form-control" type="password" id="password" name="password" placeholder="Contraseña"
                    data-bs-toggle="tooltip" data-bs-placement="right"
                    title="La contraseña debe contener almenos 9 caracteres, una mayúscula, una minúscula, un número y un caracter especial."
                    value="<?= isset($item) ? $item['password'] : ''; ?>"
                    <?= isset($edit_enabled) ? "" : "required=''" ?>
                    pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{9,64})" />
                <label for="password">Contraseña <b class="required-feedback">*</b></label>
                <div class="valid-feedback">Correcto.</div>
                <div class="invalid-feedback">
                    Invalido, debe ingresar una contraseña de almenos 9 caracteres, una mayúscula, una minúscula, un
                    número y un caracter especial.
                </div>
            </div>
            <!-- Input -->
            <div class="form-floating">
                <input class="form-control only-number" type="text" id="phone" name="phone" placeholder="Teléfono móvil"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Teléfono ej: 88888888"
                    value="<?= isset($item) ? $item['phone'] : ''; ?>" required="" pattern="[0-9]{8,11}" />
                <label for="phone">Teléfono móvil <b class="required-feedback">*</b></label>
                <div class="valid-feedback">Correcto.</div>
                <div class="invalid-feedback">
                    Invalido, debe ingresar un teléfono móvil de entre 8 y 11 dígitos ej:80008000.
                </div>
            </div>
            <!-- Error -->
            <?php if (isset($error)) { ?>
            <div class="required-feedback"><?= $error ?></div>
            <?php } ?>
            <!-- required message -->
            <div class="required-feedback">Campos requeridos*.</div>
            <!-- reenter password message -->
            <?php if (isset($item)) { ?>
            <div class="required-feedback">Ingrese una contraseña nueva o deje el campo vacío para mantener la
                anterior*.</div>
            <?php } ?>
            <!-- hidden input -->
            <input name="administrator_id" type="hidden"
                value=<?= isset($edit_enabled) ? $item['administrator_id'] : ''; ?>>
            <!-- submit -->
            <div style="margin-top: 20px;">
                <a class="btn btn-secondary btn-lg" role="button" style="width: 39%"
                    href="<?= base_url('administrator') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
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