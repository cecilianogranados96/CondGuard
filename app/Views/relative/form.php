<div class="col-auto" style="width: 440px">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('relative/save') ?>" method="post" class="row g-3 form-floating needs-validation"
                novalidate>
                <!-- title -->
                <h1>
                    <?= isset($item) ? 'Editar' : 'Nuevo'; ?>
                    Acreditado
                </h1>
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control only-number" type="text" id="identity" name="identity"
                        placeholder="Identificación" data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Identificación en formato 9 dígitos ej:101110111"
                        value="<?= isset($item) ? $item['identity'] : ''; ?>" required="" pattern="[0-9]{9,11}" />
                    <label for="identity">Identificación <b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar identificación valida en formato de 9 a 11 dígitos,
                        ej:101110111.
                    </div>
                </div>
                <!-- select -->
                <div data-bs-toggle="tooltip" data-bs-placement="right" title="Seleccione el condomino que lo acredita">
                    <select class="form-select " name="condo_owner_id" id="single-select-clear-field"
                        data-placeholder="Condomino*" required="" style="font-size: 1px;">
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
                        Debe seleccionar un condomino.
                    </div>
                </div>
                <br />
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control" type="text" id="name" name="name"
                        placeholder="Nombre completo del acreditado" data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Nombre completo" value="<?= isset($item) ? $item['name'] : ''; ?>" required
                        pattern="^(\w\w+[\xE1\xE9\xED\xF3\xFA\xC1\xC9\xCD\xD3\xDA]?)\s(\w+[\xE1\xE9\xED\xF3\xFA\xC1\xC9\xCD\xD3\xDA]?)\s?(\w+[\xE1\xE9\xED\xF3\xFA\xC1\xC9\xCD\xD3\xDA]?)?\s?(\w+[\xE1\xE9\xED\xF3\xFA\xC1\xC9\xCD\xD3\xDA]?)?$" />
                    <label for="name">Nombre Completo <b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar el nombre completo.
                    </div>
                </div>
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control" type="email" name="email" placeholder="Correo electrónico"
                        data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Correo electrónico ej: nombre@mail.com"
                        value="<?= isset($item) ? $item['email'] : ''; ?>" required="" />
                    <label for="email">Correo Electrónico <b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar un correo electrónico valido, ej:nombre@mail.com.
                    </div>
                </div>
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control" type="password" name="password" name="password" placeholder="Contraseña"
                        data-bs-toggle="tooltip" data-bs-placement="right"
                        title="La contraseña debe contener almenos 9 caracteres, una mayúscula, una minúscula, un número y un caracter especial."
                        value="<?= isset($item) ? $item['password'] : ''; ?>" required=""
                        pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,64})" />
                    <label for="password">Contraseña <b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar una contraseña de almenos 9 caracteres, una mayúscula, una minúscula, un
                        número y un caracter especial.
                    </div>
                </div>
                <!-- Input -->
                <div class="form-floating">
                    <input class="form-control only-number" type="text" name="phone" placeholder="Teléfono Móvil"
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Teléfono móvil ej: 88888888"
                        value="<?= isset($item) ? $item['phone'] : ''; ?>" required="" pattern="[0-9]{8,11}" />
                    <label for="phone">Teléfono Móvil <b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar un teléfono móvil de entre 8 y 11 dígitos ej:80008000.
                    </div>
                </div>
                <!-- required message -->
                <div class="required-feedback">Campos requeridos*.</div>
                <!-- hidden input -->
                <input name="relative_id" type="hidden" value=<?= isset($item) ? $item['relative_id'] : ''; ?>>
                <!-- submit -->
                <div style="margin-top: 20px">
                    <a class="btn btn-secondary btn-lg" role="button" style="width: 39%"
                        href="<?= base_url('relative') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Atrás">
                        Atrás </a><input class="btn btn-primary btn-lg" style="width: 59%; margin-left: 2%"
                        type="submit" value="<?= isset($item) ? 'Editar' : 'Guardar'; ?>" data-bs-toggle="tooltip"
                        data-bs-placement="right" title="<?= isset($item) ? 'Editar' : 'Guardar'; ?>" />
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