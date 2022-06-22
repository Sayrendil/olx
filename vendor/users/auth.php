<?php

    require('../../../olx/config/db.php');
    session_start();

    if(!isset($_SESSION['error_auth'])) {
        $_SESSION['error_auth'] = [];
    }

    if(!isset($_SESSION['user'])) {

        if(!empty($_POST['login']) && !empty($_POST['password'])) {

            $login = htmlspecialchars($_POST['login']);
            $pass = htmlspecialchars($_POST['password']);

            $sql = "SELECT * FROM users WHERE users.login = '$login' AND users.password = '$pass'";
            $user = mysqli_query($connect, $sql);
            $user = mysqli_fetch_assoc($user);

            if($user['password'] === $pass && $user['login'] === $login) {
                $_SESSION['user'] = $user;
            }

            header("Location: ../../../olx/index.php");

        }

    } else {

        $_SESSION['error_auth']['session'] = "Вы уже авторизованы!";

        header("Location: ../../../olx/index.php");

    }

?>