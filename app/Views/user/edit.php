<div class="container-sm">
    <?php
    echo form_open('/user/save');
    echo form_label('Identification', 'identity');
    echo '<br>';
    echo form_input(array('name' => 'identity', 'placeholder' => 'Identification', 'type' => 'text', 'value' => $user['identity']));
    echo '<br>';
    echo form_label('Nombre', 'name');
    echo '<br>';
    echo form_input(array('name' => 'name', 'placeholder' => 'Nombre del usuario', 'type' => 'text', 'value' => $user['name']));
    echo '<br>';
    echo form_label('Correo', 'email');
    echo '<br>';
    echo form_input(array('name' => 'email', 'placeholder' => 'Correo del usuario', 'type' => 'email', 'value' => $user['email']));
    echo '<br>';
    echo form_label('Contraseña', 'password');
    echo '<br>';
    echo form_input(array('name' => 'password', 'placeholder' => 'Contraseña del usuario', 'type' => 'password', 'value' => $user['password']));
    echo '<br>';
    echo form_label('Telefono', 'phone');
    echo '<br>';
    echo form_input(array('name' => 'phone', 'placeholder' => 'Telefono del usuario', 'type' => 'phone', 'value' => $user['phone']));
    echo '<br>';
    echo '<br>';

    echo form_hidden('user_id', $user['user_id']);
    ?>
    <a href="<?= base_url() ?>/user/list" class="btn  btn-secondary">return</a>
    <?php
    echo form_submit('save', 'Edit', ['class' => 'btn btn-primary']);

    echo form_close();
    ?>
</div>