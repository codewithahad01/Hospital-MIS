<?php require_once("restrict.php");             // Include the user restriction. ?>         
<?php require_once("connection.php");           //  Include the Datebase Connection file.  ?>       
    
<?php
    
    if(isset($_POST["amount"])){
        $amount = $_POST["amount"];
        $currncy = $_POST["currency"];
        $expense_type = $_POST["expense_type"];
        $expense_date = $_POST["expense_date"];
        

        
        $result = mysqli_query($con, "INSERT INTO expense VALUES(NULL, '$amount', $currncy, '$expense_type', '$expense_date')");
        if($result){
            header("location:expense_list.php?add=done");
        }
        else{
            
            header("location:expense_add.php?error=notadd");
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
                <h1>Register New expense</h1>
            </div>

            <div class="panel-body">
                <form method="post">

                    <div class="input-group">
                        <span class="input-group-addon">
                            Amount:
                        </span>
                        <input class="form-control" type="text" name="amount">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Currency:
                        </span>
                        <input class="form-control" type="text" name="currency">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Expense Type:
                        </span>
                        <input class="form-control" type="text" name="expense_type">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Expense Date:
                        </span>
                        <input class="form-control" type="date" name="expense_date">
                    </div>

                    <input class="btn btn-success" type="submit" value="Register" style="width: 110px;">

                </form>
            </div>

        </div>

    </div>

</body>
</html>

<?php require_once("footer.php"); ?> 
