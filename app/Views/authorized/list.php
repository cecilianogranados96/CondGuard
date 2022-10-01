<a href="<?php echo base_url('authorized/new') ?>" data-bs-toggle="tooltip" title="Nuevo" class="btn btn-primary"
    role="button" style="font-size: 30px; margin-bottom: 10px;">Nuevo <i class="fa fa-plus fs-2"></i></a>
<!--DATA TABLE-->
<div class="table-responsive">
    <table id="datatable" class="table table-striped table-bordered" style="width: 100%">

        <thead>
            <tr>
                <th>Identificación</th>
                <th>Condomino</th>
                <th>Nombre</th>
                <th>Placa de vehículo</th>
                <th>Motivo</th>
                <th>Fecha de Entrada</th>
                <th>Fecha de Salida</th>
                <th>Fecha de Expiración</th>
                <th>Fecha de Creación</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item) : ?>
            <tr>
                <td><?= $item['identity'] ?></td>
                <td>
                    <?php
                        $found_key = array_search($item['condo_owner_id'], array_column($relations, 'condo_owner_id'));

                        echo $relations[$found_key]['land_number'] . '-' . $relations[$found_key]['name'];

                        ?>
                </td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['vehicle_plate'] ?> </td>
                <td><?= $item['reason'] ?> </td>
                <td><?= $item['entry_at'] ?> </td>
                <td><?= $item['out_at'] ?> </td>
                <td><?= $item['expiration_at'] ?> </td>
                <td><?= $item['created_at'] ?> </td>
                <td>
                    <a href="<?php echo base_url('authorized/edit?id=' . $item['authorized_id']) ?>"
                        class="btn btn-warning " data-bs-toggle="tooltip" title="Editar" role="button">Editar <i
                            class="far fa-edit"></i></a>
                </td>
                <td>
                    <a href="<?php echo base_url('authorized/delete?id=' . $item['authorized_id']) ?>"
                        class="btn btn-danger " data-bs-toggle="tooltip" title="Eliminar" role="button">Eliminar <i
                            class="fas fa-eraser"></i></a>

                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Identificación</th>
                <th>Condomino</th>
                <th>Nombre</th>
                <th>Placa de vehículo</th>
                <th>Motivo</th>
                <th>Fecha de Entrada</th>
                <th>Fecha de Salida</th>
                <th>Fecha de Expiración</th>
                <th>Fecha de Creación</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </tfoot>
    </table>
</div>