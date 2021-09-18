<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

<?php

    $id = $_GET["expense_id"];
    $patinet = mysqli_query($con, "SELECT * FROM expense WHERE expense_id = $id");
    $row_expense = mysqli_fetch_assoc($patinet);


    if(isset($_POST["amount"])){
        $amount = $_POST["amount"];
        $currency = $_POST["currency"];
        $expense_type = $_POST["expense_type"];
        $expense_date = $_POST["expense_date"];
    
        $result = mysqli_query($con, "UPDATE expense SET amount = '$amount', currency = $currency, expense_type = '$expense_type', expense_date = '$expense_date' WHERE expense_id = $id");

        if($result){
            header("location:expense_list.php?edit=done");
        }
        else{
            header("location:expense_edit.php?error=notedit&expense_id=$id");
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
    <title>Document</title>
</head>
<body>

    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-0">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1>Edit expense</h1>
            </div>

            <div class="panel-body">

            <?php if(isset($_GET["error"])) { ?>

                <div class="alert alert-danger">
                    Could not edit expense! Please try again!
                </div>

            <?php } ?>

                <form method="post">

                    <div class="input-group">
                        <span class="input-group-addon">
                            Amount:
                        </span>
                        <input class="form-control" type="text" name="amount" value="<?php echo $row_expense["amount"]; ?>">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Currnecy:
                        </span>
                        <input class="form-control" type="text" name="currency" value="<?php echo $row_expense["currency"]; ?>">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Expense Type:
                        </span>
                        <input class="form-control" type="text" name="expense_type" value="<?php echo $row_expense["expense_type"]; ?>">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Expense Date:
                        </span>
                        <input class="form-control" type="date" name="expense_date" value="<?php echo $row_expense["expense_date"]; ?>">
                    </div>

                    
                    <input class="btn btn-success" type="submit" value="Save changes">

                </form>
            </div>

        </div>

    </div>

</body>
</html>

<?php require_once("footer.php"); ?> 
