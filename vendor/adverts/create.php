<?php

    session_start();

    require('../../config/db.php');

    if(empty($_SESSION['errors'])) {
        $_SESSION['errors'] = [];
    }

    if(isset($_SESSION['user'])) {

        if(isset($_POST['addAdvert'])) {

            if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['category']) && !empty($_POST['image']) && !empty($_POST['price'])) {

                $id = $_POST['addAdvert'];
                $title = htmlspecialchars(trim($_POST['title']));
                $description = htmlspecialchars(trim($_POST['description']));
                $price = htmlspecialchars(trim($_POST['price']));
                $subcategory_id = htmlspecialchars(trim($_POST['category']));
                $image = htmlspecialchars(trim($_POST['image']));
                $user_id = $_SESSION['user']['id'];
                $status = 0;

                $sqlSubCat = "SELECT 
                    subcategories.id as subcat_id,
                    subcategories.category_id as subcat_cat_id,
                    categories.id as cat_id
                    FROM subcategories
                    INNER JOIN categories ON categories.id = subcategories.category_id
                    WHERE subcategories.category_id = '$subcategory_id'";

                $category = mysqli_query($connect, $sqlSubCat);
                $category = mysqli_fetch_assoc($category);

                $sqlimage = "SELECT 
                    images.id as image_id,
                    images.image as image_img,
                    images.advert_id as image_advertid
                    FROM images
                    INNER JOIN adverts ON adverts.id = images.advert_id
                    WHERE images.image = '$image'";

                $image_id = mysqli_query($connect, $sqlimage);
                $image_id = mysqli_fetch_assoc($image_id);

                $image_ids = $image_id['image_id'];
                // $image_name = $image_id['image_img'];
                // $image_advert_id = $image_id['image_advertid'];

                $category_id = $category['cat_id'];
                // die(var_dump($id));
    
                if(empty($_SESSION['errors']['title']) || empty($_SESSION['errors']['description']) || empty($_SESSION['errors']['category']) || empty($_SESSION['errors']['image']) || empty($_SESSION['errors']['password']) || empty($_SESSION['errors']['price'])) {
                    if(strlen($title) < 5 || strlen($title) > 90) {
                        $_SESSION['errors']['title'] = "Не допустимая длина названия!";
                    }
        
                    if(strlen($description) < 15 || strlen($description) > 400) {
                        $_SESSION['errors']['description'] = "Не допустимая длина текста! (мин 15 | макс 400)";
                    }

                    if(strlen($price) < 2 || strlen($price) > 12) {
                        $_SESSION['errors']['price'] = "Не допустимая длина Пароля! (от 2 до 12 символов)";
                    }
                } else {
                    if(strlen($title) < 5 || strlen($title) > 90) {
                        $_SESSION['errors']['title'] = "Не допустимая длина логина!";
                    }
        
                    if(strlen($description) < 3 || strlen($description) > 90) {
                        $_SESSION['errors']['description'] = "Не допустимая длина имени!";
                    }

                    if(strlen($price) < 2 || strlen($price) > 12) {
                        $_SESSION['errors']['price'] = "Не допустимая длина Пароля! (от 2 до 12 символов)";
                    }
                }

                mysqli_query($connect, "INSERT INTO  images (`image`, `advert_id`)
                VALUES ('$image_id', '$')");
    
                mysqli_query($connect, "INSERT INTO `images` (`id`, `image`, `advert_id`)
                VALUES(NULL, '$image_id', NULL
                INSERT INTO `adverts` (`id`, `title`, `description`, `price`, `user_id`, `category_id`, `subcategory_id`, `status`, `image_id`)
                VALUES(NULL, '$title', '$description', '$price', '$user_id', '$category_id', '$subcategory_id', '$status', LAST_INSERT_ID())");
                // die(var_dump($_SESSION['errors']));
                // die(var_dump($image_id));
    
                header("Location: ../../../../olx/index.php");
    
            }

        }

    } else {

        $_SESSION['errors']['auth'] = "Вы не авторизованы!";

        header("Location: ../../../../olx/index.php");

    }

?>