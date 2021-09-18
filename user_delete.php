<?php

    require_once("restrict.php");
    require_once("connection.php");

    $id = $_GET["user_id"];
    $result = mysqli_query($con, "DELETE FROM users WHERE user_id = $id");
    if($result){

        header("location:user_list.php?delete=done");
    }
    else{

        header("location:user_list.php?error=notdelete");
    }


?>