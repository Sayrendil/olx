<?php

    require('../../../olx/config/db.php');
    session_start();

    if(isset($_SESSION['user'])) {   

        session_destroy();
        header("Location: ../../../olx/index.php");

    } else{
        header("Location: ../../../olx/index.php");
    }

?>