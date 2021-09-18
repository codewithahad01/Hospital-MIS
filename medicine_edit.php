<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

   

<?php

    $id = $_GET["medicine_id"];
    $medicine = mysqli_query($con, "SELECT * FROM medicine WHERE medicine_id = $id");
    $row_medicine = mysqli_fetch_assoc($medicine);


    if(isset($_POST["name"])){
        $name = $_POST["name"];
        $form = $_POST["form"];
        $madein = $_POST["madein"];
        $quantity = $_POST["quantity"];
        $unitprice = $_POST["unitprice"];
        $exp_date = $_POST["exp_date"];
        
        
        //$result = mysqli_query($con, "UPDATE medicine SET name = '$name', form = '$form', madein = '$madein', quantity = $quantity, unitprice = $unitprice, exp_date = '$exp_date' WHERE medicine_id = $id");
        
        $result = mysqli_query($con, "UPDATE medicine SET'name'=[$name],'form'=[$form],'madein'=[$madein],quantity=[$quantity],unitprice =[$unitprice],'exp_date'=[$exp_date] WHERE medicine_id = $id");

        if($result){
            header("location:medicine_list.php?edit=done");
        }
        else{
            header("location:medicine_edit.php?error=notedit&medicine_id=$id");
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

    <?php
    
    echo $_POST['name'];
    echo $form;
    echo $madein;
    echo $quantity;
    echo $unitprice;
    echo $exp_date;
    
    ?>
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-0">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1>Edit medicine</h1>
            </div>

            <div class="panel-body">

            <?php if(isset($_GET["error"])) { ?>

                <div class="alert alert-danger">
                    Could not edit medicine! Please try again!
                </div>

            <?php } ?>

                <form method="post">

                <div class="input-group">
                        <span class="input-group-addon">
                            Name:
                        </span>
                        <input class="form-control" type="text" name="name" value="<?php echo $row_medicine["name"] ?>">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Form:
                        </span>
                        <input class="form-control" type="text" name="form" value="<?php echo $row_medicine["form"] ?>" >
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Madein:
                        </span>
                        <input class="form-control" type="text" name="madein" value="<?php echo $row_medicine["madein"] ?> ">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Quantity:
                        </span>
                        <input class="form-control" type="text" name="quantity" value="<?php echo $row_medicine["quantity"] ?>>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Unit Price:
                        </span>
                        <input class="form-control" type="text" name="unitprice" value="<?php echo $row_medicine["unitprice"] ?>>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Expire Date:
                        </span>
                        <input class="form-control" type="text" name="exp_date" value="<?php echo $row_medicine["exp_date"] ?>>
                    </div>


                    </div>

                    <input class="btn btn-success" type="submit" value="Save changes" style="margin-left: 15px; margin-bottom: 10px;">

                </form>
            </div>

        </div>

    </div>

</body>
</html>

<?php require_once("footer.php"); ?> 
