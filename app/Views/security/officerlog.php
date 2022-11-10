<div class="container my-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 col-xl-6">
            <div class="card-body d-flex flex-column align-items-center">
                <form action="<?= base_url('patrol/save') ?>" method="post"
                    class="row g-3 form-floating needs-validation" novalidate>
                    <!-- title -->
                    <h1 class="text-center my-4">
                        Bitácora de seguridad
                    </h1>

                    <!-- select -->
                    <div data-bs-toggle="tooltip" data-bs-placement="right" title="Seleccione el oficial.">
                        <select class="form-select single-select-clear-field" name="officer_id" id="officer_id"
                            data-placeholder="Oficial*" required="" style="font-size: 1px;">
                            <option></option>
                            <?php foreach ($relations as $relation) :
                                $selected = '';
                                if (isset($item)) {
                                    if ($relation['officer_id'] == $item['officer_id']) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                }
                            ?>
                            <option <?= "$selected" ?> value="<?= $relation['officer_id'] ?>">
                                <?= $relation['identity'] . ' - ' . $relation['name'] ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">
                            Debe seleccionar un oficial.
                        </div>
                    </div>
                    <br />
                    <!-- input -->
                    <div class="form-floating">
                        <input class="form-control only-number" type="text" id="latitude" name="latitude"
                            value="<?= isset($_GET["latitude"]) ? $_GET["latitude"] : '' ?>" placeholder="Latitud"
                            data-bs-toggle="tooltip" data-bs-placement="right" title="Latitud válida ej: 40.000."
                            readonly required pattern="([-+]?(([1-8]?\d(\.\d+))+|90))" />
                        <label for="latitude">Latitud<b class="required-feedback">*</b></label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">
                            Invalido, debe ingresar una latitud válida ej: 40.000 .
                        </div>
                    </div>
                    <!-- input -->
                    <div class="form-floating">
                        <input class="form-control only-number" type="text" id="longitude" name="longitude"
                            value="<?= isset($_GET["longitude"]) ? $_GET["longitude"] : '' ?>" placeholder="Longitud"
                            data-bs-toggle="tooltip" data-bs-placement="right" title="Longitud válida ej: 40.000."
                            readonly required pattern="([-+]?(([1-8]?\d(\.\d+))+|90))" />
                        <label for="longitude">Longitud<b class="required-feedback">*</b></label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">
                            Invalido, debe ingresar una longitud válida ej: 40.000 .
                        </div>
                    </div>
                    <!-- input -->
                    <div class="form-floating">
                        <input class="form-control" type="text" id="code" name="code" placeholder="Código QR"
                            value="<?= isset($_GET["code"]) ? $_GET["code"] : '' ?>" data-bs-toggle=" tooltip"
                            data-bs-placement="right" title="Código QR." required readonly />
                        <label for="code">Código QR<b class="required-feedback">*</b></label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">
                            Invalido, debe ingresar un código adecuado.
                        </div>
                    </div>
                    <!-- required message -->
                    <div class="required-feedback">Campos requeridos*.</div>
                    <!-- hidden input -->
                    <input name="assembly_id" type="hidden"
                        value=<?= isset($edit_enabled) ? $item['patrol_id'] : ''; ?>>
                    <!-- hidden input -->
                    <input name="officerlog" type="hidden" value="officerlog">
                    <!-- submit -->
                    <div class="text-center" style="margin-top: 20px;">
                        <input class="btn btn-primary btn-lg fs-4" style="width: 100%; height:70px;border-radius: 15px;"
                            type="submit" value="Guardar" data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>