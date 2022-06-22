<?php
    require('../../../config/db.php');
    include('../../../../olx/views/user/templates/header.php');

    $advert_id = $_GET['id'];
    $advert = mysqli_query($connect, "SELECT images.id as image_id, 
    adverts.id as advert_id, 
    adverts.title as advert_title, 
    images.image as img_image, 
    images.advert_id as advert_image_id, 
    adverts.description as advert_des, 
    adverts.price as advert_price,
    adverts.user_id as advert_user_id,
    users.id as user_id,
    users.name as user_name,
    users.phone as user_phone
    FROM `images`
    RIGHT JOIN adverts ON images.id = adverts.id
    RIGHT JOIN users ON users.id = adverts.user_id
    WHERE `adverts`.`id` = '$advert_id'");
    $advert = mysqli_fetch_assoc($advert);

    // die(var_dump($advert_id));

?>

<div class="container my-5 py-5 z-depth-1">


  <!--Section: Content-->
  <section class="text-center">

    <div class="row">

      <div class="col-lg-6">

        <!--Carousel Wrapper-->
        <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">

          <!--Slides-->
          <div class="carousel-inner text-center text-md-left" role="listbox">
            <div class="carousel-item active">
              <img src="../../../../olx/views/user/images/<?= $advert['img_image'] ?>"
                alt="First slide" class="img-fluid">
            </div>
          </div>
          <!--/.Slides-->

          <!--Thumbnails-->
          <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
          <!--/.Thumbnails-->

        </div>
        <!--/.Carousel Wrapper-->

      </div>

      <div class="col-lg-5 text-center text-md-left">

        <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">
          <strong>Название: <?= $advert['advert_title'] ?></strong>
        </h2>
        <h5 class="h5-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">
          <strong>Имя пользователя: <?= $advert['user_name'] ?></strong>
        </h5>
        <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
          <span class="red-text font-weight-bold">
            <strong>Цена: <?= $advert['advert_price'] ?> тг.</strong>
          </span>
        </h3>
        <h5 class="h5-responsive text-left">
          <a href="tel:<?= $advert['user_phone'] ?>">Телефон: <?= $advert['user_phone'] ?></a>
        </h5>

        <!-- Add to Cart -->
        <section class="color">
          <div class="mt-5">
            <div class="row text-center text-md-left">

            <div class="row mt-3">
              <div class="col-md-12 text-center text-md-left text-md-right">
                <button class="btn btn-primary btn-rounded">
                  <i class="fas fa-cart-plus mr-2" aria-hidden="true"></i> Заказать</button>
              </div>
            </div>
          </div>
        </section>
        <!-- /.Add to Cart -->

      </div>
      <div class="col-lg-12">
        <!-- Card body -->
        <div class="card-body">
            <?= $advert['advert_des'] ?>
          </div>
      </div>

    </div>

  </section>
  <!--Section: Content-->


</div>

<?php
    include('../../../../olx/views/user/templates/footer.php');
?>