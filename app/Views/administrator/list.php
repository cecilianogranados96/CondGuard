<div class="container" style="padding-bottom: 160px;">

    <section class="py-4">
        <div
            class="text-white bg-secondary border rounded border-0 border-primary d-block flex-column justify-content-between flex-lg-row bounce animated p-4 p-md-5">
            <div class="pb-2 pb-lg-1">
                <h2 class="fw-bold mb-2">Mantenimientos</h2>
            </div>
            <div class="my-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" data-bss-hover-animate="pulse"
                            href="<?= base_url('administrator') ?>">Administrador</a></li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="#">Asamblea</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="#">Asociados</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="#">Areas
                            Comunes</a></li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="#">Autorizados</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="#">Condonomino</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="#">Votaciones</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="#">Vehiculos</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="#">Oficial</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="#">Patrulla</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="#">Votos</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div class="card card-body ">
        <a href="<?php echo base_url('administrator/new') ?>" class="btn btn-primary" role="button"
            style="font-size: 30px; margin-bottom: 10px;">Nuevo <i class="fa fa-plus fs-2"></i></a>
        <!--DATA TABLE-->
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered" style="width: 100%">

                <thead>
                    <tr>
                        <th>identificacion</th>
                        <th>nombre</th>
                        <th>email</th>
                        <th>telefono</th>
                        <th>opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item) : ?>
                    <tr>
                        <td><?= $item['identity'] ?> </td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['email'] ?> </td>
                        <td><?= $item['phone'] ?></td>
                        <td>
                            <a href="<?php echo base_url('administrator/edit?id=' . $item['administrator_id']) ?>"
                                class="btn btn-warning" role="button"><i class="far fa-edit"></i></a>
                            | <a href="<?php echo base_url('administrator/delete?id=' . $item['administrator_id']) ?>"
                                class="btn btn-danger" role="button"><i class="fas fa-eraser"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>identificacion</th>
                        <th>nombre</th>
                        <th>email</th>
                        <th>telefono</th>
                        <th>opciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#datatable').DataTable({
        responsive: {
            breakpoints: [{
                    name: 'bigdesktop',
                    width: Infinity
                },
                {
                    name: 'meddesktop',
                    width: 1480
                },
                {
                    name: 'smalldesktop',
                    width: 1280
                },
                {
                    name: 'medium',
                    width: 1188
                },
                {
                    name: 'tabletl',
                    width: 1024
                },
                {
                    name: 'btwtabllandp',
                    width: 848
                },
                {
                    name: 'tabletp',
                    width: 768
                },
                {
                    name: 'mobilel',
                    width: 480
                },
                {
                    name: 'mobilep',
                    width: 320
                }
            ]
        }
    });
});
</script>