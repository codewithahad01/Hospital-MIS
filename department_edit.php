<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

<?php

    $id = $_GET["department_id"];
    $department = mysqli_query($con, "SELECT * FROM department WHERE department_id = $id");
    $row_department = mysqli_fetch_assoc($department);


    if(isset($_POST["department_id"])){
        $department_id = $_POST["department_id"];
        $name = $_POST["name"];
        $create_date = $_POST["create_date"];
        

        $result = mysqli_query($con, "UPDATE department SET name = '$name', create_date = '$create_date' WHERE department_id = $id");

        if($result){
            header("location:department_list.php?edit=done");
        }
        else{
            header("location:department_edit.php?error=notedit&department_id=$id");
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
                <h1>Edit department</h1>
            </div>

            <div class="panel-body">

            <?php if(isset($_GET["error"])) { ?>

                <div class="alert alert-danger">
                    Could not edit department! Please try again!
                </div>

            <?php } ?>

                <form method="post">

                    <div class="input-group">
                        <span class="input-group-addon">
                            Name:
                        </span>
                        <input class="form-control" type="text" name="name" value="<?php echo $row_department["name"]; ?>">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Creaet Date:
                        </span>
                        <input class="form-control" type="date" name="create_date" value="<?php echo $row_department["create_date"]; ?>">
                    </div>

                    
                    <input class="btn btn-success" type="submit" value="Save changes">

                </form>
            </div>

        </div>

    </div>

</body>
</html>

<?php require_once("footer.php"); ?> 
