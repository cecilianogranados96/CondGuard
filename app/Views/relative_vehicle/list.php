<a href="<?php echo base_url('relative_vehicle/new') ?>" class="btn btn-primary" role="button" style="font-size: 30px; margin-bottom: 10px;">Nuevo <i class="fa fa-plus fs-2"></i></a>
<!--DATA TABLE-->
<div class="table-responsive">
    <table id="datatable" class="table table-striped table-bordered" style="width: 100%">

        <thead>
            <tr>
                <th>Placa</th>
                <th>Descripcion</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item) : ?>
                <tr>
                    <td><?= $item['vehicle_plate'] ?></td>
                    <td><?= $item['description'] ?> </td>
                    <td>
                        <a href="<?php echo base_url('relative_vehicle/edit?id=' . $item['relative_vehicle_id']) ?>" class="btn btn-warning " role="button">Editar <i class="far fa-edit"></i></a>
                        <a href="<?php echo base_url('relative_vehicle/delete?id=' . $item['relative_vehicle_id']) ?>" class="btn btn-danger " role="button">Eliminar <i class="fas fa-eraser"></i></a>

                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Placa</th>
                <th>Descripcion</th>
                <th>Opciones</th>
            </tr>
        </tfoot>
    </table>
</div>