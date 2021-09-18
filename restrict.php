<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION["staff_id"])){
        header("location:login.php?notlogin=true");
    }


?>