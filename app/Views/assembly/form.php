<!-- Form -->
<?php echo form_open('assembly/save'); ?>
<fieldset>
    <!-- Form Name -->
    <h1><?= isset($item) ? 'Editar' : 'Nueva'; ?> Asamblea</h1>
    <!--Input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="name"></label>
        <div class="col-md-4">
            <input id="name" name="name" type="text" data-bs-toggle="tooltip" title="Nombre" placeholder="Nombre"
                class="form-control input-md" required="" value=<?= isset($item) ? $item['name'] : ''; ?>>
        </div>
    </div>
    <!--Input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="place"></label>
        <div class="col-md-4">
            <input id="place" name="place" type="text" data-bs-toggle="tooltip" title="Lugar" placeholder="Lugar"
                class="form-control input-md" required="" value=<?= isset($item) ? $item['place'] : ''; ?>>
        </div>
    </div>
    <!--Hidden Input-->
    <input name="assembly_id" type="hidden" value=<?= isset($item) ? $item['assembly_id'] : ''; ?>>
    <!--Submit-->
    <br>
    <br>
    <div class="form-group">
        <div class="col-md-4">
            <a href="<?= base_url('assembly') ?>" class="btn  btn-secondary" style="font-size: 25px;"
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