<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

<?php

    $id = $_GET["result_id"];
    $test_result = mysqli_query($con, "SELECT * FROM test_result WHERE result_id = $id");
    $row_test_result = mysqli_fetch_assoc($test_result);

    $test = mysqli_query($con, "SELECT * FROM test_result WHERE result_id = $id");
    $row_test = mysqli_fetch_assoc($test);

    if(isset($_POST["result_id"])){
        $result_id = $_POST["result_id"];
        $patient_id = $_POST["patient_id"];
        $test_id = $_POST["test_id"];
        $test_date = $_POST["test_date"];
        $test_result = $_POST["test_result"];
        
        

        $result = mysqli_query($con, "UPDATE test_result SET patient_id = $patient_id, test_id = $test_id, test_date = '$test_date', test_result = '$test_result' WHERE result_id = $id");

        if($result){
            header("location:patient_test.php?edit=done");
        }
        else{
            header("location:patient_test_edit.php?error=notedit&result_id=$id");
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
                <h1>Edit Labratory Test</h1>
            </div>

            <div class="panel-body">

            <?php if(isset($_GET["error"])) { ?>

                <div class="alert alert-danger">
                    Could not edit Test! Please try again!
                </div>

            <?php } ?>

                <form method="post">

                <div class="input-group">
                        <span class="input-group-addon">
                            Patient ID:
                        </span>
                        <select class="form-control" name="patient_id">

                        <?php do{ ?>
                            <option value="<?php echo $row_test_result["patient_id"]; ?>"> <?php echo $row_test_result["patient_id"]; ?> </option> 
                        <?php }while($row_test_result = mysqli_fetch_assoc($test_result)); ?>
    
                        <select>
                    </div>
                        


                    <div class="input-group">
                        <span class="input-group-addon">
                            Test ID:
                        </span>
                        <select class="form-control" name="test_id">
                           

                        <?php do{ ?>
                            <option value="<?php echo $row_test["test_id"]; ?>"> <?php echo $row_test["test_id"]; ?> </option> 
                        <?php }while($row_test = mysqli_fetch_assoc($test)); ?>
    
                        <select>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Test Date:
                        </span>
                        <input class="form-control" type="date" name="test_date" value="<?php echo $row_test["test_date"]; ?>">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Test Result:
                        </span>
                        <input class="form-control" type="text" name="test_result" value="<?php echo $row_test_result["test_result"]; ?>">
                    </div>

                    
                    <input class="btn btn-success" type="submit" value="Save changes">

                </form>
            </div>

        </div>

    </div>

</body>
</html>

<?php require_once("footer.php"); ?> 
