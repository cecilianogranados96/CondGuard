<div class="col-auto" style="width: 440px">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('administrator/save') ?>" method="post">
                <!-- title -->
                <h1><?= isset($item) ? 'Editar' : 'Nuevo'; ?> Administrador</h1>
                <!-- input -->
                <label class="control-label py-1">Identificación</label>
                <input class="form-control" type="number" name="identity" placeholder="Identificación"
                    data-bs-toggle="tooltip" data-bs-placement="right"
                    title="Identificación en formato 9 dígitos Ej:101110111"
                    value="<?= isset($item) ? $item['identity'] : ''; ?>" required="" />
                <!-- input -->
                <label class="control-label py-1">Nombre Completo</label>
                <input class="form-control" type="text" name="name" placeholder="Nombre Completo"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Nombre Completo del administrator"
                    value="<?= isset($item) ? $item['name'] : ''; ?>" required="" />
                <!-- input -->
                <label class="control-label py-1">Correo Electrónico</label>
                <input class="form-control" type="email" name="email" placeholder="Correo Electrónico"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Correo Electrónico Ej: nombre@mail.com"
                    value="<?= isset($item) ? $item['email'] : ''; ?>" required="" />
                <!-- input -->
                <label class="control-label py-1">Contraseña</label>
                <input class="form-control" type="password" name="password" placeholder="Contraseña"
                    data-bs-toggle="tooltip" data-bs-placement="right"
                    title="La contraseña debe contener almenos 9 caracteres, una mayúscula, una minúscula, un número y un caracter especial."
                    value="<?= isset($item) ? $item['password'] : ''; ?>" required="" />
                <!-- Input -->
                <label class="control-label py-1">Teléfono Móvil</label>
                <input class="form-control" type="number" name="phone" placeholder="Teléfono Móvil"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Teléfono Móvil Ej: 88888888"
                    value=<?= isset($item) ? $item['phone'] : ''; ?> required="" />
                <!-- hidden input -->
                <input name="administrator_id" type="hidden"
                    value=<?= isset($item) ? $item['administrator_id'] : ''; ?>>
                <!-- submit -->
                <div style="margin-top: 20px;">
                    <a class="btn btn-secondary btn-lg" role="button" style="width: 39%"
                        href="<?= base_url('administrator') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Atrás">
                        Atrás
                    </a><input class="btn btn-primary btn-lg" style="width: 59%; margin-left: 2%" type="submit"
                        value="<?= isset($item) ? 'Editar' : 'Guardar'; ?>" data-bs-toggle="tooltip"
                        data-bs-placement="right" title="<?= isset($item) ? 'Editar' : 'Guardar'; ?>">
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