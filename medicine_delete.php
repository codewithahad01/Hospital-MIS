<?php

    require_once("restrict.php");
    require_once("connection.php");

    $id = $_GET["medicine_id"];
    $result = mysqli_query($con, "DELETE FROM medicine WHERE medicine_id = $id");
    if($result){

        header("location:medicine_list.php?delete=done");
    }
    else{

        header("location:medicine_list.php?error=notdelete");
    }


?>