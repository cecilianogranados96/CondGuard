<a href="<?php echo base_url('condo_owner/new') ?>" class="btn btn-primary" data-bs-toggle="tooltip" title="Nuevo"
    role="button" style="font-size: 30px; margin-bottom: 10px;">Nuevo <i class="fa fa-plus fs-2"></i></a>
<!--DATA TABLE-->
<div class="table-responsive">
    <table id="datatable" class="table table-striped table-bordered" style="width: 100%">

        <thead>
            <tr>
                <th>Identificacion</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Teléfono</th>
                <th>Filial</th>
                <th>Pago</th>
                <th>Fecha de Creación</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item) : ?>
            <tr>
                <td><?= $item['identity'] ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['email'] ?> </td>
                <td><?= $item['phone'] ?> </td>
                <td><?= $item['land_number'] ?> </td>
                <td><?= $item['payment'] ?> </td>
                <td><?= $item['created_at'] ?> </td>
                <td>
                    <a href="<?php echo base_url('condo_owner/edit?id=' . $item['condo_owner_id']) ?>"
                        class="btn btn-warning " data-bs-toggle="tooltip" title="Editar" role="button">Editar <i
                            class="far fa-edit"></i></a>
                </td>
                <td>
                    <a href="<?php echo base_url('condo_owner/delete?id=' . $item['condo_owner_id']) ?>"
                        class="btn btn-danger " data-bs-toggle="tooltip" title="Eliminar" role="button">Eliminar <i
                            class="fas fa-eraser"></i></a>

                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Identificacion</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Teléfono</th>
                <th>Filial</th>
                <th>Pago</th>
                <th>Fecha de Creación</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </tfoot>
    </table>
</div>