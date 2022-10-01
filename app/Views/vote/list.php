<a href="<?php echo base_url('vote/new') ?>" class="btn btn-primary" role="button" style="font-size: 30px; margin-bottom: 10px;">Nuevo <i class="fa fa-plus fs-2"></i></a>
<!--DATA TABLE-->
<div class="table-responsive">
    <table id="datatable" class="table table-striped table-bordered" style="width: 100%">

        <thead>
            <tr>
                <th>Respuesta</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item) : ?>
                <tr>
                    <td><?= $item['answer'] ?></td>
                    <td>
                        <a href="<?php echo base_url('vote/edit?id=' . $item['vote_id']) ?>" class="btn btn-warning " role="button">Editar <i class="far fa-edit"></i></a>
                        <a href="<?php echo base_url('vote/delete?id=' . $item['vote_id']) ?>" class="btn btn-danger " role="button">Eliminar <i class="fas fa-eraser"></i></a>

                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Respuesta</th>
                <th>Opciones</th>
            </tr>
        </tfoot>
    </table>
</div>