<div class="container-fluid my-auto" style="
        display: flex;
        align-items: center;
        justify-content: center;">
    <div class="col-auto" style="width: 440px">
        <div class="card">
            <div class="card-body">
                <form class="form-floating">
                    <!-- title -->
                    <h1>Detalle Área Común</h1>
                    <!-- input -->
                    <div class="form-floating mb-1">
                        <input class="form-control" type="text" id="relative_id" value="<?= $item['common_area_id'] ?>"
                            readonly />
                        <label for="relative_id">Código</label>
                    </div>
                    <!-- input -->
                    <div class="form-floating mb-1">
                        <input class="form-control" type="text" id="name" value="<?= $item['name'] ?>" readonly />
                        <label for="name">Nombre</label>
                    </div>
                    <!-- input -->
                    <div class="form-floating mb-1">
                        <input class="form-control" type="number" id="condo_capacity"
                            value="<?= $item['condo_capacity'] ?>" readonly />
                        <label for="condo_capacity">Capacidad de filiales</label>
                    </div>
                    <!-- input -->
                    <div class="form-floating mb-1">
                        <input class="form-control" type="number" id="people_capacity"
                            value="<?= $item['people_capacity'] ?>" readonly />
                        <label for="people_capacity">Capacidad de personas</label>
                    </div>
                    <!-- input -->
                    <div class="form-floating mb-1">
                        <input class="form-control" type="text" id="status" value="<?= $item['status'] ?>" readonly />
                        <label for="status">Estado</label>
                    </div>
                    <!-- Input -->
                    <div class="form-floating mb-1">
                        <input class="form-control" type="datetime-local" id="created_at"
                            value="<?= $item['created_at'] ?>" readonly />
                        <label for="created_at">Fecha de creación</label>
                    </div>
                    <!-- Input -->
                    <div class="form-floating mb-1">
                        <input class="form-control" type="datetime-local" id="updated_at"
                            value="<?= $item['updated_at'] ?>" readonly />
                        <label for="updated_at">Fecha de actualización</label>
                    </div>
                    <!-- Input -->
                    <div class="form-floating mb-1">
                        <input class="form-control" type="datetime-local" id="deleted_at"
                            value="<?= $item['deleted_at'] ?>" readonly />
                        <label for="deleted_at">Fecha de eliminación</label>
                    </div>
                </form>
                <!-- option -->
                <div style="margin-top: 20px;">
                    <a class="btn btn-secondary btn-lg" role="button" style="width: 39%"
                        href="<?= base_url('common_area') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Atrás">
                        Atrás
                    </a><a class="btn btn-warning btn-lg" role="button" style="width: 59%; margin-left: 2%"
                        href="<?php echo base_url('common_area/edit?id=' . $item['common_area_id']) ?>"
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Editar">
                        Editar <i class="far fa-edit"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100 d-xl-none d-xxl-none" style="margin: 4%"></div>
    <div class="col ">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Imagen</h4>

                <img src=<?= isset($item) ? '/assets/img/common_areas/' . $item['image'] : '' ?>
                    alt="Vista previa de imagen." id="preview-image" class="img-fluid hideImage" width="55%"
                    style="margin-top: 15px;">
            </div>
        </div>
    </div>
</div>