<div class="col-auto" style="width: 440px">
    <div class="card">
        <div class="card-body">
            <!-- title -->
            <h1>Detalle Área común</h1>
            <!-- input -->
            <label class="control-label py-1">Código</label>
            <input class="form-control" type="number" value="<?= $item['common_area_id'] ?>" readonly />
            <!-- input -->
            <label class="control-label py-1">Nombre</label>
            <input class="form-control" type="text" value="<?= $item['name'] ?>" readonly />
            <!-- input -->
            <label class="control-label py-1">Capacidad de filiales</label>
            <input class="form-control" value="<?= $item['condo_capacity'] ?>" readonly />
            <!-- Input -->
            <label class="control-label py-1">Capacidad de personas</label>
            <input class="form-control" type="number" value=<?= $item['people_capacity'] ?> readonly />
            <!-- input -->
            <label class="control-label py-1">Estado</label>
            <input class="form-control" type="text" value="<?= $item['status'] ?>" readonly />
            <!-- Input -->
            <label class="control-label py-1">Fecha de creación</label>
            <input class="form-control" type="datetime-local" value="<?= $item['created_at'] ?>" readonly />
            <!-- Input -->
            <label class="control-label py-1">Fecha de actualización</label>
            <input class="form-control" type="datetime-local" value="<?= $item['updated_at'] ?>" readonly />
            <!-- Input -->
            <label class="control-label py-1">Fecha de eliminación</label>
            <input class="form-control" type="datetime-local" value="<?= $item['deleted_at'] ?>" readonly />
            <!-- option -->
            <div style="margin-top: 20px;">
                <a class="btn btn-secondary btn-lg" role="button" style="width: 39%"
                    href="<?= base_url('common_area') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Atrás">
                    Atrás
                </a><a class="btn btn-warning btn-lg" role="button" style="width: 59%; margin-left: 2%"
                    href="<?php echo base_url('common_area/edit?id=' . $item['common_area_id']) ?>"
                    data-bs-toggle="tooltip" data-bs-placement="left" title="Atrás">
                    Editar <i class="far fa-edit"></i>
                </a>
            </div>
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