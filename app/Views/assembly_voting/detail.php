<div class="col-auto" style="width: 440px">
    <div class="card">
        <div class="card-body">
            <form class="form-floating">
                <!-- title -->
                <h1>Detalle Votación</h1>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="assembly_voting_id"
                        value="<?= $item['assembly_voting_id'] ?>" readonly />
                    <label for="assembly_voting_id">Código</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="assembly_id" value="<?php
                                                                                    if ($item['assembly_id'] != null) {
                                                                                        $found_key = array_search($item['assembly_id'], array_column($relations, 'assembly_id'));

                                                                                        echo $relations[$found_key]['name'] . '-' . $relations[$found_key]['place'];
                                                                                    }

                                                                                    ?>" readonly />
                    <label for="assembly_id">Asamblea</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="description" value="<?= $item['description'] ?>"
                        readonly />
                    <label for="description">Descripción</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="question" value="<?= $item['question'] ?>" readonly />
                    <label for="question">Pregunta</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="number" id="up_votes" value="<?= $item['up_votes'] ?>" readonly />
                    <label for="up_votes">Votos positivos</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="number" id="down_votes" value="<?= $item['down_votes'] ?>"
                        readonly />
                    <label for="down_votes">Votos negativos</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="number" id="total_votes" value="<?= $item['total_votes'] ?>"
                        readonly />
                    <label for="total_votes">Total de votos</label>
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
                    href="<?= base_url('assembly_voting') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Atrás">
                    Atrás
                </a><a class="btn btn-warning btn-lg" role="button" style="width: 59%; margin-left: 2%"
                    href="<?php echo base_url('assembly_voting/edit?id=' . $item['assembly_voting_id']) ?>"
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