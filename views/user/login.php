<?php

    require('../../config/db.php');
    include('../../../olx/views/user/templates/header.php');
    
    // die(var_dump($_SESSION['user']));

?>
        
        <div class="container my-5">
            <div class="row">
                <div class="col-6 offset-3">
                <h1 class="h1 text-center pb-5">Авторизация</h1>
                    <form action="../../../olx/vendor/users/auth.php" method="POST" name="auth">
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
    include('../../../olx/views/user/templates/footer.php');
?>