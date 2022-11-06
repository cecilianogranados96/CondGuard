<div class="container-fluid my-2" style="
        align-items: center;
        justify-content: center;">
    <div class="col">
        <div class="card card-body">
            <a href="<?php echo base_url('assembly_voting/new') ?>" class="btn btn-primary" data-bs-toggle="tooltip"
                title="Nuevo" role="button" style="font-size: 30px; margin-bottom: 10px;">Nueva votación <i
                    class="fa fa-plus fs-2"></i></a>
            <!--DATA TABLE-->
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" style="width: 100%">

                    <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>pregunta</th>
                            <th>Resultado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) : ?>
                        <tr>
                            <td style="width: 25%;"><?= $item['description'] ?></td>
                            <td><?= $item['question'] ?></td>
                            <?php
                                $status = null;
                                switch ($item['status']) {
                                    case 'pending':
                                        $status = 'Pendiente';
                                        break;
                                    case 'approved':
                                        $status = 'Aprobado';
                                        break;
                                    case 'rejected':
                                        $status = 'Rechazado';
                                        break;

                                    default:
                                        $status = 'Pendiente';
                                        break;
                                }


                                ?>
                            <td><?= $status ?> </td>
                            <td>
                                <a href="<?php echo base_url('assembly_voting/detail?id=' . $item['assembly_voting_id']) ?>"
                                    class="btn btn-info " data-bs-toggle="tooltip" title="Detalle" role="button">Detalle
                                    <i class="far fa-list-alt"></i></a>
                                <a href="<?php echo base_url('assembly_voting/edit?id=' . $item['assembly_voting_id']) ?>"
                                    class="btn btn-warning " data-bs-toggle="tooltip" title="Editar"
                                    role="button">Editar <i class="far fa-edit"></i></a>
                                <a href="<?php echo base_url('assembly_voting/delete?id=' . $item['assembly_voting_id']) ?>"
                                    class="btn btn-danger " data-bs-toggle="tooltip" title="Eliminar"
                                    role="button">Eliminar
                                    <i class="fas fa-eraser"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Descripcion</th>
                            <th>pregunta</th>
                            <th>Resultado</th>
                            <th>Opciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>