<div class="container d-flex justify-content-center"
    style="margin-top: 4%; margin-bottom: 4%; padding-bottom:60px;padding-top: 20px">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-5 card-body d-flex flex-column align-items-center">

            <form class="row g-3 text-center form-floating needs-validation">
                <!-- title -->
                <h2>
                    Perfil
                </h2>
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control only-alphanumeric" type="text" id="identity" name="identity"
                        placeholder="Identificación" data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Identificación nacional ej:101110111 o extranjero en el formato correspondiente, sin caracteres especiales o espacios."
                        value="<?= isset($item) ? $item['identity'] : ''; ?>" readonly pattern="^[a-zA-Z0-9]{0,50}$" />
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
                        title="Nombre completo" value="<?= isset($item) ? $item['name'] : ''; ?>" readonly
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
                        title="Teléfono ej: 88888888" value="<?= isset($item) ? $item['phone'] : ''; ?>" readonly
                        pattern="[0-9]{8,11}" />
                    <label for="phone">Teléfono móvil <b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar un teléfono móvil de entre 8 y 11 dígitos ej:80008000.
                    </div>
                </div>
                <!-- hidden input -->
                <input name="officer_id" type="hidden" value=<?= isset($edit_enabled) ? $item['officer_id'] : ''; ?>>
                <!-- hidden input -->
                <input name="profile" type="hidden" value="profile">
        </div>
        </form>
    </div>
</div>
</div>