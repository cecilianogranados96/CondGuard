<div class="w3-center w3-display-container m-auto" style=" max-width:400px;">
    <div class="col-auto">
        <div class="card card-body">
            <form class="form-floating row g-3">
                <!-- title -->
                <h1>Detalle ingreso</h1>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="relative_vehicle_id"
                        value="<?= $item['relative_vehicle_id'] ?>" readonly />
                    <label for="relative_vehicle_id">Código</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="identity" value="<?= $item['identity'] ?>" readonly />
                    <label for="vehicle_plate">Identificación</label>
                </div>

                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="vehicle_plate" value="<?= $item['vehicle_plate'] ?>"
                        readonly />
                    <label for="vehicle_plate">Placa de vehículo</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="name" value="<?= $item['name'] ?>" readonly />
                    <label for="vehicle_plate">Nombre</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="land_number" value="<?= $item['land_number'] ?>"
                        readonly />
                    <label for="vehicle_plate">Filial</label>
                </div>
                <!-- Input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="datetime-local" id="entry_at" value="<?= $item['entry_at'] ?>"
                        readonly />
                    <label for="entry_at">Entrada actual</label>
                </div>
                <!-- Input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="datetime-local" id="out_at" value="<?= $item['out_at'] ?>"
                        readonly />
                    <label for="out_at">Salida actual</label>
                </div>
                <!-- Input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="datetime-local" id="created_at" value="<?= $item['created_at'] ?>"
                        readonly />
                    <label for="created_at">Fecha de creación</label>
                </div>
                <!-- Input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="datetime-local" id="updated_at" value="<?= $item['updated_at'] ?>"
                        readonly />
                    <label for="updated_at">Fecha de actualización</label>
                </div>
                <!-- Input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="datetime-local" id="deleted_at" value="<?= $item['deleted_at'] ?>"
                        readonly />
                    <label for="deleted_at">Fecha de eliminación</label>
                </div>
            </form>
            <!-- option -->
            <div style="margin-top: 20px;">
                <a class="btn btn-secondary btn-lg" role="button" style="width: 39%"
                    href="<?= base_url('relative_vehicle') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Atrás">
                    Atrás
                </a><a class="btn btn-warning btn-lg" role="button" style="width: 59%; margin-left: 2%"
                    href="<?php echo base_url('relative_vehicle/edit?id=' . $item['relative_vehicle_id']) ?>"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Editar">
                    Editar <i class="far fa-edit"></i>
                </a>
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
</div>