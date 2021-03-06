<?php

    include('../olx/views/user/templates/header.php');
    require('../olx/config/db.php');

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

    // die(var_dump($_SESSION['errors']));

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
        <div class="container mt-5">
            <?php
                if(isset($_SESSION['error_auth']['session'])) {
            ?>
                <div class="alert alert-danger">
                    <?= $_SESSION['error_auth']['session'] ?>
                </div>
            <?php
                }
            ?>
            <div class="row">
                <?php
                // die(var_dump($adverts));
                    foreach($adverts as $advert) {
                ?>
                <div class="col-4 my-3">
                    <div class="card">
                        <img src="/views/user/images/<?= $advert['image_image'] ?>" class="card-img-top" alt=""/>
                        <div class="card-body">
                            <h5 class="card-title"><?= $advert['advert_title'] ?></h5>
                            <h6 style="color: #32a852;"><?= $advert['advert_price'] ?></h6>
                            <a href="/views/user/adverts/advert.php?id=<?= $advert['advert_id'] ?>" class="btn btn-orange">????????????????????</a>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>

<?php
    include('/views/user/templates/footer.php')
?>