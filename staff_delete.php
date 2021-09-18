<?php

    require_once("restrict.php");
    require_once("connection.php");

    $id = $_GET["staff_id"];

    mysqli_query($con, "SELECT photo FROM staff_id = $id");

    $staff_photo = $result = mysqli_query($con, "DELETE FROM staff WHERE staff_id = $id");
    $row_staff_photo = mysqli_fetch_assoc($staff_photo);
    
    unlink($row_staff_photo["photo"]);

    if($result){

        header("location:staff_list.php?delete=done");
    }
    else{

        header("location:staff_list.php?error=notdelete");
    }


?>