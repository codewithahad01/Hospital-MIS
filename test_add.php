<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

<?php

    if(isset($_POST["name"])){
        $name = $_POST["name"];
        $price = $_POST["price"];
        

        $result = mysqli_query($con, "INSERT INTO test VALUES(NULL, '$name', $price)");
        
        if($result){
            header("location:patient_test.php?add=done");
        }
        else{
            header("location:patient_test.php?error=notadd");
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
                <h1>Register New Test</h1>
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
                            Price:
                        </span>
                        <input class="form-control" type="text" name="price">
                    </div>

                    

                    <input class="btn btn-success" type="submit" value="Register">

                </form>
            </div>

        </div>

    </div>

</body>
</html>

<?php require_once("footer.php"); ?> 
