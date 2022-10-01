<?php

echo form_open('reservation/save'); ?>
<fieldset>

        <!-- Form Name -->
        <legend><?= isset($item) ? 'Editar' : 'Nueva'; ?> Reservacion</legend>


        <!-- input-->
        <div class="form-group">
                <label class="col-md-4 control-label" for="entry_at"></label>
                <div class="col-md-4">
                        <input id="entry_at" name="entry_at" type="datetime-local" placeholder="Fecha de entrada" class="form-control input-md" required="" value=<?= isset($item) ? $item['entry_at'] : ''; ?>>

                </div>
        </div>
        <!-- input-->
        <div class="form-group">
                <label class="col-md-4 control-label" for="out_at"></label>
                <div class="col-md-4">
                        <input id="out_at" name="out_at" type="datetime-local" placeholder="Fecha de salida" class="form-control input-md" required="" value=<?= isset($item) ? $item['out_at'] : ''; ?>>

                </div>
        </div>



        <br>
        <br>
        <input name="reservation_id" type="hidden" value=<?= isset($item) ? $item['reservation_id'] : ''; ?>>

        <a href="<?= base_url('reservation') ?>" class="btn  btn-secondary">atras</a>
        <input type="submit" name="edit" value="<?= isset($item) ? 'Editar' : 'Guardar'; ?>" class="btn btn-primary">

</fieldset>
<?php
echo form_close();
?>