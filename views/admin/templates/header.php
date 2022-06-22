<?php

    session_start(); 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SHOP</title>
        <!-- MDB icon -->
        <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="../../../../olx/views/user/css/bootstrap.min.css">
        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" href="../../../../olx/views/user/css/mdb.min.css">
        <!-- Your custom styles (optional) -->
        <link rel="stylesheet" href="../../../../olx/views/user/css/style.css">
    </head>
    <body>
        <?php
            if(!isset($_SESSION['user'])) {
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark orange lighten-1">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand me-2" href="../../../../olx/index.php">
                    OLX
                </a>

                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarButtonsExample">
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="../../../../olx/views/admin/adverts/index.php">Объявления</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../../../olx/views/admin/categories/categories.php">Категории</a>
                        </li>
                    </ul>
                    <!-- Left links -->

                    <div class="d-flex ml-auto">
                        <a href="../../../../olx/views/user/login.php" class="btn btn-link px-3 me-2">Войти</a>
                        <a href="../../../../olx/views/user/register.php" class="btn btn-white me-3">Зарегистрироваться</a>
                    </div>
                </div>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <?php
            }
        ?>