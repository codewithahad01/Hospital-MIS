<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

    
<?php 

    $condition = "";
    if(isset($_GET["search"])){
        $search = $_GET["search"];
        $condition = "WHERE name LIKE '%$search%' OR patient_id = '$search' ";


    }

    $patient = mysqli_query($con, "SELECT * FROM patient $condition");
    $row_patient = mysqli_fetch_assoc($patient);

    $totalRows_patient =  mysqli_num_rows($patient);
    

?>

<?php require_once("top.php"); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

        <div class="panel panel-primary">
            <div class="panel-heading"> 
                <h1>Patient List</h1>
            </div>

            <div class="panel-body">

        <?php if(isset($_GET["delete"])) { ?>

            <div class="alert alert-success">
                Selected patient has been successfully removed!
            </div>

        <?php } ?>

        <?php if(isset($_GET["edit"])) { ?>

            <div class="alert alert-success">
                Selected patient has been successfully updated!
            </div>

        <?php } ?>    


        <?php if(isset($_GET["add"])) { ?>

            <div class="alert alert-success">
                New patient has been successfully Registred!
            </div>

        <?php } ?>


            <form>
                <div class="input-group">
                    <span class="input-group-addon">
                        Search Patient:
                    </span>
                        <input class="form-control" type="text" name="search">
                
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-search"></span> Search
                    </button>  
                </span>
                
                </div>

            </form>

            <?php if($totalRows_patient > 0) {  ?>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Registration Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

            <?php do{  ?>

                    <tr>
                        <td><?php echo $row_patient["patient_id"]; ?></td>
                        <td><?php echo $row_patient["name"]; ?></td>
                        <td><?php echo $row_patient["gender"]== 0 ? "Male" : "Female"; ?></td>
                        <td><?php echo date("Y") - $row_patient["birth_year"]; ?></td>
                        <td><?php echo $row_patient["reg_date"]; ?></td>    
                        
                        <td>
                            <a href="patient_edit.php?patient_id=<?php echo $row_patient["patient_id"]; ?>">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                        </td>

                        <td>
                            <a class="delete" href="patient_delete.php?patient_id=<?php echo $row_patient["patient_id"]; ?>">
                                <span class="glyphicon glyphicon-trash "></span>
                            </a>
                        </td>
                    
                    </tr>

            <?php }while($row_patient = mysqli_fetch_assoc($patient)); ?>

                </table>

                </div>

            <?php }else{  ?>
                <br>
                <div class="alert alert-warning text-center">
                    <h3 style="margin:0;">There is no Patient!</h3>
                </div>

            <?php }?>

            </div>

        </div>

</body>
</html>


<?php require_once("footer.php"); ?>

