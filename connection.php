<?php  

    $con = mysqli_connect("localhost", "root", "");
    
    mysqli_select_db($con, "hospital_mis");

    if(!isset($_SESSION)){
        session_start();
    }
    
    require_once("jdf.php");

    function log_activity($action, $rowid){
        global $con;
        $user_id =  $_SESSION["user_id"];
        $date = date("Y-m-d");
        $time = date("h:i:s");
        mysqli_query($con, "SELECT INTO user_activity VALUES(NULL, $user_id, $action, $rowid, '$date', '$time')");
    }

?>