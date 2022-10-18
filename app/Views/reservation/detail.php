<div class="col-auto" style="width: 440px">
    <div class="card">
        <div class="card-body">
            <form class="form-floating">
                <!-- title -->
                <h1>Detalle Reservación</h1>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="reservation_id" value="<?= $item['reservation_id'] ?>"
                        readonly />
                    <label for="reservation_id">Código</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="common_area_id" value="<?php
                                                                                        if ($item['common_area_id'] != null) {
                                                                                            $found_key = array_search($item['common_area_id'], array_column($relations, 'common_area_id'));

                                                                                            echo $relations[$found_key]['name'] . '-' . $relations[$found_key]['status'];
                                                                                        }

                                                                                        ?>" readonly />
                    <label for="common_area_id">Área común</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="condo_owner_id" value="<?php
                                                                                        if ($item['condo_owner_id'] != null) {
                                                                                            $found_key = array_search($item['condo_owner_id'], array_column($relations2, 'condo_owner_id'));

                                                                                            echo $relations2[$found_key]['land_number'] . '-' . $relations2[$found_key]['name'];
                                                                                        }
                                                                                        ?>" readonly />
                    <label for="condo_owner_id">Condomino</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="relative_id" value="<?php
                                                                                    if ($item['relative_id'] != null) {
                                                                                        $found_key = array_search($item['relative_id'], array_column($relations3, 'relative_id'));

                                                                                        echo $relations3[$found_key]['identity'] . '-' . $relations3[$found_key]['name'];
                                                                                    }
                                                                                    ?>" readonly />
                    <label for="relative_id">Acreditado</label>
                </div>
                <!-- Input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="datetime-local" id="entry_at" value="<?= $item['entry_at'] ?>"
                        readonly />
                    <label for="entry_at">Entrada</label>
                </div>
                <!-- Input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="datetime-local" id="out_at" value="<?= $item['out_at'] ?>"
                        readonly />
                    <label for="out_at">Salida</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="status" value="<?= $item['status'] ?>" readonly />
                    <label for="status">Estado</label>
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
                    href="<?= base_url('reservation') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Atrás">
                    Atrás
                </a><a class="btn btn-warning btn-lg" role="button" style="width: 59%; margin-left: 2%"
                    href="<?php echo base_url('reservation/edit?id=' . $item['reservation_id']) ?>"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Editar">
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