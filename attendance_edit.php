<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

<?php

    $id = $_GET["staff_id"];
    $year = $_GET["absent_year"];
    $month = $_GET["absent_month"];
    $day = $_GET["absent_day"];

    $attendance = mysqli_query($con, "SELECT * FROM attendance WHERE staff_id = $id AND absent_year = $year AND absent_month = $month AND absent_day = $day");
    $row_attendance = mysqli_fetch_assoc($attendance);

    $staff = mysqli_query($con, "SELECT staff_id, firstname, lastname, position FROM staff");
    $row_staff = mysqli_fetch_assoc($staff);

    if(isset($_POST["absent_hour"])){
        $staff_id = $_POST["staff_id"];
        $absent_date = $_POST["absent_date"];
        $absent_hour = $_POST["absent_hour"];

        $parts = explode("-", $absent_date);
        $year = $parts[0];
        $month = $parts[1];
        $day = $parts[2];

        $result = mysqli_query($con, "UPDATE attendance SET staff_id = $id, absent_year = $year, absent_month = $month, absent_day = $day, absent_hour = $absent_hour WHERE staff_id = $staff_id AND absent_year = $year AND absent_month = $month AND absent_day = $day");

        if($result){
            header("location:attendance_list.php?edit=done");
        }
        else{
            header("location:attendance_edit.php?error=notedit&staff_id=$id&absent_year=$year&absent_month=$month&absent_day=$day");
        }

    }


?>

<?php require_once("top.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance Add</title>
   
</head>
<body>
    
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Edit Absent</h1>
                </div>

                <div class="panel-body">
                    
                        <?php if(isset($_GET["error"])) { ?>

                            <div class="alert alert-danger">
                                Could not Edit absent! Please try again!
                            </div>
                            
                        <?php } ?>
                            
                    <form method="post">

                        <div class="input-group">
                            <span class="input-group-addon">
                                Staff:
                            </span>
                            <select class="form-control" name="staff_id">
                                
                                <?php do{ ?>
                                <option <?php if($row_staff["staff_id"] == $row_attendance["staff_id"]) echo "selected"; ?> value="<?php echo $row_staff["staff_id"];?>"><?php echo $row_staff["firstname"]; ?> <?php echo $row_staff["lastname"]; ?> (<?php echo $row_staff["position"]; ?>) </option> 

                                <?php }while($row_staff = mysqli_fetch_assoc($staff)); ?>

                            </select>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                Absent Date:
                            </span>
                            <input class="form-control" type="text" value="<?php echo $row_attendance["absent_year"]; ?>-<?php echo $row_attendance["absent_month"]; ?>-<?php echo $row_attendance["absent_day"]; ?>" name="absent_date">
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                Hours:
                            </span>
                            <input value="<?php echo $row_attendance["absent_hour"]; ?>" class="form-control" type="text" name="absent_hour">
                        </div>

                        <input class="btn btn-success" type="submit" value="Save Changes">


                    </form>

                </div>

            </div>



   
</body>
</html>


<?php require_once("footer.php"); ?>
 