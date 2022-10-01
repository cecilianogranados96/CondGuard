<a href="<?php echo base_url('relative/new') ?>" class="btn btn-primary" role="button"
    style="font-size: 30px; margin-bottom: 10px;" data-bs-toggle="tooltip" title="Nuevo">Nuevo <i
        class="fa fa-plus fs-2"></i></a>
<!--DATA TABLE-->
<div class="table-responsive">
    <table id="datatable" class="table table-striped table-bordered" style="width: 100%">

        <thead>
            <tr>
                <th>Identificación</th>
                <th>Condomino</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Teléfono</th>
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
                <td><?= $item['email'] ?> </td>
                <td><?= $item['phone'] ?> </td>
                <td><?= $item['created_at'] ?> </td>
                <td>
                    <a href="<?php echo base_url('relative/edit?id=' . $item['relative_id']) ?>"
                        class="btn btn-warning " role="button" data-bs-toggle="tooltip" title="Editar">Editar <i
                            class="far fa-edit"></i></a>
                </td>
                <td>
                    <a href="<?php echo base_url('relative/delete?id=' . $item['relative_id']) ?>"
                        class="btn btn-danger " role="button" data-bs-toggle="tooltip" title="Eliminar">Eliminar <i
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
                <th>Correo Electrónico</th>
                <th>Teléfono</th>
                <th>Fecha de Creación</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </tfoot>
    </table>
</div>