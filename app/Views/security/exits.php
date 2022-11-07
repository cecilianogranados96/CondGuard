<div class="container my-auto">
    <!-- title -->
    <h1 class="text-center my-5">
        Registro de Salidas
    </h1>
    <!--DATA TABLE-->
    <div class="table-responsive">
        <table id="datatable" class="table " style="width: 100%">

            <thead>
                <tr>
                    <th>Identidad</th>
                    <th style="width: 150px;">Placa de vehículo</th>
                    <th>Nombre</th>
                    <th>Filial</th>
                    <th>Entrada</th>
                    <th>Salida</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) : ?>
                <tr>

                    <td><?= $item['identity'] ?></td>
                    <td style="width: 150px;"><?= $item['vehicle_plate'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['land_number'] ?></td>
                    <td><?= $item['entry_at'] ?></td>
                    <td>
                        <a href="<?php echo base_url('quit?id=' . $item['relative_vehicle_id']) ?>"
                            class="btn btn-danger " role="button" data-bs-toggle="tooltip" title="Marcar
                            Salida">Marcar
                            Salida
                            <i class="fas fa-door-open"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>