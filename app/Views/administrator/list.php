<div class="container-fluid py-2" style="
        align-items: center;
        justify-content: center;">
    <div class="col">
        <div class="card card-body">
            <a href="<?php echo base_url('administrator/new') ?>" data-bs-toggle="tooltip" title="Nuevo"
                class="btn btn-primary" role="button" style="font-size: 30px; margin-bottom: 10px;">Nuevo
                administrador
                <i class="fa fa-plus fs-2"></i></a>

            <!--DATA TABLE-->
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" style="width: 100%">

                    <thead>
                        <tr>
                            <th>Identificación</th>
                            <th>Nombre</th>
                            <th>Correo Electrónico</th>
                            <th>Teléfono</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) : ?>
                        <tr>
                            <td><?= $item['identity'] ?> </td>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['email'] ?> </td>
                            <td><?= $item['phone'] ?></td>
                            <td>
                                <a href="<?php echo base_url('administrator/detail?id=' . $item['administrator_id']) ?>"
                                    class="btn btn-info" data-bs-toggle="tooltip" title="Detalle" role="button">Detalle
                                    <i class="far fa-list-alt"></i></a>
                                <a href="<?php echo base_url('administrator/edit?id=' . $item['administrator_id']) ?>"
                                    class="btn btn-warning " data-bs-toggle="tooltip" title="Editar"
                                    role="button">Editar <i class="far fa-edit"></i></a>
                                <a href="<?php echo base_url('administrator/delete?id=' . $item['administrator_id']) ?>"
                                    class="btn btn-danger " data-bs-toggle="tooltip" title="Eliminar"
                                    role="button">Eliminar
                                    <i class="fas fa-eraser"></i></a>

                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Identificación</th>
                            <th>Nombre</th>
                            <th>Correo Electrónico</th>
                            <th>Teléfono</th>
                            <th>Opciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>
</div>