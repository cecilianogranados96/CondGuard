<form action="<?= base_url('common_area/save') ?>" method="post" class="row  form-floating needs-validation"
    enctype="multipart/form-data" novalidate>
    <div class="col-auto" style="width: 440px">
        <div class="card card-body">
            <div class="row g-3 ">
                <!-- title -->
                <h1 class="mt-4">
                    <?= isset($edit_enabled) ? 'Editar' : 'Nueva'; ?>
                    Área Común
                </h1>
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control" type="text" id="name" name="name" placeholder="Nombre"
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Nombre de menos de 50 caracteres."
                        value="<?= isset($item) ? $item['name'] : ''; ?>" required
                        pattern="^[\w\s'\-,.0-9][^_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$" />
                    <label for="name">Nombre<b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar el nombre del área común de menos de 50 caracteres.
                    </div>
                </div>
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control" type="text" id="address" name="address"
                        placeholder="Dirección de menos de 50 caracteres" data-bs-toggle="tooltip"
                        data-bs-placement="right" title="Lugar" value="<?= isset($item) ? $item['address'] : ''; ?>"
                        required pattern="^[\w\s'\-,.0-9][^_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,50}$" />
                    <label for="address">Dirección <b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido,una dirección del área común de menos de 50 caracteres.
                    </div>
                </div>
                <!-- Input -->
                <div class="form-floating">
                    <input class="form-control only-number" type="text" name="condo_capacity"
                        placeholder="Capacidad de filiales" data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Capacidad de filiales del área común"
                        value="<?= isset($item) ? $item['condo_capacity'] : ''; ?>" required="" pattern="[0-9]{1,6}" />
                    <label for="condo_capacity">Capacidad de filiales <b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar una capacidad apropiada ej: 2 , 5.
                    </div>
                </div>
                <!-- Input -->
                <div class="form-floating">
                    <input class="form-control only-number" type="text" name="people_capacity"
                        placeholder="Capacidad de personas" data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Capacidad de personas del área común"
                        value="<?= isset($item) ? $item['people_capacity'] : ''; ?>" required="" pattern="[0-9]{1,6}" />
                    <label for="people_capacity">Capacidad de personas <b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar una capacidad apropiada ej: 25 , 50.
                    </div>
                </div>
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control only-alphanumeric" type="text" id="status" name="status"
                        placeholder="Estado" data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Estado correspondiente." value="<?= isset($item) ? $item['status'] : ''; ?>" required
                        pattern="^[\w\s'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$" />
                    <label for="status">Estado <b class="required-feedback">*</b></label>
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar estado correspondiente.
                    </div>
                </div>
                <!-- required message -->
                <div class="required-feedback">Campos requeridos*.</div>
                <!-- hidden input -->
                <input name="common_area_id" type="hidden"
                    value=<?= isset($edit_enabled) ? $item['common_area_id'] : ''; ?>>
                <!-- submit -->
                <div style="margin-top: 20px;">
                    <a class="btn btn-secondary btn-lg" role="button" style="width: 39%"
                        href="<?= base_url('common_area') ?>" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Atrás">
                        Atrás
                    </a><input class="btn btn-primary btn-lg" style="width: 59%; margin-left: 2%" type="submit"
                        value="<?= isset($edit_enabled) ? 'Editar' : 'Guardar'; ?>" data-bs-toggle="tooltip"
                        data-bs-placement="right" title="<?= isset($edit_enabled) ? 'Editar' : 'Guardar'; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="w-100 d-xl-none d-xxl-none" style="margin: 4%"></div>
    <div class="col ">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Imagen <b class="required-feedback">*</b></h4>
                <div class="form-group">
                    <input type="file" name="image" class="form-control" id="image" onchange="previewImageFile(this);"
                        accept=".png, .jpg, .jpeg" <?= isset($edit_enabled) ? "" : "required=''" ?> />
                    <div class="valid-feedback">Correcto.</div>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar una imagen en formato jpg, jpeg o png (4MB peso maximo).
                    </div>
                    <img src=<?= isset($item) ? '/assets/img/common_areas/' . $item['image'] : '' ?>
                        alt="Vista previa de imagen." id="preview-image" class="img-fluid hideImage  " width="55%"
                        style="margin-top: 15px;">
                    <?=
                    "<div class='required-feedback'>" . \Config\Services::validation()->listErrors() . "</div>"
                    ?>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
function previewImageFile(input, id) {
    var output = document.getElementById('preview-image');
    output.removeAttribute("class");
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src)
    }
}
</script>