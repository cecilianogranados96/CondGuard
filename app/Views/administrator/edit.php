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
        <?php
        echo form_open('administrator/save'); ?>
        <fieldset>

            <!-- Form Name -->
            <legend>Nuevo Administrador</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="identity"></label>
                <div class="col-md-4">
                    <input id="identity" name="identity" type="number" placeholder="Identificación"
                        class="form-control input-md" required="" value=<?= $item['identity'] ?>>

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="name"></label>
                <div class="col-md-4">
                    <input id="name" name="name" type="text" placeholder="Nombre Completo" class="form-control input-md"
                        required="" value=<?= $item['name'] ?>>

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email"></label>
                <div class="col-md-4">
                    <input id="email" name="email" type="email" placeholder="Correo Electronico"
                        class="form-control input-md" required="" value=<?= $item['email'] ?>>

                </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password"></label>
                <div class="col-md-4">
                    <input id="password" name="password" type="password" placeholder="Contraseña"
                        class="form-control input-md" required="" value=<?= $item['password'] ?>>

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="phone"></label>
                <div class="col-md-4">
                    <input id="phone" name="phone" type="tel" placeholder="Telefono Movil" class="form-control input-md"
                        value=<?= $item['phone'] ?>>
                </div>
            </div>
            <br>
            <br>
            <?php echo form_hidden('administrator_id', $item['administrator_id']); ?>
            <a href="<?= base_url('administrator') ?>" class="btn  btn-secondary">atras</a>
            <input type="submit" name="edit" value="Editar" class="btn btn-primary">

        </fieldset>
        <?php
        echo form_close();
        ?>
    </div>
</div>