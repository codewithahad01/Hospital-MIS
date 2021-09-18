<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

    
<?php 

    $condition = "";
    if(isset($_GET["search"])){
        $search = $_GET["search"];
        $condition = "WHERE name LIKE '%$search%' OR department_id = '$search' ";


    }

    $department = mysqli_query($con, "SELECT * FROM department $condition");
    $row_department = mysqli_fetch_assoc($department);

    $totalRows_department =  mysqli_num_rows($department);
    

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
                <h1>department List</h1>
            </div>

            <div class="panel-body">

        <?php if(isset($_GET["delete"])) { ?>

            <div class="alert alert-success">
                Selected department has been successfully removed!
            </div>

        <?php } ?>

        <?php if(isset($_GET["edit"])) { ?>

            <div class="alert alert-success">
                Selected department has been successfully updated!
            </div>

        <?php } ?>    


        <?php if(isset($_GET["add"])) { ?>

            <div class="alert alert-success">
                New department has been successfully Added!
            </div>

        <?php } ?>


            <form>
                <div class="input-group">
                    <span class="input-group-addon">
                        Search department:
                    </span>
                        <input class="form-control" type="text" name="search">
                
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-search"></span> Search
                    </button>  
                </span>
                
                </div>

            </form>

            <?php if($totalRows_department > 0) {  ?>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Department Name</th>
                        <th>Create Date</th>
                    </tr>

            <?php do{  ?>

                    <tr>
                        <td><?php echo $row_department["department_id"]; ?></td>
                        <td><?php echo $row_department["name"]; ?></td>
                        <td><?php echo $row_department["create_date"]; ?></td>
                           
                        
                        <td>
                            <a href="department_edit.php?department_id=<?php echo $row_department["department_id"]; ?>">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                        </td>

                        <td>
                            <a class="delete" href="department_delete.php?department_id=<?php echo $row_department["department_id"]; ?>">
                                <span class="glyphicon glyphicon-trash "></span>
                            </a>
                        </td>
                    
                    </tr>

            <?php }while($row_department = mysqli_fetch_assoc($department)); ?>

                </table>

                </div>

            <?php }else{  ?>
                <br>
                <div class="alert alert-warning text-center">
                    <h3 style="margin:0;">There is no department!</h3>
                </div>

            <?php }?>

            </div>

        </div>

</body>
</html>


<?php require_once("footer.php"); ?>

