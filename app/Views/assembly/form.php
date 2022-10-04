<div class="col-auto" style="width: 440px">
    <div class="card">
        <div class="card-body">
            <!-- Form -->
            <form action="<?= base_url('assembly/save') ?>" method="post">
                <!-- title -->
                <h1><?= isset($item) ? 'Editar' : 'Nueva'; ?> Asamblea</h1>
                <!-- input -->
                <label class="control-label py-1">Nombre</label>
                <input class="form-control" type="text" name="name" placeholder="Nombre" data-bs-toggle="tooltip"
                    data-bs-placement="right" title="Nombre de la asamblea"
                    value="<?= isset($item) ? $item['name'] : ''; ?>" required="" />
                <!-- input -->
                <label class="control-label py-1">Lugar</label>
                <input class="form-control" type="text" name="place"
                    placeholder="Especificar el lugar donde se realiza la asamblea" data-bs-toggle="tooltip"
                    data-bs-placement="right" title="Lugar" value="<?= isset($item) ? $item['place'] : ''; ?>"
                    required="" />
                <!-- hidden input -->
                <input name="assembly_id" type="hidden" value=<?= isset($item) ? $item['assembly_id'] : ''; ?>>
                <!-- submit -->
                <div style="margin-top: 20px;">
                    <a class="btn btn-secondary btn-lg" role="button" style="width: 39%"
                        href="<?= base_url('assembly') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
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