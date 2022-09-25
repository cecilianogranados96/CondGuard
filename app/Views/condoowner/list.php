<div class="container-fluid text-bg-light" style="padding: 2%">
    <div class="row">
        <div class="col-auto">
            <div>
                <div class="collapse collapse-horizontal" id="collapse-1">
                    <div class="card card-body">
                        <ul class="nav nav-pills flex-column" style="padding: 2%">
                            <li class="nav-item" style="
                    --bs-secondary-rgb: 43, 102, 154;
                    --bs-primary-rgb: 248, 253, 13;
                  ">
                                <a class="nav-link active" href="#">Condominos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Oficiales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Third Item</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row" style="align-items: center;">
                <div class="row">
                    <div class="col-auto"><a class="" data-bs-toggle="collapse" aria-expanded="false"
                            aria-controls="collapse-1" href="#collapse-1" role="button"
                            style="background: #ffffff;width: 50px;color: black;"><svg
                                xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 24 24"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4H21V20H3V4ZM9 6H19V18H9V6Z"
                                    fill="currentColor"></path>
                            </svg></i></a>
                        <a href="<?php echo base_url('condoowner/new') ?>" class="btn btn-primary"
                            style="margin: 4%;">nuevo</a>
                    </div>
                    <div class="col">
                        <h1>Condominos </h1>
                    </div>
                </div>
                <hr>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>cedula</th>
                            <th>nombre completo</th>
                            <th>email</th>
                            <th>telefono</th>
                            <th>filial</th>
                            <th>opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user['identity'] ?> </td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?> </td>
                            <td><?= $user['phone'] ?></td>
                            <td><?= $user['land_number'] ?></td>
                            <td>
                                <a href="<?php echo base_url('condoowner/edit?id=' . $user['condo_owner_id']) ?>"
                                    class="btn btn-warning" role="button"><i class="far fa-edit"></i></a>
                                | <a href="<?php echo base_url('condoowner/delete?id=' . $user['condo_owner_id']) ?>"
                                    class="btn btn-danger" role="button"><i class="fas fa-eraser"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>cedula</th>
                            <th>nombre completo</th>
                            <th>email</th>
                            <th>telefono</th>
                            <th>filial</th>
                            <th>opciones</th>
                        </tr>
                    </tfoot>
                </table>
                <script>
                $(document).ready(function() {
                    $('#example').DataTable({

                    });
                });
                </script>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid text-bg-light" style="padding: 2%">
    <div class="row">

    </div>
</div>