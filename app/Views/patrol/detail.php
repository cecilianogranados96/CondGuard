<div class="col-auto" style="width: 440px">
    <div class="card">
        <div class="card-body">
            <form class="form-floating">
                <!-- title -->
                <h1>Detalle Patrulla</h1>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="patrol_id" value="<?= $item['patrol_id'] ?>" readonly />
                    <label for="patrol_id">Código</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="officer_id" value="<?php
                                                                                    if ($item['officer_id'] != null) {
                                                                                        $found_key = array_search($item['officer_id'], array_column($relations, 'officer_id'));

                                                                                        echo $relations[$found_key]['identity'] . '-' . $relations[$found_key]['name'];
                                                                                    }

                                                                                    ?>" readonly />
                    <label for="officer_id">Oficial</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="longitude" value="<?= $item['longitude'] ?>" readonly>
                    <label for="longitude">Longitud</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="latitude" value="<?= $item['latitude'] ?>" readonly>
                    <label for="latitude">Latitud</label>
                </div>
                <!-- input -->
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" id="code" value="<?= $item['code'] ?>" readonly />
                    <label for="name">Código QR</label>
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
                    <label for="deleted_at">Fecha de elimincación</label>
                </div>
            </form>
            <!-- option -->
            <div style="margin-top: 20px;">
                <a class="btn btn-secondary btn-lg" role="button" style="width: 39%" href="<?= base_url('patrol') ?>"
                    data-bs-toggle="tooltip" data-bs-placement="left" title="Atrás">
                    Atrás
                </a><a class="btn btn-warning btn-lg" role="button" style="width: 59%; margin-left: 2%"
                    href="<?php echo base_url('patrol/edit?id=' . $item['patrol_id']) ?>" data-bs-toggle="tooltip"
                    data-bs-placement="right" title="Editar">
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
            <h4 class="card-title">Mapa</h4>
            <div class="mapouter">
                <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no"
                        marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Hacienda el coyol&amp;t=k&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                        href="https://mcpenation.com/">Minecraft Website</a></div>
                <style>
                .mapouter {
                    position: relative;
                    text-align: right;
                    width: 100%;
                    height: 400px;
                }

                .gmap_canvas {
                    overflow: hidden;
                    background: none !important;
                    width: 100%;
                    height: 400px;
                }

                .gmap_iframe {
                    height: 400px !important;
                }
                </style>
            </div>
        </div>
    </div>
</div>