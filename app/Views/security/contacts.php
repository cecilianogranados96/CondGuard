<div class="container my-auto">
    <!-- title -->
    <h1 class="text-center my-5">
        Contactos de filial <?= $_GET["land_number"] ?>
    </h1>
    <!--DATA TABLE-->
    <div class="table-responsive">
        <table id="datatable" class="table " style="width: 100%">

            <thead>
                <tr>
                    <th>Identificación</th>
                    <th>Nombre</th>
                    <th>Razón</th>
                    <th>Contacto</th>
                    <th>Marcar entrada</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td><?= $condo_owner['identity'] ?></td>
                    <td><?= $condo_owner['name'] ?></td>
                    <td>PROPIETARIO(A)</td>
                    <td>
                        <a href="tel:<?= $condo_owner['phone'] ?>" data-bs-toggle="tooltip" title="Llamar"
                            class="btn btn-success"><?= $condo_owner['phone'] ?> <i class="fas fa-phone-alt"></i></a>
                    </td>
                    <td>
                        <a href="" class="btn btn-success " role="button" data-bs-toggle="tooltip"
                            title="Marcar Entrada">
                            Marcar Entrada <i class="fas fa-eraser"></i></a>
                    </td>
                </tr>
                <?php foreach ($items as $item) : ?>
                <tr>

                    <td><?= $item['identity'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['reason'] ?></td>
                    <td>
                        <a href="tel:<?= $item['phone'] ?>" data-bs-toggle="tooltip" title="Llamar"
                            class="btn btn-success"><?= $item['phone'] ?> <i class="fas fa-phone-alt"></i></a>
                    </td>
                    <td>
                        <a href="" class="btn btn-success " role="button" data-bs-toggle="tooltip"
                            title="Marcar Entrada">
                            Marcar Entrada <i class="fas fa-check"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>