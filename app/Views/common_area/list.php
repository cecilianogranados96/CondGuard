<a href="<?php echo base_url('common_area/new') ?>" class="btn btn-primary" role="button" data-bs-toggle="tooltip"
    title="Nuevo" style="font-size: 30px; margin-bottom: 10px;">Nuevo <i class="fa fa-plus fs-2"></i></a>
<!--DATA TABLE-->
<div class="table-responsive">
    <table id="datatable" class="table table-striped table-bordered" style="width: 100%">

        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Capacidad de filiales</th>
                <th>Capacidad de personas</th>
                <th>Fecha de creación</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item) : ?>
            <tr>
                <td><?= $item['name'] ?></td>
                <td><?= $item['address'] ?> </td>
                <td><?= $item['condo_capacity'] ?> </td>
                <td><?= $item['people_capacity'] ?> </td>
                <td><?= $item['created_at'] ?> </td>
                <td>
                    <a href="<?php echo base_url('common_area/edit?id=' . $item['common_area_id']) ?>"
                        class="btn btn-warning " role="button" data-bs-toggle="tooltip" title="Editar">Editar <i
                            class="far fa-edit"></i></a>
                </td>
                <td>
                    <a href="<?php echo base_url('common_area/delete?id=' . $item['common_area_id']) ?>"
                        class="btn btn-danger " role="button" data-bs-toggle="tooltip" title="Eliminar">Eliminar <i
                            class="fas fa-eraser"></i></a>

                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Capacidad de filiales</th>
                <th>Capacidad de personas</th>
                <th>Fecha de creación</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </tfoot>
    </table>
</div>