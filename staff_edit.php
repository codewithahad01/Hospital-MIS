<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

<?php

    $id = $_GET["staff_id"];
    $staff = mysqli_query($con, "SELECT * FROM staff WHERE staff_id = $id");
    $row_staff = mysqli_fetch_assoc($staff);

    $department = mysqli_query($con, "SELECT * FROM department ");
    $row_department = mysqli_fetch_assoc($department);

    if(isset($_POST["firstname"])){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $birth_year = $_POST["birth_year"];
        $position = $_POST["position"];
        $education = $_POST["education"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $gross_salary = $_POST["gross_salary"];
        $hire_date = $_POST["hire_date"];
        $staff_type = $_POST["staff_type"];
        $department_id = $_POST["department_id"];
        $gender = $_POST["gender"];

        if($_FILES["photo"]["name"] != ""){ 
        $size = $_FILES["photo"]["size"];
        $type = $_FILES["photo"]["type"];

        if($type == "image/jpeg" ||  $type == "image/png" || $type == "image/gif" ){

            if($size < 6 * 1024 * 1024){
                $path = "images/staff/" . time() . $_FILES["photo"]["name"] ;
                move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
                unlink($row_staff["photo"]);
                
            }
            else{
                header("location:staff_add.php?filesize=invalid");
            }
            
        } 
        else{
            header("location:staff_add.php?filetype=invalid");
        }
    }
    else{
        $path = $row_staff["photo"];
    }

        $result = mysqli_query($con, "UPDATE staff SET firstname='$firstname', lastname='$lastname', birth_year=$birth_year, position='$position', education='$education', gender=$gender, photo='$path',  phone='$phone', email='$email', address='$address', gross_salary=$gross_salary, hire_date='$hire_date', staff_type=$staff_type, department_id=$department_id WHERE staff_id = $id");                 

        if($result){
            header("location:staff_list.php?edit=done");
        }
        else{
            header("location:staff_edit.php?error=notedit&staff_id=$id");
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
    <title>Staff Registration</title>
</head>
<body>

    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-0">
    
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <h1>Edit Staff</h1>
            </div>

            <div class="panel-body">

                <?php if(isset($_GET["filesize"])) { ?>
                    
                    <div class="alert alert-danger">
                        Invalid file size! (Please choose a photo smaller than 6 MB) 
                    </div>

                <?php } ?>


                <?php if(isset($_GET["filetype"])) { ?>

                    <div class="clert alert-danger">
                        Invalid file type! (Please choose only jpg, gif, png)
                    </div>

                <?php } ?>


                <?php if(isset($_GET["error"])) { ?>

                    <div class="alert alert-danger">
                        Could not add new staff Please try again!
                    </div>

                <?php } ?>

                <form method="post" enctype="multipart/form-data">  

                    <div class="input-group">
                        <span class="input-group-addon">
                            Firstname:
                        </span>
                        <input value="<?php echo $row_staff["firstname"]; ?>" class="form-control" type="text" name="firstname">
                    </div>        

                    <div class="input-group">
                        <span class="input-group-addon">
                            Lastname:
                        </span>
                        <input value="<?php echo $row_staff["lastname"]; ?>" class="form-control" type="text" name="lastname">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Birth Year:
                        </span>
                        <input value="<?php echo $row_staff["birth_year"]; ?> " class="form-control" type="text" name="birth_year">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Position:
                        </span>
                        <input value="<?php echo $row_staff["position"]; ?>" class="form-control" type="text" name="position">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Education:
                        </span>
                        <input value="<?php echo $row_staff["education"]; ?>" class="form-control" type="text" name="education">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Phone:
                        </span>
                        <input value="<?php echo $row_staff["phone"]; ?>" class="form-control" type="text" name="phone">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Email:
                        </span>
                        <input value="<?php echo $row_staff["email"]; ?>" class="form-control" type="text" name="email">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Address:
                        </span>
                        <input value="<?php echo $row_staff["address"]; ?>" class="form-control" type="text" name="address">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Gross Salary:
                        </span>
                        <input value="<?php echo $row_staff["gross_salary"]; ?>" class="form-control" type="text" name="gross_salary">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Hire Date:
                        </span>
                        <input value="<?php echo $row_staff["hire_date"]; ?>" class="form-control" type="text" name="hire_date">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Staff Type:
                        </span>
                        <select class="form-control" name="staff_type">
                            <option <?php if($row_staff["staff_type"] == 1) echo "selected"; ?> value="1">Doctor</option>
                            <option <?php if($row_staff["staff_type"] == 2) echo "selected"; ?> value="2">Nurse</option>
                            <option <?php if($row_staff["staff_type"] == 3) echo "selected"; ?> value="3">Employee</option>
                        <select>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Department:
                        </span>
                        <select class="form-control" name="department_id">

                        <?php do{ ?>
                            <option <?php if($row_staff["department_id"] == $row_department["department_id"]) echo "selected"; ?> value="<?php echo $row_department["department_id"]; ?>"><?php echo $row_department["name"]; ?></option> 
                        <?php }while($row_department = mysqli_fetch_assoc($department)); ?>

                        </select>   
                    </div>  

                    <div class="input-group">
                        <span class="input-group-addon">
                            Photo:
                        </span>
                        <input class="form-control" type="file" name="photo">
                        <span class="input-group-addon" style="width:20px;">
                            <img src="<?php echo $row_staff["photo"];?>" width="20">
                        </span>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Gender:
                        </span>&nbsp; &nbsp;
                        <label><input <?php if($row_staff["gender"] == 0) echo "checked"; ?> type="radio" name="gender" value="0">Male</label>&nbsp;   
                        <label><input <?php if($row_staff["gender"] == 1) echo "checked"; ?>type="radio" name="gender" value="1">Female</label>
                    </div>

                    <input class="btn btn-success" type="submit" value="Save Changes">

                </form>

            </div>
        </div>
    </div>

   <div class="clearfix"></div>

</body>
</html>


<?php  require_once("footer.php"); ?>