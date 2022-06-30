<?php

    require('../../config/db.php');
    include('../../views/user/templates/header.php');
    
    // die(var_dump($_SESSION['user']));
    if(isset($_GET['error'])) {
        if($_GET['error'] == "auth") {
            $message = "Вы уже авторизованы!";
        }
    }

?>
        
        <div class="container my-5">
            <div class="row">
                <div class="col-6 offset-3">
                    <?php
                        if(isset($_GET['error'])) {
                    ?>
                    <div class="alert alert-danger">
                        <?= $message ?>
                    </div>
                    <?php
                        }
                    ?>
                    <h1 class="h1 text-center pb-5">Авторизация</h1>
                    <form action="/vendor/users/auth.php" method="POST" name="auth">
                        <!-- Email input -->
                        <div class="form-group mb-4">
                            <input type="text" id="login" class="form-control" name="login">
                            <label class="form-label" for="login">Логин</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-group mb-4">
                            <input type="password" id="password" class="form-control" name="password">
                            <label class="form-label" for="password">Пароль</label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary" name="auth">Войти</button>
                    </form>
                </div>
            </div>
        </div>

<?php
    include('../../views/user/templates/footer.php');
?>