<?php

    session_start();

    require('../../config/db.php');

    if(!isset($_SESSION['user'])) {

        if(isset($_POST['name']) && isset($_POST['login']) && isset($_POST['phone']) && isset($_POST['pass'])) {

            if(!isset($_SESSION['errors'])) {
                $_SESSION['errors'] = [];
            }

            $name = htmlspecialchars(trim($_POST['name']));
            $phone = htmlspecialchars(trim($_POST['phone']));
            $login = htmlspecialchars(trim($_POST['login']));
            $pass = htmlspecialchars(trim($_POST['password']));

            if(empty($_SESSION['errors']['login']) || empty($_SESSION['errors']['name']) || empty($_SESSION['errors']['phone']) || empty($_SESSION['errors']['pass'])) {
                if(strlen($login) < 5 || strlen($login) > 90) {
                    $_SESSION['errors']['login'] = "Не допустимая длина логина!";
                }
    
                if(strlen($name) < 3 || strlen($name) > 90) {
                    $_SESSION['errors']['name'] = "Не допустимая длина имени!";
                }
    
                if(strlen($phone) < 9 || strlen($phone) > 12) {
                    $_SESSION['errors']['phone'] = "Не допустимая длина Телефона!";
                }
    
                if(strlen($pass) < 2 || strlen($pass) > 12) {
                    $_SESSION['errors']['pass'] = "Не допустимая длина Пароля! (от 2 до 12 символов)";
                }
            } else {

                session_destroy();
                if(strlen($login) < 5 || strlen($login) > 90) {
                    $_SESSION['errors']['login'] = "Не допустимая длина логина!";
                }
    
                if(strlen($name) < 3 || strlen($name) > 90) {
                    $_SESSION['errors']['name'] = "Не допустимая длина имени!";
                }
    
                if(strlen($phone) < 9 || strlen($phone) > 12) {
                    $_SESSION['errors']['phone'] = "Не допустимая длина Телефона!";
                }
    
                if(strlen($pass) < 2 || strlen($pass) > 12) {
                    $_SESSION['errors']['pass'] = "Не допустимая длина Пароля! (от 2 до 12 символов)";
                }

            }

            $sql = "SELECT count('login') AS count_login, count('phone') AS count_phone FROM `users` WHERE `login` = '$login' OR `phone` = '$phone'";
            $users = mysqli_query($connect, $sql);
            $users = mysqli_fetch_assoc($users);

            if($users['count_login'] > 0) {
                $_SESSION['errors']['count_login'] = "Данный логин занят!"; 
            }

            if($users['count_phone'] > 0) {
                $_SESSION['errors']['count_phone'] = "Данный телефон занят!"; 
            }

            mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `phone`, `login`, `password`) VALUES(NULL, '$name', '$phone', '$login', '$pass')");

            header("Location: ../../../olx/index.php");

        } else {

            $_SESSION['errors']['post'] = "Ошибка системы!";
            header("Location: ../../../olx/views/user/register.php");

        }

    }else {


            $_SESSION['errors']['session'] = "Вы уже авторизованы!";


        header("Location: ../../../olx/views/user/register.php");

    }

?>