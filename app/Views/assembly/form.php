<div class="col-auto" style="width: 440px">
    <div class="card">
        <div class="card-body">
            <!-- Form -->
            <form action="<?= base_url('assembly/save') ?>" method="post" class="row g-3 form-floating needs-validation"
                novalidate>
                <!-- title -->
                <h1><?= isset($edit_enabled) ? 'Editar' : 'Nueva'; ?> Asamblea</h1>
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control" type="text" id="name" name="name" placeholder="Nombre"
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Nombre o descripción de la asamblea."
                        value="<?= isset($item) ? $item['name'] : ''; ?>" required
                        pattern="^[\w\s'\-,.0-9][^_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$" />
                    <label for="name">Nombre<b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar el nombre o descripción de la asamblea.
                    </div>
                </div>
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control" type="text" id="place" name="place" placeholder="Lugar"
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Lugar"
                        value="<?= isset($item) ? $item['place'] : ''; ?>" required
                        pattern="^[\w\s'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$" />
                    <label for="place">Lugar <b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido,una descripción del lugar de la asamblea.
                    </div>
                </div>
                <!-- required message -->
                <div class="required-feedback">Campos requeridos*.</div>
                <!-- hidden input -->
                <input name="assembly_id" type="hidden" value=<?= isset($edit_enabled) ? $item['assembly_id'] : ''; ?>>
                <!-- submit -->
                <div style="margin-top: 20px;">
                    <a class="btn btn-secondary btn-lg" role="button" style="width: 39%"
                        href="<?= base_url('assembly') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Atrás">
                        Atrás
                    </a><input class="btn btn-primary btn-lg" style="width: 59%; margin-left: 2%" type="submit"
                        value="<?= isset($edit_enabled) ? 'Editar' : 'Guardar'; ?>" data-bs-toggle="tooltip"
                        data-bs-placement="right" title="<?= isset($edit_enabled) ? 'Editar' : 'Guardar'; ?>">
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