<?php

    include('../../../views/admin/templates/header.php');
    require('../../../config/db.php');

    $sql = "SELECT * FROM users";

    $users = mysqli_query($connect, $sql);
    $users = mysqli_fetch_all($users);

    // die(var_dump($_SESSION['errors']));

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Login</th>
                        <th scope="col">role_id</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($users as $user) {
                    ?>
                    <tr>
                        <th scope="row"><?= $user[0] ?></th>
                        <td><?= $user[1] ?></td>
                        <td><?= $user[2] ?></td>
                        <td><?= $user[3] ?></td>
                        <td><?= $user[5] ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>