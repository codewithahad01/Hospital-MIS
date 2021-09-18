<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php

    if(isset($_GET["month"])){
        $year = $_GET["year"];
        $month = $_GET["month"];

    }
    else{ 
    $year = date("Y");
    $month = date("m");
    }
    $attendance = mysqli_query($con, "SELECT * FROM attendance INNER JOIN staff ON staff.staff_id = attendance.staff_id where absent_year = $year AND absent_month = $month");
    $row_attendance = mysqli_fetch_assoc($attendance);   

    $totalRows_attendance = mysqli_num_rows($attendance);
?>

<?php require_once("top.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance List</title>
</head>
<body>
    
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <a class="btn btn-info pull-right noprint" href="attendance_add.php">
                        <span class="glyphicon glyphicon-plus"></span>
                        Add Absent
                    </a>

                    <a href="#" class="btn btn-info pull-right print noprint" style="margin-right:7px;">
                        <span class="glyphicon glyphicon-print"></print>
                            Print
                    </a>

                    <h1>Staff Attendance</h1>
                </div>

                <div class="panel-body">
                    
                    <?php if(isset($_GET["add"])) { ?>
                        <div class="alert alert-success">
                            New absent has been successfully added!
                        </div>
                    <?php } ?>

                    <?php if(isset($_GET["delete"])) {  ?>
                        <div class="alert alert-success">
                            Absent has been successfully deleted!
                        </div>
                    <?php } ?>

                    <?php if(isset($_GET["notdelete"])) { ?>
                        <div class="alert alert-warning">
                            There is no absent deleted! Please try again!
                        </div>
                    <?php } ?>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    
                    <div class="row">
                        <form class="noprint">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon" style="width:50px;">
                                    Month:
                                </span>
                                    <select class="form-control" name="month">
                                        <option value="1"<?php if(date("m") == 1) echo "selected"; ?>>January</option>
                                        <option value="2"<?php if(date("m") == 2) echo "selected"; ?>>Feberuary</option>
                                        <option value="3"<?php if(date("m") == 3) echo "selected"; ?>>March</option>
                                        <option value="4"<?php if(date("m") == 4) echo "selected"; ?>>April</option>
                                        <option value="5"<?php if(date("m") == 5) echo "selected"; ?>>May</option>
                                        <option value="6"<?php if(date("m") == 6) echo "selected"; ?>>June</option>
                                        <option value="7"<?php if(date("m") == 7) echo "selected"; ?>>July</option>
                                        <option value="8"<?php if(date("m") == 8) echo "selected"; ?>>Agust</option>
                                        <option value="9"<?php if(date("m") == 9) echo "selected"; ?>>September</option>
                                        <option value="10"<?php if(date("m") == 10) echo "selected"; ?>>October</option>
                                        <option value="11"<?php if(date("m") == 11) echo "selected"; ?>>November</option>
                                        <option value="12"<?php if(date("m") == 12) echo "selected"; ?>>December</option>
                                    </select>
                            </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group">
                                    <span class="input-group-addon" style="width:50px;">
                                        Year:
                                    </span>
                                <input class="form-control" type="text" value="<?php echo date("Y"); ?>" name="year">
                                <span class="input-group-btn">
                                    <input class="btn btn-primary" type="submit" value="Show">
                                </span>
                            </div>
                            </div>    

                                
                        </from>
                        </div>
                    </div>
                <div class="clearfix"></div>
                        
                <?php if($totalRows_attendance > 0) {  ?>
                    <table class="table table-striped ">
                            <tr>
                                    <th>Staff ID</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Photo</th>
                                    <th>Position</th>
                                    <th>Day</th>
                                    <th>Absent_hour</th>
                                    <th>edit</th>
                                    <th>Delete</th>
                            </tr>
                        <?php do { ?>
                            <tr>
                                <td><?php echo $row_attendance["staff_id"]; ?></td>
                                <td><?php echo $row_attendance["firstname"]; ?></td>
                                <td><?php echo $row_attendance["lastname"]; ?></td>
                                <td><img src="<?php echo $row_attendance["photo"]; ?>" width="40" class="img img-circle"></td>
                                <td><?php echo $row_attendance["position"]; ?></td>
                                <td><?php echo $row_attendance["absent_year"]; ?>/<?php echo $row_attendance["absent_month"]; ?>/<?php echo $row_attendance["absent_day"]; ?></td>
                                <td><?php echo $row_attendance["absent_hour"]; ?></td>
                                <td>
                                    <a href="attendance_edit.php?staff_id=<?php echo $row_attendance["staff_id"]; ?>&absent_year=<?php echo $row_attendance["absent_year"]; ?>&absent_month=<?php echo $row_attendance["absent_month"]; ?>&absent_day=<?php echo $row_attendance["absent_day"]; ?>">
                                         <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                </td>

                                <td>
                                    <a class="delete" href="attendance_delete.php?staff_id=<?php echo $row_attendance["staff_id"]; ?>&absent_year=<?php echo $row_attendance["absent_year"]; ?>&absent_month=<?php echo $row_attendance["absent_month"]; ?>&absent_day=<?php echo $row_attendance["absent_day"]; ?>">
                                        <span class="glyphicon glyphicon-trash"></span<
                                    </a>
                                </td>

                            
                            </tr>
                        <?php } while($row_attendance = mysqli_fetch_assoc($attendance)); ?>
                        
                      
                    </table>
                <?php } else { ?>
                    <div class="alert alert-warning">
                        <h3 style="text-align: center;">there is no absent data!</h3>
                    </div>
                <?php } ?>

                </div>

                </div>



<?php require_once("footer.php"); ?>