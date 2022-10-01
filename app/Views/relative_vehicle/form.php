<?php

echo form_open('relative_vehicle/save'); ?>
<fieldset>

        <!-- Form Name -->
        <legend><?= isset($item) ? 'Editar' : 'Nueva'; ?> Vehiculo de Acreditado</legend>



        <!--  input-->
        <div class="form-group">
                <label class="col-md-4 control-label" for="vehicle_plate"></label>
                <div class="col-md-4">
                        <input id="vehicle_plate" name="vehicle_plate" type="text" placeholder="Placa de vehiculo" class="form-control input-md" required="" value=<?= isset($item) ? $item['vehicle_plate'] : ''; ?>>

                </div>
        </div>

        <!--  input-->
        <div class="form-group">
                <label class="col-md-4 control-label" for="description"></label>
                <div class="col-md-4">
                        <input id="description" name="description" type="text" placeholder="Descripcion" class="form-control input-md" required="" value=<?= isset($item) ? $item['description'] : ''; ?>>

                </div>
        </div>


        <br>
        <br>
        <input name="relative_vehicle_id" type="hidden" value=<?= isset($item) ? $item['relative_vehicle_id'] : ''; ?>>

        <a href="<?= base_url('relative_vehicle') ?>" class="btn  btn-secondary">atras</a>
        <input type="submit" name="edit" value="<?= isset($item) ? 'Editar' : 'Guardar'; ?>" class="btn btn-primary">

</fieldset>
<?php
echo form_close();
?>