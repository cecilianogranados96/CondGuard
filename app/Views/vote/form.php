<?php

echo form_open('vote/save'); ?>
<fieldset>

    <!-- Form Name -->
    <legend><?= isset($item) ? 'Editar' : 'Nueva'; ?> Voto</legend>



    <!--  input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="answer"></label>
        <div class="col-md-4">
            <input id="answer" name="answer" type="text" placeholder="Respuesta" class="form-control input-md"
                required="" value=<?= isset($item) ? $item['answer'] : ''; ?>>

        </div>
    </div>


    <br>
    <br>
    <input name="vote_id" type="hidden" value=<?= isset($item) ? $item['vote_id'] : ''; ?>>

    <a href="<?= base_url('vote') ?>" class="btn  btn-secondary">atras</a>
    <input type="submit" name="edit" value="<?= isset($item) ? 'Editar' : 'Guardar'; ?>" class="btn btn-primary">

</fieldset>
<?php
echo form_close();
?>