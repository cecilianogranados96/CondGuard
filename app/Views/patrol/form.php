<div class="col-auto" style="width: 440px">
    <div class="card">
        <div class="card-body">
            <!-- Form -->
            <form action="<?= base_url('patrol/save') ?>" method="post" class="row g-3 form-floating needs-validation"
                novalidate>
                <!-- title -->
                <h1><?= isset($edit_enabled) ? 'Editar' : 'Nueva'; ?> Patrulla</h1>
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
                        placeholder="Latitud" data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Latitud válida ej: 40.000." value="<?= isset($item) ? $item['latitude'] : ''; ?>"
                        required pattern="([-+]?(([1-8]?\d(\.\d+))+|90))" />
                    <label for="latitude">Latitud<b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar una latitud válida ej: 40.000 .
                    </div>
                </div>
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control only-number" type="text" id="longitude" name="longitude"
                        placeholder="Longitud" data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Longitud válida ej: 40.000." value="<?= isset($item) ? $item['longitude'] : ''; ?>"
                        required pattern="([-+]?(([1-8]?\d(\.\d+))+|90))" />
                    <label for="longitude">Longitud<b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar una longitud válida ej: 40.000 .
                    </div>
                </div>
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control only-alphanumeric" type="text" id="code" name="code"
                        placeholder="Código QR" data-bs-toggle="tooltip" data-bs-placement="right" title="Código QR."
                        value="<?= isset($item) ? $item['code'] : ''; ?>" required />
                    <label for="code">Código QR<b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar un código QR adecuado.
                    </div>
                </div>
                <!-- required message -->
                <div class="required-feedback">Campos requeridos*.</div>
                <!-- hidden input -->
                <input name="assembly_id" type="hidden" value=<?= isset($edit_enabled) ? $item['patrol_id'] : ''; ?>>
                <!-- submit -->
                <div style="margin-top: 20px;">
                    <a class="btn btn-secondary btn-lg" role="button" style="width: 39%"
                        href="<?= base_url('patrol') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Atrás">
                        Atrás
                    </a><input class="btn btn-primary btn-lg" style="width: 59%; margin-left: 2%" type="submit"
                        value="<?= isset($edit_enabled) ? 'Editar' : 'Guardar'; ?>" data-bs-toggle="tooltip"
                        data-bs-placement="right" title="<?= isset($edit_enabled) ? 'Editar' : 'Guardar'; ?>">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="w-100 d-xl-none d-xxl-none" style="margin: 4%"></div>
<div class="col">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Mapa</h4>
            <div class="mapouter">
                <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no"
                        marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Hacienda el coyol&amp;t=k&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                        href="https://mcpenation.com/">Minecraft Website</a></div>
                <style>
                .mapouter {
                    position: relative;
                    text-align: right;
                    width: 100%;
                    height: 400px;
                }

                .gmap_canvas {
                    overflow: hidden;
                    background: none !important;
                    width: 100%;
                    height: 400px;
                }

                .gmap_iframe {
                    height: 400px !important;
                }
                </style>
            </div>
        </div>
    </div>
</div>