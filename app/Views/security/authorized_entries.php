<div class="container my-auto">
    <!-- title -->
    <h1 class="text-center pt-3">
        Lista de autorizados
    </h1>
    <hr>
    <!--DATA TABLE-->
    <div class="table-responsive">
        <table id="datatable" class="table table-striped table-bordered" style="width: 100%">

            <thead>
                <tr>
                    <th>Identificación</th>
                    <th>Nombre</th>
                    <th>Placa de vehículo</th>
                    <th>Filial</th>
                    <th>Condómino</th>
                    <th>Motivo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) : ?>
                <tr>
                    <td><?= $item['identity'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['vehicle_plate'] ?> </td>
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
                    <td><?= $item['reason'] ?> </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>