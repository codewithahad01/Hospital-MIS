<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

<?php

    $id = $_GET["user_id"];
    $patinet = mysqli_query($con, "SELECT * FROM users WHERE users_id = $id");
    $row_user = mysqli_fetch_assoc($user);

    
    $staff = mysqli_query($con, "SELECT staff_id FROM staff");
    $row_staff = mysqli_fetch_assoc($staff);


    if(isset($_POST["staff_id"])){
        $staff_id = $_POST["staff_id"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        

        $result = mysqli_query($con, "UPDATE users SET staff_id = $staff_id, username = '$username', password = '$password' WHERE users_id = $id");

        if($result){
            header("location:user_list.php?edit=done");
        }
        else{
            header("location:user_edit.php?error=notedit&user_id=$id");
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
                <h1>Edit users</h1>
            </div>

            <div class="panel-body">

            <?php if(isset($_GET["error"])) { ?>

                <div class="alert alert-danger">
                    Could not edit user! Please try again!
                </div>

            <?php } ?>

                <form method="post">

                <div class="input-group">
                            <span class="input-group-addon">
                                Staff:
                            </span>
                            <select class="form-control" name="staff_id">
                                <?php do{ ?>
                                <option value="<?php echo $row_staff["staff_id"];?> <?php echo $row_staff["firstname"];?><?php echo $row_staff["lastname"];?>"></option> 
                                <?php }while($row_staff = mysqli_fetch_assoc($staff)); ?>
                            </select>
                        </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Username:
                        </span>
                        <input class="form-control" type="text" name="phone" value="<?php echo $row_user["phone"]; ?>">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Password:
                        </span>
                        <input class="form-control" type="text" name="address" value="<?php echo $row_user["address"]; ?>">
                    </div>


                    <input class="btn btn-success" type="submit" value="Save changes">

                </form>
            </div>

        </div>

    </div>

</body>
</html>

<?php require_once("footer.php"); ?> 
