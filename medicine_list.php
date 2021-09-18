<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

    
<?php 

    $condition = "";
    if(isset($_GET["search"])){
        $search = $_GET["search"];
        $condition = "WHERE name LIKE '%$search%' OR medicine_id = '$search' ";


    }

    $medicine = mysqli_query($con, "SELECT * FROM medicine $condition");
    $row_medicine = mysqli_fetch_assoc($medicine);  //Fetches a result row as an associative array

    $totalRows_medicine =  mysqli_num_rows($medicine);  // return the number of rows in a result set
    

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
                <h1>medicine List</h1>
            </div>

            <div class="panel-body">

        <?php if(isset($_GET["delete"])) { ?>

            <div class="alert alert-success">
                Selected medicine has been successfully removed!
            </div>

        <?php } ?>

        <?php if(isset($_GET["edit"])) { ?>

            <div class="alert alert-success">
                Selected medicine has been successfully updated!
            </div>

        <?php } ?>    


        <?php if(isset($_GET["add"])) { ?>

            <div class="alert alert-success">
                New medicine has been successfully Added!
            </div>

        <?php } ?>


            <form>
                <div class="input-group">
                    <span class="input-group-addon">
                        Search medicine:
                    </span>
                        <input class="form-control" type="text" name="search">
                
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-search"></span> Search
                    </button>  
                </span>
                
                </div>

            </form>

            <?php if($totalRows_medicine > 0) {  ?>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Form</th>
                        <th>Madein</th>
                        <th>quantity</th>
                        <th>Unit Price</th>
                        <th>Expiration Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

            <?php do{  ?>

                    <tr>
                        <td><?php echo $row_medicine["medicine_id"]; ?></td>
                        <td><?php echo $row_medicine["name"]; ?></td>
                        <td><?php echo $row_medicine["form"]; ?></td>
                        <td><?php echo $row_medicine["madein"]; ?></td>
                        <td><?php echo $row_medicine["quantity"]; ?></td>
                        <td><?php echo $row_medicine["unitprice"]; ?></td>
                        
                        <td><?php echo $row_medicine["exp_date"]; ?></td>    
                        
                        <td>
                            <a href="medicine_edit.php?medicine_id=<?php echo $row_medicine["medicine_id"]; ?>">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                        </td>

                        <td>
                            <a class="delete" href="medicine_delete.php?medicine_id=<?php echo $row_medicine["medicine_id"]; ?>">
                                <span class="glyphicon glyphicon-trash "></span>
                            </a>
                        </td>
                    
                    </tr>

            <?php }while($row_medicine = mysqli_fetch_assoc($medicine)); ?>

                </table>

                </div>

            <?php }else{  ?>
                <br>
                <div class="alert alert-warning text-center">
                    <h3 style="margin:0;">There is no medicine!</h3>
                </div>

            <?php }?>

            </div>

        </div>

</body>
</html>


<?php require_once("footer.php"); ?>

