<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

    
<?php 

    $condition = "";
    if(isset($_GET["search"])){
        $search = $_GET["search"];
        $condition = "WHERE user_id LIKE '%$search%' OR user_id = '$search' ";


    }

    $users = mysqli_query($con, "SELECT * FROM users $condition");
    $row_users = mysqli_fetch_assoc($users);

    $totalRows_users =  mysqli_num_rows($users);
    

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

        <div class="panel panel-primary">
            <div class="panel-heading"> 
                <h1>User List</h1>
            </div>

            <div class="panel-body">

        <?php if(isset($_GET["delete"])) { ?>

            <div class="alert alert-success">
                Selected user has been successfully removed!
            </div>

        <?php } ?>

        <?php if(isset($_GET["edit"])) { ?>

            <div class="alert alert-success">
                Selected user has been successfully updated!
            </div>

        <?php } ?>    


        <?php if(isset($_GET["add"])) { ?>

            <div class="alert alert-success">
                New user has been successfully Registred!
            </div>

        <?php } ?>


            <form>
                <div class="input-group">
                    <span class="input-group-addon">
                        Search user:
                    </span>
                        <input class="form-control" type="text" name="search">
                
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-search"></span> Search
                    </button>  
                </span>
                
                </div>

            </form>

            <?php if($totalRows_users > 0) {  ?>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Staff ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

            <?php do{  ?>

                    <tr>
                    <td><?php echo $row_users["user_id"]; ?></td>
                        <td><?php echo $row_users["staff_id"]; ?></td>
                        <td><?php echo $row_users["username"]; ?></td>
                        <td><?php echo $row_users["password"]; ?></td>  
                        
                        <td>
                            <a href="user_edit.php?user_id=<?php echo $row_users["user_id"]; ?>">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                        </td>

                        <td>
                            <a class="delete" href="user_delete.php?user_id=<?php echo $row_users["user_id"]; ?>">
                                <span class="glyphicon glyphicon-trash "></span>
                            </a>
                        </td>
                    
                    </tr>

            <?php }while($row_users = mysqli_fetch_assoc($users)); ?>

                </table>

                </div>

            <?php }else{  ?>
                <br>
                <div class="alert alert-warning text-center">
                    <h3 style="margin:0;">There is no user!</h3>
                </div>

            <?php }?>

            </div>

        </div>

</body>
</html>


<?php require_once("footer.php"); ?>

