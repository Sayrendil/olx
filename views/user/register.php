<?php

    require('../../config/db.php');
    include('../user/templates/header.php');

    if(!isset($_SESSION['user'])) {

?>
        
        <div class="container my-5">
            <div class="row">
                <div class="col-6 offset-3">
                <div class="container my-5">
                    <?php
                        if(isset($_SESSION['errors']['post'])) {
                    ?>
                    <div class="alert alert-danger">
                        <?= $_SESSION['errors']['post'] ?>
                    </div>
                    <?php
                        }
                    ?>
                    <h1 class="h1 text-center pb-5">Регистрация</h1>
                    <form action="../../../olx/vendor/users/create.php" method="POST" name="addUsers">
                        <div class="form-group mb-4">
                            <label class="form-label" for="name">ФИО</label>
                            <input type="text" id="name" class="form-control" name="name">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label" for="phone">Телефон</label>
                            <input type="text" id="phone" class="form-control" name="phone">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label" for="login">Логин</label>
                            <input type="text" id="login" class="form-control" name="login">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label" for="password">Пароль</label>
                            <input type="password" id="password" class="form-control" name="password">
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