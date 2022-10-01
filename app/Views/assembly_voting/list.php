<a href="<?php echo base_url('assembly_voting/new') ?>" class="btn btn-primary" role="button"
    style="font-size: 30px; margin-bottom: 10px;">Nuevo <i class="fa fa-plus fs-2"></i></a>
<!--DATA TABLE-->
<div class="table-responsive">
    <table id="datatable" class="table table-striped table-bordered" style="width: 100%">

        <thead>
            <tr>
                <th>Descripcion</th>
                <th>pregunta</th>
                <th>Votos Afirmativos</th>
                <th>Votos Negativos</th>
                <th>Votos Totales</th>
                <th>Resultado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item) : ?>
            <tr>
                <td><?= $item['description'] ?></td>
                <td><?= $item['question'] ?></td>
                <td><?= $item['up_votes'] ?> </td>
                <td><?= $item['down_votes'] ?> </td>
                <td><?= $item['total_votes'] ?> </td>
                <td><?= $item['status'] ?> </td>
                <td>
                    <a href="<?php echo base_url('assembly_voting/edit?id=' . $item['assembly_voting_id']) ?>"
                        class="btn btn-warning " role="button">Editar <i class="far fa-edit"></i></a>
                    <a href="<?php echo base_url('assembly_voting/delete?id=' . $item['assembly_voting_id']) ?>"
                        class="btn btn-danger " role="button">Eliminar <i class="fas fa-eraser"></i></a>

                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Descripcion</th>
                <th>pregunta</th>
                <th>Votos Afirmativos</th>
                <th>Votos Negativos</th>
                <th>Votos Totales</th>
                <th>Resultado</th>
                <th>Opciones</th>
            </tr>
        </tfoot>
    </table>
</div>