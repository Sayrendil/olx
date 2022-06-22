<?php

    require('../../../config/db.php');
    include('../../../../olx/views/user/templates/header.php');

    $sqlAdverts = "SELECT adverts.id as advert_id, 
    images.id as image_id, 
    adverts.title as advert_title, 
    adverts.price as advert_price, 
    images.image as image_image, 
    images.advert_id as img_advert_id 
    FROM `adverts`
    LEFT JOIN images ON images.id = adverts.id";

    $adverts = mysqli_query($connect, $sqlAdverts);

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

    <div class="container my-5">
        <div class="row">
            <?php
                // die(var_dump($adverts));
                foreach($adverts as $advert) {
            ?>
            <div class="col-md-4 mt-5">
                <div class="card">
                    <img src="../../../../olx/views/user/images/<?= $advert['image_image'] ?>" class="card-img-top" alt=""/>
                    <div class="card-body">
                        <h5 class="card-title"><?= $advert['advert_title'] ?></h5>
                        <h5 class=""><?= $advert['advert_price'] ?> тг.</h5>
                        <a href="advert.php?id=<?= $advert['advert_id'] ?>" class="btn btn-orange">Посмотреть</a>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>

<?php
    include('../../../../olx/views/user/templates/footer.php');
?>