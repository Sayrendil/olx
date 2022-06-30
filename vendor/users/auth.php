<?php

    require('../../../olx/config/db.php');
    session_start();

    if(isset($_SESSION['user'])) {

        header("Location: /views/user/login.php?error=auth");

    } else {

        if(!empty($_POST['login']) && !empty($_POST['password'])) {

            $login = htmlspecialchars(trim($_POST['login']));
            $pass = htmlspecialchars(trim($_POST['password']));

            $sql = "SELECT * FROM users WHERE users.login = '$login' AND users.password = '$pass'";
            $user = mysqli_query($connect, $sql);
            $user = mysqli_fetch_assoc($user);

            if($user['password'] === $pass && $user['login'] === $login) {
                $_SESSION['user'] = $user;
            }

            header("Location: ../../index.php");

        }

    }

?>