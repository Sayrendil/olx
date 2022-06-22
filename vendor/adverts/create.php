<?php

    require('../../config/db.php');

    if(isset($_SESSION['user'])) {

        if(isset($_POST['addAdvert'])) {

            $title = $_POST['title'];
            $description = $_POST['description'];
            $category_id = $_POST['category'];
            $pass = $_POST['password'];

            mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `phone`, `login`, `password`) VALUES(NULL, '$name', '$phone', '$login', '$pass')");

            header("Location: ../../../../olx/index.php");

        }

    }else {

        header("Location: ../../../../olx/index.php");

    }

?>