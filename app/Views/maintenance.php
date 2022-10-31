<div class="col">
    <div class="card card-body">
        <H3>Inicio - Registro de cambios</H3>
        <!--DATA TABLE-->
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered" style="width: 100%">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Administrador</th>
                        <th>Operación</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item) : ?>
                    <tr>
                        <td><?= $item['log_id'] ?></td>
                        <td>
                            <?php
                                $found_key = array_search($item['administrator_id'], array_column($relations, 'administrator_id'));

                                echo $relations[$found_key]['administrator_id'] . ' - ' . $relations[$found_key]['name'];

                                ?>
                        </td>
                        <td><?= $item['operation'] ?></td>
                        <td><?= $item['created_at'] ?> </td>

                    </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Código</th>
                        <th>Administrador</th>
                        <th>Operación</th>
                        <th>Fecha</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>