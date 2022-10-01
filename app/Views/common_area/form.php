<!-- Form -->
<?php echo form_open('common_area/save'); ?>
<fieldset>
    <!-- Form Name -->
    <h1><?= isset($item) ? 'Editar' : 'Nueva'; ?> Área comun</h1>
    <!-- Input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="name"></label>
        <div class="col-md-4">
            <input id="name" name="name" type="text" data-bs-toggle="tooltip" title="Nombre" placeholder="Nombre"
                class="form-control input-md" required="" value=<?= isset($item) ? $item['name'] : ''; ?>>
        </div>
    </div>
    <!-- Input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="address"></label>
        <div class="col-md-4">
            <input id="address" name="address" type="text" data-bs-toggle="tooltip" title="Dirección"
                placeholder="Dirección" class="form-control input-md" required=""
                value=<?= isset($item) ? $item['address'] : ''; ?>>
        </div>
    </div>
    <!-- Input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="condo_capacity"></label>
        <div class="col-md-4">
            <input id="condo_capacity" name="condo_capacity" type="number" data-bs-toggle="tooltip"
                title="Capacidad de filiales" placeholder="Capacidad de filiales" class="form-control input-md"
                required="" value=<?= isset($item) ? $item['condo_capacity'] : ''; ?>>
        </div>
    </div>
    <!-- Input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="people_capacity"></label>
        <div class="col-md-4">
            <input id="people_capacity" name="people_capacity" type="number" data-bs-toggle="tooltip"
                title="Capacidad de personas" placeholder="Capacidad de personas" class="form-control input-md"
                required="" value=<?= isset($item) ? $item['people_capacity'] : ''; ?>>
        </div>
    </div>
    <!-- Input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="people_capacity"></label>
        <div class="col-md-4">
            <input id="status" name="status" type="text" data-bs-toggle="tooltip" title="Estado" placeholder="Estado"
                class="form-control input-md" required="" value=<?= isset($item) ? $item['status'] : ''; ?>>
        </div>
    </div>
    <!--Hidden Input-->
    <input name="common_area_id" type="hidden" value=<?= isset($item) ? $item['common_area_id'] : ''; ?>>
    <!--Submit-->
    <br>
    <br>
    <div class="form-group">
        <div class="col-md-4">
            <a href="<?= base_url('common_area') ?>" class="btn  btn-secondary" style="font-size: 25px;"
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