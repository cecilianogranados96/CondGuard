<?php

echo form_open('assembly_voting/save'); ?>
<fieldset>

        <!-- Form Name -->
        <legend><?= isset($item) ? 'Editar' : 'Nuevo'; ?> Votaciones</legend>

        <!-- input-->
        <div class="form-group">
                <label class="col-md-4 control-label" for="description"></label>
                <div class="col-md-4">
                        <input id="description" name="description" type="text" placeholder="Descripcion" class="form-control input-md" required="" value=<?= isset($item) ? $item['description'] : ''; ?>>


                </div>
        </div>



        <!-- input-->
        <div class="form-group">
                <label class="col-md-4 control-label" for="question"></label>
                <div class="col-md-4">
                        <input id="question" name="question" type="text" placeholder="Pregunta" class="form-control input-md" required="" value=<?= isset($item) ? $item['question'] : ''; ?>>

                </div>
        </div>



        <br>
        <br>
        <input name="assembly_voting_id" type="hidden" value=<?= isset($item) ? $item['assembly_voting_id'] : ''; ?>>

        <a href="<?= base_url('assembly_voting') ?>" class="btn  btn-secondary">atras</a>
        <input type="submit" name="edit" value="<?= isset($item) ? 'Editar' : 'Guardar'; ?>" class="btn btn-primary">

</fieldset>
<?php
echo form_close();
?>