<?php

    require_once("restrict.php");
    require_once("connection.php");

    $id = $_GET["result_id"];
    $result = mysqli_query($con, "DELETE FROM test_result WHERE result_id = $id");
    if($result){

        header("location:patient_test.php?delete=done");
    }
    else{

        header("location:patient_test.php?error=notdelete");
    }


?>