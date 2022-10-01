<!--Form-->
<?php echo form_open('authorized/save'); ?>
<fieldset>
    <!--Form Name -->
    <h1><?= isset($item) ? 'Editar' : 'Nuevo'; ?> Autorizado</h1>
    <!--Input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="identity"></label>
        <div class="col-md-4">
            <input id="identity" name="identity" type="number" data-bs-toggle="tooltip" title="Identificación"
                placeholder="Identificación" class="form-control input-md" required=""
                value=<?= isset($item) ? $item['identity'] : ''; ?>>
        </div>
    </div>
    <!-- Select -->
    <div class="form-group">
        <div class="col-md-4">
            <label class="col-md-4 control-label" for="name"></label>
            <select class="form-select" name="condo_owner_id" id="single-select-clear-field"
                data-placeholder="Condomino" required="" data-bs-toggle="tooltip" title="Condomino">
                <option></option>
                <?php foreach ($relations as $relation) :
                    $selected = '';
                    if (isset($item)) {
                        if ($relation['condo_owner_id'] == $item['condo_owner_id']) {
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        }
                    }
                ?>
                <option <?= $selected ?> value="<?= $relation['condo_owner_id'] ?>">
                    <?= $relation['identity'] . ' - ' . $relation['name'] . ' - ' . $relation['land_number'] ?>
                </option>
                <?php endforeach ?>
            </select>
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
        <label class="col-md-4 control-label" for="vehicle_plate"></label>
        <div class="col-md-4">
            <input id="vehicle_plate" name="vehicle_plate" type="number" data-bs-toggle="tooltip"
                title="Placa de vehículo" placeholder="Placa de vehículo" class="form-control input-md" required=""
                value=<?= isset($item) ? $item['vehicle_plate'] : ''; ?>>
        </div>
    </div>
    <!--Input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="reason"></label>
        <div class="col-md-4">
            <input id="reason" name="reason" type="text" data-bs-toggle="tooltip" title="Motivo" placeholder="Motivo"
                class="form-control input-md" required="" value=<?= isset($item) ? $item['reason'] : ''; ?>>
        </div>
    </div>
    <!--Input-->
    <div class="form-group">
        <label class="col-md-4 py-2 control-label" for="entry_at">Fecha de entrada</label>
        <div class="col-md-4">
            <input id="entry_at" data-bs-toggle="tooltip" title="Fecha de entrada" name="entry_at" type="datetime-local"
                placeholder="Fecha de entrada" class="form-control input-md" required=""
                value=<?= isset($item) ? $item['entry_at'] : ''; ?>>
        </div>
    </div>
    <!--Input-->
    <div class="form-group">
        <label class="col-md-4 py-2 control-label" for="out_at">Fecha de salida</label>
        <div class="col-md-4">
            <input id="out_at" data-bs-toggle="tooltip" title="Fecha de salida" name="out_at" type="datetime-local"
                placeholder="Fecha de salida" class="form-control input-md" required=""
                value=<?= isset($item) ? $item['out_at'] : ''; ?>>
        </div>
    </div>
    <!--Input-->
    <div class="form-group">
        <label class="col-md-4 py-2 control-label" for="expiration_at">Fecha de expiracion</label>
        <div class="col-md-4">
            <input id="expiration_at" data-bs-toggle="tooltip" title="Fecha de expiracion" name="expiration_at"
                type="datetime-local" placeholder="Fecha de expiracion" class="form-control input-md" required=""
                value=<?= isset($item) ? $item['expiration_at'] : ''; ?>>
        </div>
    </div>
    <!--Hidden Input-->
    <input name="authorized_id" type="hidden" value=<?= isset($item) ? $item['authorized_id'] : ''; ?>>
    <!--Submit-->
    <br>
    <br>
    <div class="form-group">
        <div class="col-md-4">
            <a href="<?= base_url('authorized') ?>" class="btn  btn-secondary" style="font-size: 25px;"
                data-bs-toggle="tooltip" title="Atrás">Atrás</a>
            <input type="submit" data-bs-toggle="tooltip" title="<?= isset($item) ? 'Editar' : 'Guardar'; ?>"
                name="edit" value="<?= isset($item) ? 'Editar' : 'Guardar'; ?>" class="btn btn-primary"
                style="font-size: 25px; width:75%">
        </div>
    </div>

</fieldset>
<?php
echo form_close();
?>