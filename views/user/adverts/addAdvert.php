<?php

    include('../../../../olx/views/user/templates/header.php');
    require('../../../../olx/config/db.php');

    if(isset($_SESSION['user'])) {

        if(isset($_GET['category'])) {
            $category_id = $_GET['category'];
        }

        $sqlCategories = "SELECT * FROM categories";

        $categories = mysqli_query($connect, $sqlCategories);
        $categories = mysqli_fetch_all($categories);

        $sqlSubCat = "SELECT * FROM subcategories WHERE category_id = '$category_id'";
        $subcategories = mysqli_query($connect, $sqlSubCat);
        $subcategories = mysqli_fetch_all($subcategories);

?>
        <ul class="nav grey lighten-4 py-4">
            <div class="container-fluid d-flex">
                <?php
                    foreach($categories as $category) {
                ?>
                <li class="nav-item">
                    <a class="btn btn-orange text-center" href="../../../../olx/views/user/categories/category.php?id=<?=$category[0]?>"><?= $category[1] ?></a>
                </li>
                <?php
                    }
                ?>
            </div>
        </ul>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <form action="/vendor/adverts/create.php" method="POST" name="addAdvert" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="Title">Название: </label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="category" id="category" value="<?= $category_id ?>">
                        </div>
                        <div class="form-group">
                            <label for="category">Раздел: </label>
                            <select name="subcategory" id="subcategory" class="form-control">
                            <?php
                                foreach($subcategories as $subcategory) {
                            ?>
                                <option value="<?= $subcategory[0] ?>"><?= $subcategory[1] ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Описание: </label>
                            <textarea name="description" id="description" cols="30" rows="6" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Цена: </label>
                            <input type="number" class="form-control" name="price" id="price">
                        </div>
                        <div class="form-group">
                            <label for="image">Фотография: </label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <button type="submit" class="btn btn-success" name="addAdvert">Добавить</button>
                    </form>
                </div>
            </div>
        </div>

<?php
    } else {
?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
        <div class="alert alert-danger">
            Войдите или зарегистрируйтесь в системе
        </div>
        </div>
    </div>
</div>

<?php
    }
    include('../../../../olx/views/user/templates/footer.php')
?>