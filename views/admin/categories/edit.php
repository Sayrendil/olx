<?php

    include('../../../views/admin/templates/header.php');
    require('../../../config/db.php');
    if(isset($_GET['category'])) {
        $category_id = $_GET['category'];
    }

    $sql = "SELECT * FROM categories WHERE id = '$category_id'";

    $category = mysqli_query($connect, $sql);
    $category = mysqli_fetch_assoc($category);

?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <form action="edit">
                <div class="form-group">
                    <label for="">Название</label>
                    <input type="text" class="form-control" value="<?= $category['name'] ?>">
                </div>
                <button class="btn btn-success" type="submit">Принять</button>
            </form>
        </div>
    </div>
</div>