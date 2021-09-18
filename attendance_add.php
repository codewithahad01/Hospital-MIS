<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

<?php

    $staff = mysqli_query($con, "SELECT staff_id, firstname, lastname, position FROM staff");
    $row_staff = mysqli_fetch_assoc($staff);

    $department = mysqli_query($con, "SELECT * FROM department");
    $row_department = mysqli_fetch_assoc($department);

    if(isset($_POST["absent_hour"])){
        $staff_id = $_POST["staff_id"];
        $absent_date = $_POST["absent_date"];
        $absent_hour = $_POST["absent_hour"];

        $parts = explode("-", $absent_date);
        $year = $parts[0];
        $month = $parts[1];
        $day = $parts[2];

        $result = mysqli_query($con, "INSERT INTO attendance VALUE ($staff_id, $year, $month, $day, $absent_hour)");

        if($result){
            header("location:attendance_list.php?add=done");
        }
        else{
            header("location:attendance_add.php?error=notadd");
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
                    <h1>Add Absent</h1>
                </div>

                <div class="panel-body">
                    
                        <?php if(isset($_GET["error"])) { ?>

                            <div class="alert alert-danger">
                                Could not add absent! Please try again!
                            </div>
                            
                        <?php } ?>
                            
                    <form method="post">

                        <div class="input-group">
                            <span class="input-group-addon">
                                Department:
                            </span>
                            <select class="form-control" name="department_id">

                                <?php do{  ?>
                                <option value="<?php echo $row_department["department_id"]; ?><?php echo $row_department["department_name"]; ?>"></option>
                                <?php } while($row_department = mysqli_fetch_assoc($department)); ?>
                                
                                </select>

                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                Staff:
                            </span>
                            <select class="form-control" name="staff_id">
                                
                                <?php do{ ?>
                                <option value="<?php echo $row_staff["staff_id"];?>"><?php echo $row_staff["firstname"]; ?> <?php echo $row_staff["lastname"]; ?> (<?php echo $row_staff["position"]; ?>) </option> 
                                <?php }while($row_staff = mysqli_fetch_assoc($staff)); ?>
                            </select>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                Absent Date:
                            </span>
                            <input class="form-control" type="date" value="<?php echo date("Y-m-d"); ?>" name="absent_date">
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                Hours:
                            </span>
                            <input class="form-control" type="text" name="absent_hour">
                        </div>

                        <input class="btn btn-success" type="submit" value="Add Absent">


                    </form>

                </div>

            </div>



   
</body>
</html>


<?php require_once("footer.php"); ?>