<div class="container-fluid my-2" style="
        align-items: center;
        justify-content: center;">
    <div class="col">
        <div class="card card-body">
            <a href="<?php echo base_url('reservation/new') ?>" class="btn btn-primary" role="button"
                style="font-size: 30px; margin-bottom: 10px;" data-bs-toggle="tooltip" title="Nuevo">Nueva reservación
                <i class="fa fa-plus fs-2"></i></a>
            <!--DATA TABLE-->
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" style="width: 100%">

                    <thead>
                        <tr>
                            <th>Área Común</th>
                            <th>Entrada</th>
                            <th>Salida</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) : ?>
                        <tr>
                            <td>
                                <?php
                                    $found_key = array_search($item['common_area_id'], array_column($relations, 'common_area_id'));

                                    echo $relations[$found_key]['name'] . '-' . $relations[$found_key]['status'];

                                    ?>
                            </td>
                            <td><?= $item['entry_at'] ?> </td>
                            <td><?= $item['out_at'] ?> </td>
                            <td>
                                <a href="<?php echo base_url('reservation/detail?id=' . $item['reservation_id']) ?>"
                                    class="btn btn-info " role="button" data-bs-toggle="tooltip" title="Detalle">Detalle
                                    <i class="far fa-list-alt"></i></a>
                                <a href="<?php echo base_url('reservation/edit?id=' . $item['reservation_id']) ?>"
                                    class="btn btn-warning " role="button" data-bs-toggle="tooltip"
                                    title="Editar">Editar <i class="far fa-edit"></i></a>
                                <a href="<?php echo base_url('reservation/delete?id=' . $item['reservation_id']) ?>"
                                    class="btn btn-danger " role="button" data-bs-toggle="tooltip"
                                    title="Eliminar">Eliminar
                                    <i class="fas fa-eraser"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Área Común</th>
                            <th>Entrada</th>
                            <th>Salida</th>
                            <th>Opciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>