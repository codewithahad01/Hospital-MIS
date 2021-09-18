<?php require_once("restrict.php");             // Include the user restriction. ?>         
<?php require_once("connection.php");           //  Include the Datebase Connection file.  ?>       
    
<?php
    
    if(isset($_POST["name"])){
        $name = $_POST["name"];
        $form = $_POST["form"];
        $madein = $_POST["madein"];
        $quantity = $_POST["quantity"];
        $unitprice = $_POST["unitprice"];
        $exp_date = $_POST["exp_date"];

        
        $result = mysqli_query($con, "INSERT INTO medicine(name, form, madein, quantity,unitprice,exp_date) VALUES('$name','$form','$madein',$quantity,$unitprice,'$exp_date')");
        if($result){
            header("location:medicine_list.php?add=done");
        }
        else{
            
            header("location:medicine_add.php?error=notadd");
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
                <h1>Register New Medicine</h1>
            </div>

            <div class="panel-body">
                <form method="post">

                    <div class="input-group">
                        <span class="input-group-addon">
                            Name:
                        </span>
                        <input class="form-control" type="text" name="name">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Form:
                        </span>
                        <input class="form-control" type="text" name="form">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Madein:
                        </span>
                        <input class="form-control" type="text" name="madein">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Quantity:
                        </span>
                        <input class="form-control" type="text" name="quantity">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Unit Price:
                        </span>
                        <input class="form-control" type="text" name="unitprice">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Expire Date:
                        </span>
                        <input class="form-control" type="date" name="exp_date">
                    </div>


                    <input class="btn btn-success" type="submit" value="Register" style="width: 110px;">

                </form>
            </div>

        </div>

    </div>

</body>
</html>

<?php require_once("footer.php"); ?> 
