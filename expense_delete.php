<?php

    require_once("restrict.php");
    require_once("connection.php");

    $id = $_GET["expense_id"];
    $result = mysqli_query($con, "DELETE FROM expense WHERE expense_id = $id");
    if($result){

        header("location:expense_list.php?delete=done");
    }
    else{

        header("location:expense_list.php?error=notdelete");
    }


?>