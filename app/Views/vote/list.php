<div class="col">
    <div class="card card-body">
        <a href="<?php echo base_url('vote/new') ?>" class="btn btn-primary" data-bs-toggle="tooltip" title="Nuevo"
            role="button" style="font-size: 30px; margin-bottom: 10px;">Nuevo voto <i class="fa fa-plus fs-2"></i></a>
        <!--DATA TABLE-->
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered" style="width: 100%">

                <thead>
                    <tr>
                        <th>Votación</th>
                        <th>Condomino</th>
                        <th>Respuesta</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item) : ?>
                    <tr>
                        <td style="width: 240px;">
                            <?php
                                $found_key = array_search($item['assembly_voting_id'], array_column($relations, 'assembly_voting_id'));

                                echo $relations[$found_key]['assembly_voting_id'] . ' - ' . $relations[$found_key]['question'] . ' - ' . $relations[$found_key]['description'];

                                ?>
                        </td>
                        <td>
                            <?php
                                $found_key = array_search($item['condo_owner_id'], array_column($relations2, 'condo_owner_id'));

                                echo $relations2[$found_key]['identity'] . ' - '  . $relations2[$found_key]['name'];

                                ?>
                        </td>
                        <td><?= $item['answer'] == 1 ? "A favor" : "En contra"; ?></td>
                        <td>
                            <a href="<?php echo base_url('vote/detail?id=' . $item['vote_id']) ?>" class="btn btn-info "
                                role="button" data-bs-toggle="tooltip" title="Detalle">Detalle
                                <i class="far fa-list-alt"></i></a>
                            <a href="<?php echo base_url('vote/edit?id=' . $item['vote_id']) ?>"
                                class="btn btn-warning " role="button" data-bs-toggle="tooltip" title="Editar">Editar <i
                                    class="far fa-edit"></i></a>
                            <a href="<?php echo base_url('vote/delete?id=' . $item['vote_id']) ?>"
                                class="btn btn-danger " role="button" data-bs-toggle="tooltip" title="Eliminar">Eliminar
                                <i class="fas fa-eraser"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Votación</th>
                        <th>Condomino</th>
                        <th>Respuesta</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>