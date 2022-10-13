<div class="col">
    <div class="card card-body">
        <a href="<?php echo base_url('common_area/new') ?>" class="btn btn-primary" role="button"
            data-bs-toggle="tooltip" title="Nuevo" style="font-size: 30px; margin-bottom: 10px;">Nueva área común <i
                class="fa fa-plus fs-2"></i></a>
        <!--DATA TABLE-->
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered" style="width: 100%">

                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item) : ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['address'] ?> </td>
                        <td><?= $item['status'] ?> </td>
                        <td>
                            <a href="<?php echo base_url('common_area/detail?id=' . $item['common_area_id']) ?>"
                                class="btn btn-info " role="button" data-bs-toggle="tooltip" title="Detalle">Detalle
                                <i class="far fa-list-alt"></i></a>
                            <a href="<?php echo base_url('common_area/edit?id=' . $item['common_area_id']) ?>"
                                class="btn btn-warning " role="button" data-bs-toggle="tooltip" title="Editar">Editar <i
                                    class="far fa-edit"></i></a>
                            <a href="<?php echo base_url('common_area/delete?id=' . $item['common_area_id']) ?>"
                                class="btn btn-danger " role="button" data-bs-toggle="tooltip" title="Eliminar">Eliminar
                                <i class="fas fa-eraser"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>