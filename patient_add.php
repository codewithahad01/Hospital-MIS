<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

<?php

    if(isset($_POST["name"])){
        $name = $_POST["name"];
        $gender = $_POST["gender"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $birth_year = $_POST["birth_year"];
        $nic = $_POST["nic"];
        $job = $_POST["job"];
        $reg_date = jdate("Y-m-d");

        $result = mysqli_query($con, "INSERT INTO patient VALUES(NULL, '$name', $gender, '$phone', '$address', $birth_year, '$nic', '$job', '$reg_date')");

        if($result){
            header("location:patient_list.php?add=done");
        }
        else{
            header("location:patient_add.php?error=notadd");
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
                <h1>Register New Patient</h1>
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
                            Phone:
                        </span>
                        <input class="form-control" type="text" name="phone">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Address:
                        </span>
                        <input class="form-control" type="text" name="address">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Birth year:
                        </span>
                        <input class="form-control" type="text" name="birth_year">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            NIC:
                        </span>
                        <input class="form-control" type="text" name="nic">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Job:
                        </span>
                        <input class="form-control" type="text" name="job">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Gender:
                        </span> &nbsp; &nbsp;
                        <label><input type="radio" name="gender" value="0">Male</label> &nbsp; &nbsp;
                        <label><input type="radio" name="gender" value="1">Female</label>
                    </div>

                    <input class="btn btn-success" type="submit" value="Register">

                </form>
            </div>

        </div>

    </div>

</body>
</html>

<?php require_once("footer.php"); ?> 
