<div class="col">
    <div class="card card-body">
        <a href="<?php echo base_url('patrol/new') ?>" class="btn btn-primary" role="button"
            style="font-size: 30px; margin-bottom: 10px;" data-bs-toggle="tooltip" title="Nuevo">Nueva patrulla <i
                class="fa fa-plus fs-2"></i></a>
        <!--DATA TABLE-->
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered" style="width: 100%">

                <thead>
                    <tr>
                        <th>Oficial</th>
                        <th>Latitud</th>
                        <th>Longitud</th>
                        <th>Código QR</th>
                        <th>Fecha de creación</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item) : ?>
                    <tr>
                        <td>
                            <?php
                                $found_key = array_search($item['officer_id'], array_column($relations, 'officer_id'));

                                echo $relations[$found_key]['identity'] . '-' . $relations[$found_key]['name'];

                                ?>
                        </td>
                        <td><?= $item['latitude'] ?></td>
                        <td><?= $item['longitude'] ?> </td>
                        <td style="width:100px;"><?= $item['code'] ?> </td>
                        <td><?= $item['created_at'] ?> </td>
                        <td>
                            <a href="<?php echo base_url('patrol/detail?id=' . $item['patrol_id']) ?>"
                                class="btn btn-info " role="button" data-bs-toggle="tooltip" title="Detalle">Detalle
                                <i class="far fa-list-alt"></i></a>
                            <a href="<?php echo base_url('patrol/edit?id=' . $item['patrol_id']) ?>"
                                class="btn btn-warning " role="button" data-bs-toggle="tooltip" title="Editar">Editar <i
                                    class="far fa-edit"></i></a>
                            <a href="<?php echo base_url('patrol/delete?id=' . $item['patrol_id']) ?>"
                                class="btn btn-danger " role="button" data-bs-toggle="tooltip" title="Eliminar">Eliminar
                                <i class="fas fa-eraser"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Oficial</th>
                        <th>Latitud</th>
                        <th>Longitud</th>
                        <th>Código QR</th>
                        <th>Fecha de creación</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>