<div class="container" style="padding-bottom: 160px;">

    <section class="py-5">
        <div
            class="text-white bg-secondary border rounded border-0 border-primary d-block flex-column justify-content-between flex-lg-row bounce animated p-4 p-md-3">
            <div class="pb-2 pb-lg-1">
                <h2 class="fw-bold mb-2">Mantenimientos</h2>
            </div>
            <div class="my-0">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('administrator') ?>">Administradores</a></li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('assembly') ?>">Asamblea</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('relative') ?>">Acreditados</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('common_area') ?>">Areas
                            Comunes</a></li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('authorized') ?>">Autorizados</a>
                    </li>
                    <li class="nav-item"><a class="nav-link active" data-bss-hover-animate="pulse"
                            href="<?= base_url('condo_owner') ?>">Condonominos</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('assembly_voting') ?>">Votaciones</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('relative_vehicle') ?>">Vehiculos</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('officer') ?>">Oficiales</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('patrol') ?>">Patrullas</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('vote') ?>">Votos</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div class="card card-body ">
        <?php

        echo form_open('condo_owner/save'); ?>
        <fieldset>

            <!-- Form Name -->
            <legend><?= isset($item) ? 'Editar' : 'Nuevo'; ?> Condomino</legend>

            <!-- input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="identity"></label>
                <div class="col-md-4">
                    <input id="identity" name="identity" type="number" placeholder="Identificación"
                        class="form-control input-md" required="" value=<?= isset($item) ? $item['identity'] : ''; ?>>


                </div>
            </div>



            <!-- input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="name"></label>
                <div class="col-md-4">
                    <input id="name" name="name" type="text" placeholder="Nombre" class="form-control input-md"
                        required="" value=<?= isset($item) ? $item['name'] : ''; ?>>

                </div>
            </div>

            <!-- input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email"></label>
                <div class="col-md-4">
                    <input id="email" name="email" type="text" placeholder="Correo Electronico"
                        class="form-control input-md" required="" value=<?= isset($item) ? $item['email'] : ''; ?>>

                </div>
            </div>
            <!-- input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password"></label>
                <div class="col-md-4">
                    <input id="password" name="password" type="text" placeholder="Contraseña"
                        class="form-control input-md" required="" value=<?= isset($item) ? $item['password'] : ''; ?>>

                </div>
            </div>
            <!-- input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="phone"></label>
                <div class="col-md-4">
                    <input id="phone" name="phone" type="tel" placeholder="Telefono Movil" class="form-control input-md"
                        required="" value=<?= isset($item) ? $item['phone'] : ''; ?>>

                </div>
            </div>



            <!-- input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="land_number"></label>
                <div class="col-md-4">
                    <input id="land_number" name="land_number" type="text" placeholder="Filial"
                        class="form-control input-md" required=""
                        value=<?= isset($item) ? $item['land_number'] : ''; ?>>

                </div>
            </div>


            <br>
            <br>
            <input name="condo_owner_id" type="hidden" value=<?= isset($item) ? $item['condo_owner_id'] : ''; ?>>

            <a href="<?= base_url('condo_owner') ?>" class="btn  btn-secondary">atras</a>
            <input type="submit" name="edit" value="<?= isset($item) ? 'Editar' : 'Guardar'; ?>"
                class="btn btn-primary">

        </fieldset>
        <?php
        echo form_close();
        ?>
    </div>
</div>