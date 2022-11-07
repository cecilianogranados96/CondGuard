<div class="container my-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 col-xl-6">
            <div class="card-body d-flex flex-column align-items-center">
                <form action="<?= base_url('patrol/save') ?>" method="post"
                    class="row g-3 form-floating needs-validation" novalidate>
                    <!-- title -->
                    <h1 class="text-center my-4">
                        Patrulla
                    </h1>
                    <!-- input -->
                    <div class="form-floating">
                        <input class="form-control " type="text" id="officer_id" name="officer_id" placeholder="Latitud"
                            data-bs-toggle="tooltip" data-bs-placement="right" title="Identidad oficial."
                            value="<?= isset($_GET["id"]) ? $_GET["id"] : '' ?>" required />
                        <label for="officer_id">Oficial<b class="required-feedback">*</b></label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">
                            Invalido, debe ingresar una identificación oficial.
                        </div>
                    </div>
                    <br />
                    <!-- input -->
                    <div class="form-floating">
                        <input class="form-control only-number" type="text" id="latitude" name="latitude"
                            placeholder="Latitud" data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Latitud válida ej: 40.000." required pattern="([-+]?(([1-8]?\d(\.\d+))+|90))" />
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
                            title="Longitud válida ej: 40.000." required pattern="([-+]?(([1-8]?\d(\.\d+))+|90))" />
                        <label for="longitude">Longitud<b class="required-feedback">*</b></label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">
                            Invalido, debe ingresar una longitud válida ej: 40.000 .
                        </div>
                    </div>
                    <!-- input -->
                    <div class="form-floating">
                        <input class="form-control" type="text" id="code" name="code" placeholder="Código QR"
                            data-bs-toggle="tooltip" data-bs-placement="right" title="Código QR." required />
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
                    <!-- submit -->
                    <div class="text-center" style="margin-top: 20px;">
                        <input class="btn btn-primary btn-lg" style="width: 59%; margin-left: 2%" type="submit"
                            value="<?= isset($edit_enabled) ? 'Editar' : 'Guardar'; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="right" title="<?= isset($edit_enabled) ? 'Editar' : 'Guardar'; ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>