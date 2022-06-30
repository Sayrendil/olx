<?php

    session_start();

    require('../../config/db.php');

    if(!isset($_SESSION['user'])) {
        header("Location: ../../../../olx/views/user/adverts/addAdvert.php?error=auth");
        exit;
    }

    if(!isset($_POST['addAdvert'])) {
        header("Location: ../../../../olx/views/adverts/addAdvert.php?error=400");
        exit;
    }

    // die(var_dump($_FILES['image']));

    if(empty($_POST['title'] && $_POST['description'] && $_POST['price'] && $_POST['subcategory'] && $_POST['category'] && $_FILES['image'])) {
        header("Location: ../../../../olx/views/adverts/addAdvert.php?error=post");
        exit;
    }

    // die(var_dump($_POST['subcategories']));

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $user_id = $_SESSION['user']['id'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $status = 0;
    $image = $_FILES['image'];

    // die(var_dump($subcategory));

    if(strlen($title) < 5 || strlen($title) > 90) {
        // die(var_dump($login));
        header("Location: ../../../olx/views/adverts/addAdvert.php?error=title");
        exit;
    }
    
    if(strlen($description) < 3 || strlen($description) > 90) {
        // die(var_dump($name));
        header("Location: ../../../olx/views/adverts/addAdvert.php?error=description");
        exit;
    }
    
    if(strlen($price) < 2 || strlen($price) > 8) {
        header("Location: ../../../olx/views/adverts/addAdvert.php?error=price");
        exit;
    }
    
    $file = $_FILES['image']['name'];
    $filetemp = $_FILES['image']['tmp_name'];
    $folder = "../../../olx/views/user/images/".$file;

    // die(var_dump($folder));

    $sqlADV = "INSERT INTO adverts (`id`, `title`, `description`, `price`, `user_id`, `category_id`, `subcategory_id`, `status`) 
    VALUES (NULL, '$title', '$description', '$price', '$user_id', '$category', '$subcategory', '$status')";
    mysqli_query($connect, $sqlADV);
    $advert_id = mysqli_insert_id($connect);

    if(move_uploaded_file($filetemp, $folder)) {
        echo "SUCESS";
    } else {
        header("Location: /views/user/adverts/addAdvert.php?error=image");
    }

    $sqlIMG = mysqli_query($connect, "INSERT INTO images (`id`, `image`, `advert_id`) VALUES (NULL, '$file', '$advert_id')");

    header("Location: /olx/views/user/adverts/adverts.php?success=add");


?>