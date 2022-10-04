<div class="col-auto" style="width: 440px">
    <div class="card">
        <div class="card-body">
            <!-- form -->
            <form action="<?= base_url('common_area/save') ?>" method="post">
                <!-- title -->
                <h1><?= isset($item) ? 'Editar' : 'Nuevo'; ?> Área común</h1>
                <!-- input -->
                <label class="control-label py-1">Nombre</label>
                <input class="form-control" type="text" name="name" placeholder="Nombre" data-bs-toggle="tooltip"
                    data-bs-placement="right" title="Nombre del área común"
                    value="<?= isset($item) ? $item['name'] : ''; ?>" required="" />
                <!-- input -->
                <label class="control-label py-1">Dirección</label>
                <input class="form-control" type="text" name="address" placeholder="Dirección" data-bs-toggle="tooltip"
                    data-bs-placement="right" title="Dirección básica"
                    value="<?= isset($item) ? $item['address'] : ''; ?>" required="" />
                <!-- input -->
                <label class="control-label py-1">Capacidad de filiales</label>
                <input class="form-control" type="number" name="condo_capacity" placeholder="Capacidad de filiales"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Capacidad de filiales del área común"
                    min="1" value="<?= isset($item) ? $item['condo_capacity'] : ''; ?>" required="" />
                <!-- input -->
                <label class="control-label py-1">Capacidad de personas</label>
                <input class="form-control" type="number" name="people_capacity" placeholder="Capacidad de personas"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Capacidad de personas del área común"
                    min="1" value="<?= isset($item) ? $item['people_capacity'] : ''; ?>" required="" />
                <!-- input -->
                <label class="control-label py-1">Estado</label>
                <input class="form-control" type="text" name="status" placeholder="Estado" data-bs-toggle="tooltip"
                    data-bs-placement="right" title="Estado del área común"
                    value="<?= isset($item) ? $item['status'] : ''; ?>" required="" />
                <!-- hidden input -->
                <input name="common_area_id" type="hidden" value=<?= isset($item) ? $item['common_area_id'] : ''; ?>>
                <!-- submit -->
                <div style="margin-top: 20px;">
                    <a class="btn btn-secondary btn-lg" role="button" style="width: 39%"
                        href="<?= base_url('common_area') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
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