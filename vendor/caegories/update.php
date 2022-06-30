<?php

    require('../../../config/db.php');
    
    if(!isset($_SESSION['user'])) {
        header("Location: ../../../views/admin/categories/categories.php?error=login");
        exit;
    }

    if(!isset($_POST['categoryUpdate'])) {
        header("Location: ../../../views/admin/categories/categories.php?error=post");
        exit;
    }

    if(empty($_POST['name'])) {
        header("Location: ../../../views/admin/categories/categories.php?error=name");
        exit;
    }

    