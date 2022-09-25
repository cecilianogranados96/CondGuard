<div class="container-fluid text-bg-light" style="padding: 2%">
    <div class="row">
        <h1>Editar condomino </h1>
    </div>
    <div class="row">
        <?php
        echo form_open('condoowner/save'); ?>
        <label for="identity">Identification</label>
        <br>
        <input type="text" name="identity" placeholder="Identification" value=<?= $user['identity'] ?>>
        <br>
        <label for="name">Nombre</label>
        <br>
        <input type="text" name="name" value="<?= $user['name'] ?>" placeholder="Nombre del usuario">
        <br>
        <label for="email">Correo</label>
        <br>
        <input type="email" name="email" value="<?= $user['email'] ?>" placeholder="Correo del usuario">
        <br>
        <label for="password">Contraseña</label>
        <br>
        <input type="password" name="password" value="<?= $user['password'] ?>" placeholder="Contraseña del usuario">
        <br>
        <label for="phone">Telefono</label>
        <br>
        <input type="text" name="phone" value="phone" placeholder="Telefono del usuario">
        <br>
        <br>
        <br>
        <?php echo form_hidden('condo_owner_id', $user['condo_owner_id']); ?>
        <a href="<?= base_url('condoowner') ?>" class="btn  btn-secondary">atras</a>
        <input type="submit" name="save" value="Editar" class="btn btn-primary">
        <?php
        echo form_close();
        ?>
    </div>
</div>