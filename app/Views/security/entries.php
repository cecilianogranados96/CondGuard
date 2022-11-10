<div class="container my-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 col-xl-6">
            <div class="card-body d-flex flex-column align-items-center">
                <form action="<?= base_url('security/verify') ?>" method="post"
                    class="row g-3 form-floating needs-validation" novalidate>
                    <!-- timezone-->
                    <?php date_default_timezone_set('America/Costa_Rica');
                    ?>

                    <!-- title -->
                    <h1 class="text-center my-4">
                        Control de Seguridad
                    </h1>

                    <!-- input -->
                    <div class="form-floating ">
                        <input class="form-control  only-alphanumeric fs-5" type="text" id="identity" name="identity"
                            onchange="$.get('https:/'+'/api.hacienda.go.cr/fe/ae?identificacion='+this.value, 
                            function(response) { $('#name').val(response.nombre);});" placeholder="Identificación"
                            data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Identificación nacional ej:101110111 o extranjero en el formato correspondiente, sin caracteres especiales o espacios."
                            value="<?= isset($_GET["identity"]) ? $_GET["identity"] : '' ?>" required=""
                            pattern="^[a-zA-Z0-9]{0,50}$" />
                        <label for="identity">Identificación <b class="required-feedback">*</b></label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">
                            Invalido, debe ingresar identificación valida nacional ej:101110111, o extranjera en el
                            formato
                            correspondiente, sin caracteres especiales o espacios.
                        </div>
                    </div>
                    <!-- Input -->
                    <div class="form-floating">
                        <input class="form-control only-alphanumeric fs-5" type="text" id="vehicle_plate"
                            name="vehicle_plate" placeholder="Placa de vehículo" data-bs-toggle="tooltip"
                            data-bs-placement="right" title="Placa de vehículo ej: AAA888"
                            value="<?= isset($_GET["vehicle_plate"]) ? $_GET["vehicle_plate"] : '' ?>"
                            pattern="^[a-zA-Z0-9]{6,9}$" />
                        <label for="vehicle_plate">Placa de vehículo <b class="required-feedback">*</b></label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">
                            Invalido, debe ingresar placa válida 6 y 11 caracteres ej:AAA888.
                        </div>
                    </div>
                    <!-- input -->
                    <div class="form-floating">
                        <input class="form-control fs-5" type="text" id="name" name="name" placeholder="Nombre completo"
                            data-bs-toggle="tooltip" data-bs-placement="right" title="Nombre completo"
                            value="<?= isset($_GET["name"]) ? $_GET["name"] : '' ?>" required
                            pattern="^[\w\s'\-,.](?=.*[\s][\w])[^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$" />
                        <label for="name">Nombre completo <b class="required-feedback">*</b></label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">
                            Invalido, debe ingresar el nombre completo.
                        </div>
                    </div>
                    <!-- select -->
                    <div data-bs-toggle="tooltip" data-bs-placement="right" title="Seleccione la filial">
                        <select class="form-select multiple-select-field" name="land_number" id="land_number"
                            data-placeholder="Filial*" required="" style="font-size: 1px;" multiple>
                            <option <?= isset($_GET["land_number"]) ? 'selected' : '' ?>>
                                <?= isset($_GET["land_number"]) ? $_GET["land_number"] : '' ?></option>

                            <?php foreach ($relations as $relation) :
                                if (isset($_GET["land_number"])) {
                                    if ($relation['land_number'] == $_GET["land_number"]) {
                                        continue;
                                    }
                                }
                            ?>
                            <option value="<?= $relation['land_number'] ?>">
                                <?= $relation['land_number'] ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">
                            Debe seleccionar una filial.
                        </div>
                    </div>
                    <br />

                    <!-- Input -->
                    <!--
        <div class="form-floating">
            <input class="form-control  fs-5" type="text" id="land_number" name="land_number"
                placeholder="Filial" data-bs-toggle="tooltip" data-bs-placement="right"
                title="Filial ej: P00 " 
                value="<?php // echo isset($_GET["land_number"]) ? $_GET["land_number"] : '' 
                        ?>" required=""
                 />
            <label for="phone">Filial <b class="required-feedback">*</b></label>
            <div class="valid-feedback">Correcto.</div>
            <div class="invalid-feedback">
                 Debe seleccionar una filial.
            </div>
        </div>    -->

                    <!-- Input -->
                    <div class="form-floating">
                        <input class="form-control only-number fs-5" type="text" id="phone" name="phone"
                            placeholder="Teléfono móvil" data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Teléfono ej: 88888888" value="<?= isset($_GET["phone"]) ? $_GET["phone"] : '' ?>"
                            required="" pattern="[0-9]{8,11}" />
                        <label for="phone">Teléfono móvil <b class="required-feedback">*</b></label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">
                            Invalido, debe ingresar un teléfono móvil de entre 8 y 11 dígitos ej:80008000.
                        </div>
                    </div>
                    <!-- Input -->
                    <div class="form-floating">
                        <textarea class="form-control" name="reason" placeholder="Motivo" data-bs-toggle="tooltip"
                            data-bs-placement="right" title="Motivo"
                            value="<?= isset($_GET["reason"]) ? $_GET["reason"] : '' ?>"
                            aria-label="With textarea"></textarea>
                        <label for="reason">Motivo <b class="required-feedback">*</b></label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">
                            Invalido.
                        </div>
                    </div>
                    <!-- Error -->
                    <?php if (isset($error)) { ?>
                    <div class="form-floating required-feedback mt-3">
                        <div class="alert alert-warning d-flex align-items-center">
                            <i class="fas fa-exclamation-triangle mr-3"></i>
                            <div style="color: black;">
                                <?= $error ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <br><br>
                    <!-- required message -->
                    <div class="required-feedback">Campos requeridos*.</div>
                    <!-- hidden input -->
                    <input name="relative_vehicle_id" type="hidden"
                        value=<?= isset($edit_enabled) ? $item['relative_vehicle_id'] : ''; ?>>
                    <!-- hidden input -->
                    <input name="entries" type="hidden" value="entries">
                    <!-- submit -->
                    <div class="text-center" style="margin-top: 30px">
                        <input class="btn btn-primary btn-lg fs-4" style="width: 100%; height:70px;border-radius: 15px;"
                            type="submit" value="Verificar Ingreso" data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Verificar Ingreso">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
window.addEventListener('load', (event) => {
    $('.multiple-select-field').select2({
        language: "es",
        theme: "bootstrap-5",
        width: '100%',
        placeholder: $(this).data('placeholder'),
        maximumSelectionLength: 1,
    });
});
</script>