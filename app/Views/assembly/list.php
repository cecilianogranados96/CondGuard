<div class="col">
    <div class="card card-body">
        <a href="<?php echo base_url('assembly/new') ?>" class="btn btn-primary" data-bs-toggle="tooltip" title="Nuevo"
            role="button" style="font-size: 30px; margin-bottom: 10px;">Nueva asamblea <i
                class="fa fa-plus fs-2"></i></a>
        <!--DATA TABLE-->
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered" style="width: 100%">

                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Lugar</th>
                        <th>Fecha de creación</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item) : ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['place'] ?> </td>
                        <td><?= $item['created_at'] ?> </td>
                        <td>
                            <a href="<?php echo base_url('assembly/detail?id=' . $item['assembly_id']) ?>"
                                class="btn btn-info " data-bs-toggle="tooltip" title="Detalle" role="button">Detalle
                                <i class="far fa-list-alt"></i></a>
                            <a href="<?php echo base_url('assembly/edit?id=' . $item['assembly_id']) ?>"
                                class="btn btn-warning " data-bs-toggle="tooltip" title="Editar" role="button">Editar <i
                                    class="far fa-edit"></i></a>
                            <a href="<?php echo base_url('assembly/delete?id=' . $item['assembly_id']) ?>"
                                class="btn btn-danger " data-bs-toggle="tooltip" title="Eliminar" role="button">Eliminar
                                <i class="fas fa-eraser"></i></a>

                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Lugar</th>
                        <th>Fecha de creación</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>