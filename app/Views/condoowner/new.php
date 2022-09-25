<div class="container-fluid text-bg-light" style="padding: 2%">
    <div class="row">
        <h1>Crear nuevo condomino </h1>
    </div>
    <div class="row">
        <?php
        echo form_open('condoowner/save'); ?>
        <label for="identity">Identification</label>
        <br>
        <input type="text" name="identity" value="" placeholder="Identification">
        <br>
        <label for="name">Nombre</label>
        <br>
        <input type="text" name="name" value="" placeholder="Nombre del usuario">
        <br>
        <label for="email">Correo</label>
        <br>
        <input type="email" name="email" value="" placeholder="Correo del usuario">
        <br>
        <label for="password">Contraseña</label>
        <br>
        <input type="password" name="password" value="" placeholder="Contraseña del usuario">
        <br>
        <label for="phone">Telefono</label>
        <br>
        <input type="text" name="phone" value="" placeholder="Telefono del usuario">
        <br>
        <br>
        <br>
        <a href="<?= base_url('condoowner') ?>" class="btn  btn-secondary">atras</a>
        <input type="submit" name="save" value="Guardar" class="btn btn-primary">
        <?php
        echo form_close();
        ?>
    </div>
</div>