<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php

    $staff = mysqli_query($con, "SELECT  * FROM staff INNER JOIN department ON department.department_id  = staff.department_id ORDER BY firstname ASC");
    $row_staff = mysqli_fetch_assoc($staff);


?>
<?php require_once("top.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff List</title>
</head>
<body>
    
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Staff List </h1>
                </div>

                <div class="panel-body">

                <?php if(isset($_GET["add"])) { ?>

                    <div class="alert alert-success">
                        New Staff has been Successfully Registered!
                    </div>

                <?php } ?>

                <?php if(isset($_GET["edit"])) { ?>

                    <div class="alert alert-success">
                        Selected staff has been Successfully updated!
                    </div>

                <?php } ?>

                <?php if(isset($_GET["delete"])) { ?>

                    <div class="alert alert-success">
                        Selected staff has been Successfully deleted!
                    </div>

                <?php } ?>

                    <div class="table-responsive">    
                        <table class="table table-strupped">
                            <tr>
                                <th>S/N</th>
                                <th>ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Photo</th>
                                <th>Department</th>
                                <th>Position</th>
                                <th>Salary</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>

                        <?php $x = 1; do{ ?>
                            <tr>
                                <td><?php echo $x++;     ?></td>
                                <td><?php echo $row_staff["staff_id"]; ?> </td>
                                <td><?php echo $row_staff["firstname"];?> </td>
                                <td><?php echo $row_staff["lastname"]; ?> </td>
                                <td><img src= "<?php echo $row_staff["photo"]; ?>" width="40" class="img img-circle"></td>
                                <td><?php echo $row_staff["name"]; ?> </td>
                                <td><?php echo $row_staff["position"]; ?> </td>
                                <td><?php echo $row_staff["gross_salary"]; ?> </td>
                                <td>
                                    <a href="staff_edit.php?staff_id=<?php echo $row_staff["staff_id"]; ?>">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a> 
                                </td>

                                <td>
                                    <a class="delete" href ="staff_delete.php?staff_id=<?php echo $row_staff["staff_id"]; ?>"> 
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>

                            </tr>
                        <?php }while($row_staff = mysqli_fetch_assoc($staff)); ?>

                        </table>
                    </div>

                </div>
            </div>


</body>
</html>

<?php  require_once("footer.php"); ?>