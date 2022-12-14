<div class="w3-center w3-display-container m-auto" style=" max-width:400px;">
    <div class="col-auto">
        <div class="card card-body">
            <form class="form-floating row g-3">
                <!-- title -->
                <h1>Detalle Autorizado</h1>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="authorized_id" value="<?= $item['authorized_id'] ?>"
                        readonly />
                    <label for="authorized_id">Código</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="number" id="identity" value="<?= $item['identity'] ?>" readonly />
                    <label for="identity">Identificación</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="condo_owner_id" value="<?php
                                                                                        if ($item['condo_owner_id'] != null) {
                                                                                            $found_key = array_search($item['condo_owner_id'], array_column($relations, 'condo_owner_id'));

                                                                                            echo $relations[$found_key]['land_number'] . '-' . $relations[$found_key]['name'];
                                                                                        }
                                                                                        ?>" readonly />
                    <label for="condo_owner_id">Condómino</label>
                </div>

                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="vehicle_plate" value="<?= $item['vehicle_plate'] ?>"
                        readonly />
                    <label for="name">Placa del vehículo</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="reason" value="<?= $item['reason'] ?>" readonly />
                    <label for="name">Motivo</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="name" value="<?= $item['name'] ?>" readonly />
                    <label for="name">Nombre completo</label>
                </div>
                <!-- Input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="number" id="phone" value="<?= $item['phone'] ?>" readonly />
                    <label for="phone">Teléfono móvil</label>
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
                    <input class="form-control" type="datetime-local" id="out_at" value="<?= $item['expiration_at'] ?>"
                        readonly />
                    <label for="expiration_at">Salida de expiración</label>
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
                    href="<?= base_url('authorized') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Atrás">
                    Atrás
                </a><a class="btn btn-warning btn-lg" role="button" style="width: 59%; margin-left: 2%"
                    href="<?php echo base_url('authorized/edit?id=' . $item['authorized_id']) ?>"
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