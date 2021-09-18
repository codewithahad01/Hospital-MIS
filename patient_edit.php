<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

<?php

    $id = $_GET["patient_id"];
    $patinet = mysqli_query($con, "SELECT * FROM patient WHERE patient_id = $id");
    $row_patient = mysqli_fetch_assoc($patinet);


    if(isset($_POST["name"])){
        $name = $_POST["name"];
        $gender = $_POST["gender"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $birth_year = $_POST["birth_year"];
        $nic = $_POST["nic"];
        $job = $_POST["job"];
        

        $result = mysqli_query($con, "UPDATE patient SET name = '$name', gender = $gender, phone = '$phone', address = '$address', birth_year = $birth_year, nic = '$nic', job = '$job' WHERE patient_id = $id");

        if($result){
            header("location:patient_list.php?edit=done");
        }
        else{
            header("location:patient_edit.php?error=notedit&patient_id=$id");
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
                <h1>Edit Patient</h1>
            </div>

            <div class="panel-body">

            <?php if(isset($_GET["error"])) { ?>

                <div class="alert alert-danger">
                    Could not edit patient! Please try again!
                </div>

            <?php } ?>

                <form method="post">

                    <div class="input-group">
                        <span class="input-group-addon">
                            Name:
                        </span>
                        <input class="form-control" type="text" name="name" value="<?php echo $row_patient["name"]; ?>">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Phone:
                        </span>
                        <input class="form-control" type="text" name="phone" value="<?php echo $row_patient["phone"]; ?>">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Address:
                        </span>
                        <input class="form-control" type="text" name="address" value="<?php echo $row_patient["address"]; ?>">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Birth year:
                        </span>
                        <input class="form-control" type="text" name="birth_year" value="<?php echo $row_patient["birth_year"]; ?>">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            NIC:
                        </span>
                        <input class="form-control" type="text" name="nic" value="<?php echo $row_patient["nic"]; ?>">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Job:
                        </span>
                        <input class="form-control" type="text" name="job" value="<?php echo $row_patient["job"]; ?>">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Gender:
                        </span> &nbsp; &nbsp;
                        <label><input type="radio" name="gender" value="0" <?php if($row_patient["gender"]==0) echo "checked"; ?> >Male</label> &nbsp; &nbsp;
                        <label><input type="radio" name="gender" value="1" <?php if($row_patient["gender"]==1) echo "checked"; ?> >Female</label>
                    </div>

                    <input class="btn btn-success" type="submit" value="Save changes">

                </form>
            </div>

        </div>

    </div>

</body>
</html>

<?php require_once("footer.php"); ?> 
