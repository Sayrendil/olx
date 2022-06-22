<?php

    require('../../../../olx/config/db.php');
    include('../../../../olx/views/user/templates/header.php');

    $sqlCategories = "SELECT * FROM categories";

    $categories = mysqli_query($connect, $sqlCategories);
    $categories = mysqli_fetch_all($categories);

?>

<div class="container my-5">
  
  <!--Section: Content-->
    <section class="dark-grey-text">

        <!-- Section heading -->
        <h3 class="text-center font-weight-bold mb-5">Категории</h3>

        <!-- Grid row -->
        <div class="row">
            <?php
                foreach($categories as $key => $category) {
            ?>
            <div class="col-12 mb-4">
                <div class="card z-depth-0 bordered border-light">
                    <div class="card-body p-0">
                        <div class="row mx-0">
                        <div class="col-md-8 grey lighten-4 rounded-left pt-4">
                            <h5 class="font-weight-bold"><?= $category[1] ?></h5>
                        </div>
                        <div class="col-md-4 text-center pt-4">
                            <a href="../categories/category.php?id=<?= $category[0] ?>" class="btn btn-orange">Посмотреть</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
        <!-- Grid row -->

    </section>
  <!--Section: Content-->


</div>

<?php
    include('../user/templates/footer.php');
?>