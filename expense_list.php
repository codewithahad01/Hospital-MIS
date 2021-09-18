<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

    
<?php 

    $condition = "";
    if(isset($_GET["search"])){
        $search = $_GET["search"];
        $condition = "WHERE name LIKE '%$search%' OR expense_id = '$search' ";


    }

    $expense = mysqli_query($con, "SELECT * FROM expense $condition");
    $row_expense = mysqli_fetch_assoc($expense);

    $totalRows_expense =  mysqli_num_rows($expense);
    

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
                <h1>Expense List</h1>
            </div>

            <div class="panel-body">

        <?php if(isset($_GET["delete"])) { ?>

            <div class="alert alert-success">
                Selected expense has been successfully removed!
            </div>

        <?php } ?>

        <?php if(isset($_GET["edit"])) { ?>

            <div class="alert alert-success">
                Selected expense has been successfully updated!
            </div>

        <?php } ?>    


        <?php if(isset($_GET["add"])) { ?>

            <div class="alert alert-success">
                New expense has been successfully Added!
            </div>

        <?php } ?>


            <form>
                <div class="input-group">
                    <span class="input-group-addon">
                        Search Expense:
                    </span>
                        <input class="form-control" type="text" name="search">
                
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-search"></span> Search
                    </button>  
                </span>
                
                </div>

            </form>

            <?php if($totalRows_expense > 0) {  ?>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Amount</th>
                        <th>Currnecy</th>
                        <th>Expense Type</th>
                        <th>Expense Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

            <?php do{  ?>

                    <tr>
                        <td><?php echo $row_expense["expense_id"]; ?></td>
                        <td><?php echo $row_expense["amount"]; ?></td>
                        <td><?php echo $row_expense["currency"]; ?></td>
                        <td><?php echo $row_expense["expense_type"]; ?></td>
                        <td><?php echo $row_expense["expense_date"]; ?></td>
                        
                        <td>
                            <a href="expense_edit.php?expense_id=<?php echo $row_expense["expense_id"]; ?>">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                        </td>

                        <td>
                            <a class="delete" href="expense_delete.php?expense_id=<?php echo $row_expense["expense_id"]; ?>">
                                <span class="glyphicon glyphicon-trash "></span>
                            </a>
                        </td>
                    
                    </tr>

            <?php }while($row_expense = mysqli_fetch_assoc($expense)); ?>

                </table>

                </div>

            <?php }else{  ?>
                <br>
                <div class="alert alert-warning text-center">
                    <h3 style="margin:0;">There is no expense!</h3>
                </div>

            <?php }?>

            </div>

        </div>

</body>
</html>


<?php require_once("footer.php"); ?>

