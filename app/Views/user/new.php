<div class="container-sm">
    <?php
    echo form_open('/user/save');
    echo form_label('Identification', 'identity');
    echo '<br>';
    echo form_input(array('name' => 'identity', 'placeholder' => 'Identification', 'type' => 'text'));
    echo '<br>';
    echo form_label('Nombre', 'name');
    echo '<br>';
    echo form_input(array('name' => 'name', 'placeholder' => 'Nombre del usuario', 'type' => 'text'));
    echo '<br>';
    echo form_label('Correo', 'email');
    echo '<br>';
    echo form_input(array('name' => 'email', 'placeholder' => 'Correo del usuario', 'type' => 'email'));
    echo '<br>';
    echo form_label('Contraseña', 'password');
    echo '<br>';
    echo form_input(array('name' => 'password', 'placeholder' => 'Contraseña del usuario', 'type' => 'password'));
    echo '<br>';
    echo form_label('Telefono', 'phone');
    echo '<br>';
    echo form_input(array('name' => 'phone', 'placeholder' => 'Telefono del usuario', 'type' => 'text'));
    echo '<br>';
    echo form_label('Pago', 'payment');
    echo '<br>';
    echo form_input(array('name' => 'payment', 'placeholder' => 'Pago del usuario', 'type' => 'text'));
    echo '<br>';
    echo '<br>';
    ?>
    <a href="<?= base_url() ?>/user/list" class="btn  btn-secondary">return</a>
    <?php
    echo form_submit('save', 'Save', ['class' => 'btn btn-primary']);
    echo form_close();
    ?>
</div>