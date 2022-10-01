<?php

echo form_open('patrol/save'); ?>
<fieldset>

        <!-- Form Name -->
        <legend><?= isset($item) ? 'Editar' : 'Nueva'; ?> Patrulla</legend>



        <!--  input-->
        <div class="form-group">
                <label class="col-md-4 control-label" for="latitude"></label>
                <div class="col-md-4">
                        <input id="latitude" name="latitude" type="text" placeholder="Latitud" class="form-control input-md" required="" value=<?= isset($item) ? $item['latitude'] : ''; ?>>

                </div>
        </div>
        <!--  input-->
        <div class="form-group">
                <label class="col-md-4 control-label" for="longitude"></label>
                <div class="col-md-4">
                        <input id="longitude" name="longitude" type="text" placeholder="Longitud" class="form-control input-md" required="" value=<?= isset($item) ? $item['longitude'] : ''; ?>>

                </div>
        </div>

        <!--  input-->
        <div class="form-group">
                <label class="col-md-4 control-label" for="code"></label>
                <div class="col-md-4">
                        <input id="code" name="code" type="text" placeholder="Codigo" class="form-control input-md" required="" value=<?= isset($item) ? $item['code'] : ''; ?>>

                </div>
        </div>


        <br>
        <br>
        <input name="patrol_id" type="hidden" value=<?= isset($item) ? $item['patrol_id'] : ''; ?>>

        <a href="<?= base_url('patrol') ?>" class="btn  btn-secondary">atras</a>
        <input type="submit" name="edit" value="<?= isset($item) ? 'Editar' : 'Guardar'; ?>" class="btn btn-primary">

</fieldset>
<?php
echo form_close();
?>