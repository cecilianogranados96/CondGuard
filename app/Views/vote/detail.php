<div class="w3-center w3-display-container m-auto" style=" max-width:400px;">
    <div class="col-auto">
        <div class="card card-body">
            <form class="form-floating row g-3">
                <!-- title -->
                <h1>Detalle Voto</h1>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="vote_id" value="<?= $item['vote_id'] ?>" readonly />
                    <label for="vote_id">Código</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="assembly_voting_id" value="<?php
                                                                                            if ($item['assembly_voting_id'] != null) {
                                                                                                $found_key = array_search($item['assembly_voting_id'], array_column($relations, 'assembly_voting_id'));

                                                                                                echo $relations[$found_key]['assembly_voting_id'] . '-' . $relations[$found_key]['question'];
                                                                                            }

                                                                                            ?>" readonly />
                    <label for="common_area_id">Votación</label>
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
                    <input class="form-control" type="text" id="status"
                        value="<?= $item['answer'] == 1 ? "A favor" : "En contra"; ?>" readonly />
                    <label for="status">Respuesta</label>
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
                <a class="btn btn-secondary btn-lg" role="button" style="width: 39%" href="<?= base_url('vote') ?>"
                    data-bs-toggle="tooltip" data-bs-placement="left" title="Atrás">
                    Atrás
                </a><a class="btn btn-warning btn-lg" role="button" style="width: 59%; margin-left: 2%"
                    href="<?php echo base_url('vote/edit?id=' . $item['vote_id']) ?>" data-bs-toggle="tooltip"
                    data-bs-placement="right" title="Editar">
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