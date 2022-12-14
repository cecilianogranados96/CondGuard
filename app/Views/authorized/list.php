<div class="container-fluid my-2" style="
        align-items: center;
        justify-content: center;">
    <div class="col">
        <div class="card card-body">
            <a href="<?php echo base_url('authorized/new') ?>" class="btn btn-primary" role="button"
                style="font-size: 30px; margin-bottom: 10px;" data-bs-toggle="tooltip" title="Nuevo">Nuevo autorizado <i
                    class="fa fa-plus fs-2"></i></a>
            <!--DATA TABLE-->
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" style="width: 100%">

                    <thead>
                        <tr>
                            <th>Filial</th>
                            <th>Condómino</th>
                            <th>Nombre</th>
                            <th>Placa de vehículo</th>
                            <th>Motivo</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) : ?>
                        <tr>
                            <td>
                                <?php
                                    $found_key = array_search($item['condo_owner_id'], array_column($relations, 'condo_owner_id'));
                                    echo "<b>" . $relations[$found_key]['land_number'];
                                    ?>
                            </td>
                            <td>
                                <?php
                                    $found_key = array_search($item['condo_owner_id'], array_column($relations, 'condo_owner_id'));
                                    echo "<b>" . $relations[$found_key]['name'];
                                    ?>
                            </td>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['vehicle_plate'] ?> </td>
                            <td><?= $item['reason'] ?> </td>
                            <td>
                                <a href="<?php echo base_url('authorized/detail?id=' . $item['authorized_id']) ?>"
                                    class="btn btn-info " role="button" data-bs-toggle="tooltip" title="Detalle">Detalle
                                    <i class="far fa-list-alt"></i></a>
                                <a href="<?php echo base_url('authorized/edit?id=' . $item['authorized_id']) ?>"
                                    class="btn btn-warning " role="button" data-bs-toggle="tooltip"
                                    title="Editar">Editar <i class="far fa-edit"></i></a>
                                <a href="<?php echo base_url('authorized/delete?id=' . $item['authorized_id']) ?>"
                                    class="btn btn-danger " role="button" data-bs-toggle="tooltip"
                                    title="Eliminar">Eliminar <i class="fas fa-eraser"></i></a>

                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>

                            <th>Filial</th>
                            <th>Condómino</th>
                            <th>Nombre</th>
                            <th>Placa de vehículo</th>
                            <th>Motivo</th>
                            <th>Opciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>