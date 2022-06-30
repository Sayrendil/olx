<?php

    require('../../config/db.php');
    include('../user/templates/header.php');

    if(isset($_GET['error']) || isset($_GET['success'])) {

        if($_GET['error'] == "400") {
            $message = "Вы авторизованы";
        } elseif ($_GET['error'] == "100") {
            $message = "Вы уже авторизованы!";
        } elseif ($_GET['error'] == "login") {
            $message = "Логин должен содежрать не менее 5 символов и небольше 90 символов!";
        } elseif ($_GET['error'] == "name") {
            // die(var_dump($_GET['error']));
            $message = "Имя должен содежрать не менее 3 символов и небольше 90 символов!";
        } elseif ($_GET['error'] == "phone") {
            $message = "Телефон должен содежрать не менее 9 символов и небольше 12 символов!!";
        } elseif ($_GET['error'] == "pass") {
            $message = "Пароль должен содежрать не менее 2 символов и небольше 12 символов!";
        } elseif ($_GET['error'] == "405login") {
            $message = "Данный логин уже занят!";
        } elseif ($_GET['error'] == "405phone") {
            $message = "Данный телефон уже занят!";
        }elseif ($_GET['success'] == "200") {
            $message = "Вы успешно зарегистрировались!";
        }
        
    }

    if(!isset($_SESSION['user'])) {

?>
        
        <div class="container my-5">
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="container my-5">
                        <?php
                            if(isset($_GET['success'])) {
                        ?>
                            <div class="alert alert-success">
                                <?= $message ?>
                            </div>
                        <?php
                            } elseif(isset($_GET['error'])) {
                        ?>
                            <div class="alert alert-danger">
                                <?= $message ?>
                            </div>
                        <?php
                            }
                        ?>
                        <h1 class="h1 text-center pb-5">Регистрация</h1>
                        <form action="/vendor/users/create.php" method="POST" name="addUser" class="registration">
                            <div class="form-group mb-4">
                                <label class="form-label" for="name">ФИО</label>
                                <input type="text" id="name" class="form-control input js-input" name="name">
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label" for="phone">Телефон</label>
                                <input type="text" id="phone" class="form-control input js-input js-input-phone" name="phone">
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label" for="login">Логин</label>
                                <input type="text" id="login" class="form-control input js-input js-input-email" name="login">
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label" for="password">Пароль</label>
                                <input type="password" id="password" class="form-control input js-input" name="pass">
                            </div>
                            <button type="submit" class="btn btn-primary" name="addUser">Зарегистрироваться</button>
                        </form>
                    </div>
            </div>
        </div>

<?php
    } else {
?>

    <div class="container my-5">
        <div class="alert alert-danger">
            <?php 
                if(isset($_SESSION['errors'])) {
                    echo $_SESSION['errors']['session'];
                }
            ?>
        </div>
    </div>

<?php
    }
    include('../user/templates/footer.php');
?>