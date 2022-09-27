<div class="container" style="padding-bottom: 160px;">

    <section class="py-5">
        <div
            class="text-white bg-secondary border rounded border-0 border-primary d-block flex-column justify-content-between flex-lg-row  p-4 p-md-3">
            <div class="pb-2 pb-lg-1">
                <h2 class="fw-bold mb-2">Mantenimientos</h2>
            </div>
            <div class="my-0">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('relative') ?>">Acreditados</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('administrator') ?>">Administradores</a></li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('assembly') ?>">Asambleas</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('common_area') ?>">Areas
                            Comunes</a></li>
                    <li class="nav-item"><a class="nav-link active" data-bss-hover-animate="pulse"
                            href="<?= base_url('authorized') ?>">Autorizados</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('condo_owner') ?>">Condonominos</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('officer') ?>">Oficiales</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('patrol') ?>">Patrullas</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('reservation') ?>">Reservaciones</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('relative_vehicle') ?>">Vehiculos</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('assembly_voting') ?>">Votaciones</a>
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

        echo form_open('authorized/save'); ?>
        <fieldset>

            <!-- Form Name -->
            <legend><?= isset($item) ? 'Editar' : 'Nuevo'; ?> Autorizado</legend>

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
                <label class="col-md-4 control-label" for="vehicle_plate"></label>
                <div class="col-md-4">
                    <input id="vehicle_plate" name="vehicle_plate" type="number" placeholder="Placa de vehiculo"
                        class="form-control input-md" required=""
                        value=<?= isset($item) ? $item['vehicle_plate'] : ''; ?>>


                </div>
            </div>



            <!-- input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="reason"></label>
                <div class="col-md-4">
                    <input id="reason" name="reason" type="text" placeholder="Motivo" class="form-control input-md"
                        required="" value=<?= isset($item) ? $item['reason'] : ''; ?>>

                </div>
            </div>
            <!-- input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="entry_at"></label>
                <div class="col-md-4">
                    <input id="entry_at" name="entry_at" type="datetime-local" placeholder="Fecha de entrada"
                        class="form-control input-md" required="" value=<?= isset($item) ? $item['entry_at'] : ''; ?>>

                </div>
            </div>
            <!-- input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="out_at"></label>
                <div class="col-md-4">
                    <input id="out_at" name="out_at" type="datetime-local" placeholder="Fecha de salida"
                        class="form-control input-md" required="" value=<?= isset($item) ? $item['out_at'] : ''; ?>>

                </div>
            </div>
            <!-- input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="expiration_at"></label>
                <div class="col-md-4">
                    <input id="expiration_at" name="expiration_at" type="datetime-local"
                        placeholder="Fecha de expiracion" class="form-control input-md" required=""
                        value=<?= isset($item) ? $item['expiration_at'] : ''; ?>>

                </div>
            </div>


            <br>
            <br>
            <input name="authorized_id" type="hidden" value=<?= isset($item) ? $item['authorized_id'] : ''; ?>>

            <a href="<?= base_url('authorized') ?>" class="btn  btn-secondary">atras</a>
            <input type="submit" name="edit" value="<?= isset($item) ? 'Editar' : 'Guardar'; ?>"
                class="btn btn-primary">

        </fieldset>
        <?php
        echo form_close();
        ?>
    </div>
</div>