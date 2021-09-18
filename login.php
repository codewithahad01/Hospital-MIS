<?php require_once("connection.php"); ?>
<?php

    if(isset($_SESSION["staff_id"])){
        header("location:home.php");

    }

    if(isset($_POST["username"])){
        $username = $_POST["username"];
        $password =  $_POST["password"];

        $result = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' AND password = PASSWORD('$password')");
        
        if (mysqli_num_rows($result) == 1){
            $row_result = mysqli_fetch_assoc($result);
            $_SESSION["staff_id"] = $row_result["staff_id"]; 
            $_SESSION["user_id"] = $row_result["user_id"];

            
            $user_id = $row_result["user_id"];
            $date = jdate("y-m-d");
            $time = jdate("h:i:s"); 

            mysqli_query($con, "INSERT INTO login_log VALUES(NULL, $user_id, '$date', '$time')");

            header("location:home.php");
        }
        else{

            header("location:login.php?login=failed");
        }

    }

?>

<?php require_once("connection.php"); ?>

<?php require_once("top.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login to MIS</title>
    <style type = "text/css" >
                 
    </style>
</head>
<body>
        
     <div class = "col-lg-5 col-md-5 col-sm-5 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0" style="margin-top: 100px;">
         
        <div class="panel panel-primary">
            <div class = "panel-heading">
                <h1>Login to MIS</h1>
            </div>

            <div class = "panel-body">

                <?php if(isset($_GET["login"])) { ?>

                    <div class = "alert alert-danger">
                        Incorrect Username or Password!
                    </div>

                <?php } ?>
                
                
                <?php if(isset($_GET["logout"]))  { ?>

                    <div class = "alert alert-success">
                        You are Successfully Logout!
                    </div>

                <?php  }  ?>

                <?php if(isset($_GET["notlogin"])) { ?>

                    <div class = "alert alert-warning">
                        Please Login First!
                    </div>

                <?php  } ?>
                    
                    <form method = "post">
                        
                        <div class = "input-group">
                            <span class = "input-group-addon">
                                Username:
                            </span> 
                            <input class = "form-control" type = "username" name="username" placeholder="username">
                        </div>
                        
                        <div class = "input-group">
                            <span class = "input-group-addon">
                                Password:   
                            </span>
                            <input class = "form-control" type = "password" name="password" placeholder="password">
                        </div>

                            <input class="btn btn-primary" type = "submit" value = "Login">
                    </form>
            </div>
        </div>
    </div>

</body>
</html>

<?php require_once("footer.php"); ?>

