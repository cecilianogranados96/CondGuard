<div class="col">
    <div class="card card-body">
        <a href="<?php echo base_url('condo_owner/new') ?>" class="btn btn-primary" role="button"
            style="font-size: 30px; margin-bottom: 10px;" data-bs-toggle="tooltip" title="Nuevo">Nuevo condómino <i
                class="fa fa-plus fs-2"></i></a>
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
                        <th>Opciones</th>
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
                        <td><?= $item['payment'] == 1 ? "Realizado" : "No realizado"; ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url('condo_owner/detail?id=' . $item['condo_owner_id']) ?>"
                                class="btn btn-info " role="button" data-bs-toggle="tooltip" title="Detalle">Detalle
                                <i class="far fa-list-alt"></i></a>
                            <a href="<?php echo base_url('condo_owner/edit?id=' . $item['condo_owner_id']) ?>"
                                class="btn btn-warning " role="button" data-bs-toggle="tooltip" title="Editar">Editar <i
                                    class="far fa-edit"></i></a>
                            <a href="<?php echo base_url('condo_owner/delete?id=' . $item['condo_owner_id']) ?>"
                                class="btn btn-danger " role="button" data-bs-toggle="tooltip" title="Eliminar">Eliminar
                                <i class="fas fa-eraser"></i></a>
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
                        <th>Opciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>