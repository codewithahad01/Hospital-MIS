<?php

    require_once("restrict.php");
    require_once("connection.php");

    $id = $_GET["department_id"];
    $result = mysqli_query($con, "DELETE FROM department WHERE department_id = $id");
    if($result){

        header("location:department_list.php?delete=done");
    }
    else{

        header("location:department_list.php?error=notdelete");
    }


?>