<div class="container d-flex justify-content-center"
    style="margin-top: 4%; margin-bottom: 4%; padding-bottom:60px;padding-top: 20px">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-5 card-body d-flex flex-column align-items-center">
            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg class="bi bi-person"
                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z">
                    </path>
                </svg></div>
            <form action="<?= base_url('administrator/save') ?>" method="post"
                class="row g-3 text-center form-floating needs-validation" novalidate>
                <!-- title -->
                <h2>
                    Perfil
                </h2>
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
                        data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Correo electrónico ej: nombre@mail.com"
                        value="<?= isset($item) ? $item['email'] : ''; ?>" required="" />
                    <label for="email">Correo electrónico <b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar un correo electrónico valido, ej:nombre@mail.com.
                    </div>
                </div>
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control" type="password" id="password" name="password" placeholder="Contraseña"
                        data-bs-toggle="tooltip" data-bs-placement="right"
                        title="La contraseña debe contener almenos 9 caracteres, una mayúscula, una minúscula, un número y un caracter especial."
                        value="<?= isset($item) ? $item['password'] : ''; ?>" required=""
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
                <!-- Error -->
                <?php if (isset($error)) { ?>
                <div class="required-feedback"><?= $error ?></div>
                <?php } ?>
                <!-- required message -->
                <div class="required-feedback">Campos requeridos*.</div>
                <!-- reenter password message -->
                <?php if (isset($item)) { ?>
                <div class="required-feedback">Reingrese la contraseña*.</div>
                <?php } ?>
                <!-- hidden input -->
                <input name="administrator_id" type="hidden"
                    value=<?= isset($edit_enabled) ? $item['administrator_id'] : ''; ?>>
                <!-- submit -->
                <div style="margin-top: 10%"><input class="btn btn-primary btn-lg bg-primary" style="width:100%"
                        type="submit" value="Guardar" data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Guardar" />
                </div>
            </form>
        </div>
    </div>
</div>