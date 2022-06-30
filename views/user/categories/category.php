<?php

    require('../../../../olx/config/db.php');
    include('../../../../olx/views/user/templates/header.php');

    $category_id = $_GET['id'];
    $adverts = mysqli_query($connect, "SELECT adverts.id as advert_id, 
    images.id as img_id, 
    adverts.title as advert_title, 
    images.image as img_image, 
    images.advert_id as advert_image_id, 
    adverts.description as advert_des, 
    adverts.price as advert_price,
    adverts.user_id as advert_user_id,
    users.id as user_id,
    users.name as user_name,
    users.phone as user_phone,
    categories.id as category_id,
    categories.name as category_name
    FROM `adverts`
    LEFT JOIN images ON images.id = adverts.image_id
    LEFT JOIN users ON users.id = adverts.user_id
    LEFT JOIN categories ON categories.id = adverts.category_id
    WHERE adverts.category_id = '$category_id'");
    // $adverts = mysqli_fetch_all($adverts);

    $sqlCategories = "SELECT * FROM categories";

    $categories = mysqli_query($connect, $sqlCategories);
    $categories = mysqli_fetch_all($categories);

    $sqlSubCat = "SELECT 
        subcategories.id as subcat_id,
        subcategories.name as subcat_name,
        subcategories.category_id as subcat_cat_id,
        categories.id as cat_id,
        categories.name as cat_name
        FROM subcategories
        INNER JOIN categories ON categories.id = subcategories.category_id
        WHERE subcategories.category_id = '$category_id'";

    $subcategories = mysqli_query($connect, $sqlSubCat);

?>

        <ul class="nav grey lighten-4 py-4">
            <div class="container-fluid d-flex">
                <?php
                    foreach($categories as $category) {
                ?>
                <li class="nav-item">
                    <a class="btn btn-orange text-center" href="/views/user/categories/category.php?id=<?=$category[0]?>"><?= $category[1] ?></a>
                </li>
                <?php
                    }
                ?>
            </div>
        </ul>

        <ul class="nav grey lighten-4 py-4">
            <div class="container-fluid d-flex justify-content-center">
                <?php
                    foreach($subcategories as $subcategory) {
                ?>
                <li class="nav-item">
                    <a class="btn btn-orange text-center" href="/views/user/categories/subcategory.php?id=<?=$subcategory['subcat_id']?>"><?= $subcategory['subcat_name'] ?></a>
                </li>
                <?php
                    }
                ?>
            </div>
        </ul>

<div class="container my-5">
  
  <!--Section: Content-->
    <section class="dark-grey-text">

        <!-- Section heading -->
        <h3 class="text-center font-weight-bold mb-5">Категории</h3>

        <!-- Grid row -->
        <div class="row">
        <div class="container my-5">
        <div class="row">
            <?php
                // die(var_dump($adverts));
            if(!empty($adverts)) {
                foreach($adverts as $advert) {
            ?>
            <div class="col-md-4 mt-5">
                <div class="card">
                    <img src="../../../../olx/views/user/images/<?= $advert['img_image'] ?>" class="card-img-top" alt=""/>
                    <div class="card-body">
                        <h5 class="card-title"><?= $advert['advert_title'] ?></h5>
                        <h5 class=""><?= $advert['advert_price'] ?> тг.</h5>
                        <a href="advert.php?id=<?= $advert['advert_id'] ?>" class="btn btn-orange">Посмотреть</a>
                    </div>
                </div>
            </div>
            <?php
                    }
                } else {
            ?>
            <h3>Товаров нет</h3>
            <?php
                }
            ?>
        </div>
    </div>
        </div>
        <!-- Grid row -->

    </section>
  <!--Section: Content-->


</div>

<?php
    include('../../user/templates/footer.php');
?>