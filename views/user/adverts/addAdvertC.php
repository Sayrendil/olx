<?php

    include('../../../../olx/views/user/templates/header.php');
    require('../../../../olx/config/db.php');

    if(isset($_SESSION['user'])) {

        $sqlCategories = "SELECT * FROM categories";

        $categories = mysqli_query($connect, $sqlCategories);
        $categories = mysqli_fetch_all($categories);

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
                    <form action="/views/user/adverts/addAdvert.php" method="GET">
                        <div class="form-group">
                            <label for="category">Категории: </label>
                            <select name="category" id="category" class="form-control">
                            <?php
                                foreach($categories as $category) {
                            ?>
                                <option value="<?= $category[0] ?>"><?= $category[1] ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Далее</button>
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