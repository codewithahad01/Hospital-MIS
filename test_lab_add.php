<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

<?php

    $patient = mysqli_query($con, "SELECT * FROM patient");
    $row_patient = mysqli_fetch_assoc($patient);

    $test = mysqli_query($con, "SELECT * FROM test");
    $row_test = mysqli_fetch_assoc($test);

    if(isset($_POST["patient_id"])){
        $patient_id = $_POST["patient_id"];
        $test_id = $_POST["test_id"];
        $test_date = $_POST["test_date"];
        $test_result = $_POST["test_result"];
        

        $result = mysqli_query($con, "INSERT INTO test_result VALUES(NULL, $patient_id, $test_id, '$test_date', '$test_result')");
        
        if($result){
            header("location:patient_test.php?add=done");
        }
        else{
            header("location:test_lab_add.php?error=notadd");
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
                <h1>Register Labratory Test</h1>
            </div>

            <div class="panel-body">
                <form method="post">

                <div class="input-group">
                        <span class="input-group-addon">
                            Patient ID:
                        </span>
                        <select class="form-control" name="patient_id">

                        <?php do{ ?>
                            <option value="<?php echo $row_patient["patient_id"]; ?>"> <?php echo $row_patient["patient_id"]; ?> </option> 
                        <?php }while($row_patient = mysqli_fetch_assoc($patient)); ?>
    
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
                        <input class="form-control" type="date" name="test_date">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Test Result:
                        </span>
                        <input class="form-control" type="text" name="test_result">
                    </div>

                    <input class="btn btn-success" type="submit" value="Register">

                </form>
            </div>

        </div>

    </div>

</body>
</html>

<?php require_once("footer.php"); ?> 
