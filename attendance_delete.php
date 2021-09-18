<?php

require_once("restrict.php");
require_once("connection.php");


$id = $_GET["staff_id"];
$year = $_GET["absent_year"];
$month = $_GET["absent_month"];
$day = $_GET["absent_day"];

$result = mysqli_query($con, "DELETE FROM attendance WHERE staff_id = $id AND absent_year = $year AND absent_month = $month AND absent_day = $day");
if($result){
    header("location:attendance_list.php?delete=done");
}
else{
    header("location:attendance_list.php?error=notdelete");
}


?>