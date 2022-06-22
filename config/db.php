<?php

    $user = 'root';
    $pass = '';

    $connect = mysqli_connect('localhost','root', '', 'olx');
    mysqli_set_charset($connect, "utf8") or die('Не установлена кодировка!');

    if(!$connect) {
        die("Error to cennect to Database!");
    }