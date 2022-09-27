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
                            href="<?= base_url('assembly') ?>">Asambleas</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('relative') ?>">Acreditados</a>
                    </li>
                    <li class="nav-item"><a class="nav-link active" data-bss-hover-animate="pulse"
                            href="<?= base_url('common_area') ?>">Areas
                            Comunes</a></li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
                            href="<?= base_url('authorized') ?>">Autorizados</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse"
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

        echo form_open('common_area/save'); ?>
        <fieldset>

            <!-- Form Name -->
            <legend><?= isset($item) ? 'Editar' : 'Nuevo'; ?>Area Comun </legend>



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
                <label class="col-md-4 control-label" for="address"></label>
                <div class="col-md-4">
                    <input id="address" name="address" type="text" placeholder="Direccion" class="form-control input-md"
                        required="" value=<?= isset($item) ? $item['address'] : ''; ?>>

                </div>
            </div>
            <!-- input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="condo_capacity"></label>
                <div class="col-md-4">
                    <input id="condo_capacity" name="condo_capacity" type="number" placeholder="Capacidad de filiales"
                        class="form-control input-md" required=""
                        value=<?= isset($item) ? $item['condo_capacity'] : ''; ?>>

                </div>
            </div>
            <!-- input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="people_capacity"></label>
                <div class="col-md-4">
                    <input id="people_capacity" name="people_capacity" type="number" placeholder="Capacidad de personas"
                        class="form-control input-md" required=""
                        value=<?= isset($item) ? $item['people_capacity'] : ''; ?>>

                </div>
            </div>


            <br>
            <br>
            <input name="common_area_id" type="hidden" value=<?= isset($item) ? $item['common_area_id'] : ''; ?>>

            <a href="<?= base_url('common_area') ?>" class="btn  btn-secondary">atras</a>
            <input type="submit" name="edit" value="<?= isset($item) ? 'Editar' : 'Guardar'; ?>"
                class="btn btn-primary">

        </fieldset>
        <?php
        echo form_close();
        ?>
    </div>
</div>