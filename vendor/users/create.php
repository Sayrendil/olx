<?php

    session_start();

    require('../../config/db.php');
    

    if(isset($_SESSION['user'])) {
        header("Location: ../../../olx/views/user/register.php?error=100");
        exit;
    }

    if(!isset($_POST['name'], $_POST['phone'], $_POST['login'], $_POST['pass'])) {

        header("Location: ../../../olx/views/user/register.php?error=400");
        exit;
        
    }

    $name = htmlspecialchars(trim($_POST['name']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $login = htmlspecialchars(trim($_POST['login']));
    $pass = htmlspecialchars(trim($_POST['pass']));

    if(strlen($login) < 5 || strlen($login) > 90) {
        // die(var_dump($login));
        header("Location: ../../../olx/views/user/register.php?error=login");
        exit;
    }
    
    if(strlen($name) < 3 || strlen($name) > 90) {
        // die(var_dump($name));
        header("Location: ../../../olx/views/user/register.php?error=name");
        exit;
    }
    
    if(strlen($phone) < 9 || strlen($phone) > 12) {
        header("Location: ../../../olx/views/user/register.php?error=phone");
        exit;
    }
    
    if(strlen($pass) < 2 || strlen($pass) > 12) {
        header("Location: ../../../olx/views/user/register.php?error=pass");
        exit;
    }

    $sql = "SELECT count('login') AS count_login, count('phone') AS count_phone FROM `users` WHERE `login` = '$login' OR `phone` = '$phone'";
    $users = mysqli_query($connect, $sql);
    $users = mysqli_fetch_assoc($users);

    if($users['count_login'] > 0) {
        header("Location: ../../../olx/views/user/register.php?error=405login");
        exit;
    }

    if($users['count_phone'] > 0) {
        header("Location: ../../../olx/views/user/register.php?error=405phone"); 
        exit;
    }

    mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `phone`, `login`, `password`) VALUES(NULL, '$name', '$phone', '$login', '$pass')");

    header("Location: ../../../olx/views/user/register.php?success=200");

?>