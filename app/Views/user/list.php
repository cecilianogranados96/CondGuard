<div class="container-sm">
    <?php
    echo base_url();
    echo "<br>";
    echo site_url();

    ?>
    <a href="<?= base_url('user/new') ?>" class="btn  btn-primary">test</a>
    <br>
    <h1>Users</h1>
    <hr> <a href="<?= base_url('user/new') ?>" class="btn  btn-primary">new</a>
    <div class="table-responsive ">
        <table class="table ">

            <thead>
                <tr>
                    <th scope="col">identity</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col">role</th>
                    <th scope="col">option</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) {
                    echo "<tr scope='row'>";
                    echo "<td >" . $user['identity'] . "</td>";
                    echo "<td >" . $user['name'] . "</td>";
                    echo "<td >" . $user['email'] . "</td>";
                    echo "<td >" . $user['phone'] . "</td>";
                    echo "<td >" . $user['user_role'] . "</td>";
                    echo "<td >";
                ?>
                <a href="<?php echo base_url('user/edit?user_id=' . $user['user_id']); ?>"
                    class="btn btn-warning">edit</a>
                |
                <a href="<?php echo base_url(); ?>/user/delete?user_id=<?php echo $user['user_id']; ?>"
                    class="btn btn-danger">delete</a>
                <?php
                    echo "</td>";
                    echo '</tr>';
                }
                ?>

            </tbody>
        </table>
    </div>
</div>