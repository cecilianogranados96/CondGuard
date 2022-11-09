<div class="container-fluid my-2" style="
        align-items: center;
        justify-content: center;">
    <div class="col">
        <div class="card card-body">
            <h1>Mis reservaciones</h1>
            <hr>
            <!--DATA TABLE-->
            <div class="table-responsive">
                <table id="datatable" class="table" style="width: 100%">

                    <thead>
                        <tr>
                            <th>Área Común</th>
                            <th>Filial</th>
                            <th>Entrada</th>
                            <th>Salida</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) : ?>
                        <tr>
                            <td>
                                <?php
                                    $found_key = array_search($item['common_area_id'], array_column($relations2, 'common_area_id'));

                                    echo $relations2[$found_key]['name'];

                                    ?>
                            </td>
                            <?php $valueland = '';
                                if (session()->get('type') == 'condo_owner') {
                                    $valueland = session()->get('land_number');
                                } else {
                                    foreach ($relations as $condo_owner) {
                                        if ($condo_owner['condo_owner_id'] == session()->get('condo_owner_id')) {
                                            $valueland = $condo_owner['land_number'];
                                        }
                                    }
                                }

                                if ($valueland == "") {
                                    $valueland = 'Admin';
                                }
                                ?>
                            <td><?= $valueland ?></td>

                            <td><?= $item['entry_at'] ?> </td>
                            <td><?= $item['out_at'] ?> </td>
                            <td>
                                <a onclick="edit(<?= $item['reservation_id'] ?>)" class="btn btn-warning " role="button"
                                    data-bs-toggle="tooltip" title="Editar">Editar
                                    <i class="fas fa-pen"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Include the Bootstrap 4 theme -->
<link rel="stylesheet" href="@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
<script>
function edit(reservation_id) {

    Swal.fire({
        title: 'Que desea hacer con esta reservación?',
        text: "Puede hacer otra reservación cancelando la  actual  o solo cancelar la reservación actual.",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Crear nueva reservación!',
        cancelButtonText: 'Solo cancelar!',
        showCloseButton: true
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href =
                "<?php echo base_url('reservation/cancel?id=') ?>" + reservation_id + "&renew=true";
        }
        if (result.dismiss === Swal.DismissReason.cancel) {
            window.location.href = "<?php echo base_url('reservation/cancel?id=') ?>" + reservation_id;
        }
    })
}
</script>