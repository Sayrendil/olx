<?php

    $user = 'root';
    $pass = 'root';

    $connect = mysqli_connect('127.0.0.1','root', 'root', 'olx');
    mysqli_set_charset($connect, "utf8") or die('Не установлена кодировка!');

    if(!$connect) {
        die("Error to cennect to Database!");
    }