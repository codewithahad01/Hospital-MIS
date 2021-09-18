<?php

    if(!isset($_SESSION)){
        session_start();
    }
    unset($_SESSION["staff_id"]);

    header("location:login.php?logout=done")

?>