<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

    
<?php 

    $condition = "";
    if(isset($_GET["search"])){
        $search = $_GET["search"];
        $condition = "WHERE patient_id LIKE '%$search%' OR result_id = '$search' ";


    }

    $test_result = mysqli_query($con, "SELECT * FROM test_result $condition");
    $row_test_result = mysqli_fetch_assoc($test_result);

    $totalRows_result =  mysqli_num_rows($test_result);
    

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
                <h1>Labratory Test List</h1>
            </div>

            <div class="panel-body">

        <?php if(isset($_GET["delete"])) { ?>

            <div class="alert alert-success">
                Selected Test has been successfully removed!
            </div>

        <?php } ?>

        <?php if(isset($_GET["edit"])) { ?>

            <div class="alert alert-success">
                Selected Test has been successfully updated!
            </div>

        <?php } ?>    


        <?php if(isset($_GET["add"])) { ?>

            <div class="alert alert-success">
                New Test has been successfully Registred!
            </div>

        <?php } ?>


            <form>
                <div class="input-group">
                    <span class="input-group-addon">
                        Search Tests:
                    </span>
                        <input class="form-control" type="text" name="search">
                
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-search"></span> Search
                    </button>  
                </span>
                
                </div>

            </form>

            <?php if($totalRows_result > 0) {  ?>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Result ID</th>
                        <th>Patient ID</th>
                        <th>Test ID</th>
                        <th>Test Date</th>
                        <th>Test Result</th>
                    </tr>

            <?php do{  ?>

                    <tr>
                        <td><?php echo $row_test_result["result_id"]; ?></td>
                        <td><?php echo $row_test_result["patient_id"]; ?></td>
                        <td><?php echo $row_test_result["test_id"]; ?></td>
                        <td><?php echo $row_test_result["test_date"] ?></td>
                        <td><?php echo $row_test_result["test_result"]; ?></td>    
                        
                        <td>
                            <a href="patient_test_edit.php?result_id=<?php echo $row_test_result["result_id"]; ?>">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                        </td>

                        <td>
                            <a class="delete" href="test_result_delete.php?result_id=<?php echo $row_test_result["result_id"]; ?>">
                                <span class="glyphicon glyphicon-trash "></span>
                            </a>
                        </td>
                    
                    </tr>

            <?php }while($row_test_result = mysqli_fetch_assoc($test_result)); ?>

                </table>

                </div>

            <?php }else{  ?>
                <br>
                <div class="alert alert-warning text-center">
                    <h3 style="margin:0;">There is no Test!</h3>
                </div>

            <?php }?>

            </div>

        </div>

</body>
</html>


<?php require_once("footer.php"); ?>

