<?php

    require_once("restrict.php");
    require_once("connection.php");

    $id = $_GET["patient_id"];
    $result = mysqli_query($con, "DELETE FROM patient WHERE patient_id = $id");
    if($result){

        header("location:patient_list.php?delete=done");
    }
    else{

        header("location:patient_list.php?error=notdelete");
    }


?>