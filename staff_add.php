<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

<?php

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

        $size = $_FILES["photo"]["size"];
        $type = $_FILES["photo"]["type"];

        if($type == "image/jpeg" ||  $type == "image/png" || $type == "image/gif" ){

            if($size < 6 * 1024 * 1024){
                $path = "images/staff/" . time() . $_FILES["photo"]["name"] ;
                move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
            }
            else{
                header("location:staff_add.php?filesize=invalid");
            }
            
        } 
        else{
            header("location:staff_add.php?filetype=invalid");
        }

        $result = mysqli_query($con, "INSERT INTO staff VALUES(NULL, '$firstname', '$lastname', $birth_year, '$position', '$education', $gender, '$path',  '$phone', '$email', '$address', $gross_salary, '$hire_date', $staff_type, $department_id)");

        $newid = mysqli_insert_id($co);

        if($result){

            log_activity(1, $newid); 
           
            header("location:staff_list.php?add=done");
        }
        else{
            header("location:staff_add.php?error=notadd");
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
                <h1>Add New Staff</h1>
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
                        <input class="form-control" type="text" name="firstname">
                    </div>        

                    <div class="input-group">
                        <span class="input-group-addon">
                            Lastname:
                        </span>
                        <input class="form-control" type="text" name="lastname">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Birth Year:
                        </span>
                        <input class="form-control" type="date" name="birth_year">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Position:
                        </span>
                        <input class="form-control" type="text" name="position">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Education:
                        </span>
                        <input class="form-control" type="text" name="education">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Phone:
                        </span>
                        <input class="form-control" type="text" name="phone">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Email:
                        </span>
                        <input class="form-control" type="text" name="email">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Address:
                        </span>
                        <input class="form-control" type="text" name="address">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Gross Salary:
                        </span>
                        <input class="form-control" type="text" name="gross_salary">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Hire Date:
                        </span>
                        <input class="form-control" type="date" name="hire_date">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Staff Type:
                        </span>
                        <select class="form-control" name="staff_type">
                            <option value="1">Doctor</option>
                            <option value="2">Nurse</option>
                            <option value="3">Employee</option>
                        <select>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Department:
                        </span>
                        <select class="form-control" name="department_id">

                        <?php do{ ?>
                            <option value="<?php echo $row_department["department_id"]; ?>"><?php echo $row_department["name"]; ?></option> 
                        <?php }while($row_department = mysqli_fetch_assoc($department)); ?>

                        </select>   
                    </div>  

                    <div class="input-group">
                        <span class="input-group-addon">
                            Photo
                        </span>
                        <input class="form-control" type="file" name="photo">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            Gender:
                        </span>&nbsp; &nbsp;
                        <label><input type="radio" name="gender" value="0">Male</label>&nbsp;   
                        <label><input type="radio" name="gender" value="1">Female</label>
                    </div>

                    <input class="btn btn-success" type="submit" value="Register">

                </form>

            </div>
        </div>
    </div>

   <div class="clearfix"></div>

</body>
</html>


<?php  require_once("footer.php"); ?>