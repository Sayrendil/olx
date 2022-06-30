<?php

    include('../../../views/admin/templates/header.php');
    require('../../../config/db.php');

    $sql = "SELECT * FROM categories";

    $categories = mysqli_query($connect, $sql);
    $categories = mysqli_fetch_all($categories);

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
                        <th scope="col">Edit</th>
                        <th scope="col">Del</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($categories as $category) {
                    ?>
                    <tr>
                        <th scope="row"><?= $category[0] ?></th>
                        <td><?= $category[1] ?></td>
                        <td><a href="../../../views/admin/categories/edit.php?category=<?= $category[0] ?>" class="btn btn-warning">Edit</a></td>
                        <td><a href="../../../views/admin/categories/destroy.php?category=<?= $category[0] ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>