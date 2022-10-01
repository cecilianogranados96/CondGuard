<!-- Form -->
<?php echo form_open('administrator/save'); ?>
<fieldset>

    <!-- Form Name -->
    <h1><?= isset($item) ? 'Editar' : 'Nuevo'; ?> Administrador</h1>
    <!--  Input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="identity"></label>
        <div class="col-md-4">
            <input id="identity" name="identity" type="number" data-bs-toggle="tooltip" title="Identificación"
                placeholder="Identificación" class="form-control input-md" required=""
                value=<?= isset($item) ? $item['identity'] : ''; ?>>
        </div>
    </div>
    <!--Input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="name"></label>
        <div class="col-md-4">
            <input id="name" name="name" type="text" data-bs-toggle="tooltip" title="Nombre Completo"
                placeholder="Nombre Completo" class="form-control input-md" required=""
                value=<?= isset($item) ? $item['name'] : ''; ?>>
        </div>
    </div>
    <!--Input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="email"></label>
        <div class="col-md-4">
            <input id="email" name="email" type="email" data-bs-toggle="tooltip" title="Correo Electrónico"
                placeholder="Correo Electrónico" class="form-control input-md" required=""
                value=<?= isset($item) ? $item['email'] : ''; ?>>
        </div>
    </div>
    <!--Input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="password"></label>
        <div class="col-md-4">
            <input id="password" name="password" type="password" data-bs-toggle="tooltip" title="Contraseña"
                placeholder="Contraseña" class="form-control input-md" required=""
                value=<?= isset($item) ? $item['password'] : ''; ?>>
        </div>
    </div>
    <!--Input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="phone"></label>
        <div class="col-md-4">
            <input id="phone" name="phone" type="number" data-bs-toggle="tooltip" title="Teléfono Móvil"
                placeholder="Teléfono Móvil" class="form-control input-md"
                value=<?= isset($item) ? $item['phone'] : ''; ?>>
        </div>
    </div>
    <!--Hidden Input-->
    <input name="administrator_id" type="hidden" value=<?= isset($item) ? $item['administrator_id'] : ''; ?>>
    <!--Submit-->
    <br>
    <br>
    <div class="form-group">
        <div class="col-md-4">
            <a href="<?= base_url('administrator') ?>" class="btn  btn-secondary" style="font-size: 25px;"
                data-bs-toggle="tooltip" title="Atrás">Atrás</a>
            <input type="submit" name="edit" data-bs-toggle="tooltip"
                title="<?= isset($item) ? 'Editar' : 'Guardar'; ?>" value="<?= isset($item) ? 'Editar' : 'Guardar'; ?>"
                class="btn btn-primary" style="font-size: 25px; width:75%">
        </div>
    </div>
</fieldset>
<?php
echo form_close();
?>