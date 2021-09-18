<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>

<?php

    $id = $_GET["staff_id"];
    $month = $_GET["month"];
    $year = $_GET["year"];

    $staff = mysqli_query($con, "SELECT gross_salary FROM staff where staff_id = $id");
    $row_staff = mysqli_fetch_assoc($staff);
    
    $absent = mysqli_query($con, "SELECT SUM(absent_hour) AS total FROM attendance WHERE staff_id = $id AND absent_year = $year AND absent_month = $month");
    $row_absent = mysqli_fetch_assoc($absent);

    
    if($row_absent["total"] == ""){
        $total_absent =  0;
    }
    else{
        $total_absent = $row_absent["total"];
    }
    // sph = salary per hour 
    $sph = $row_staff["gross_salary"] / 26 / 8;          // 26 is days in a month and 8 is hours of work in a day
    $absent_amount = round($total_absent * $sph, 0);

    // calculation of tax

    /*
        5000    tax = 0
        12500   tax = 2%
        50,000  tax = 5%
        100,000 tax = 10$
        >100,000 tax = 20%

    */

    

    $gross_salary = $row_staff["gross_salary"];

    if($gross_salary <= 5000){
        $tax = 0;
    }
    else if($gross_salary <= 12500){
        $tax = $gross_salary * 2 / 100;
    }
    else if($gross_salary <= 50000){
        $tax = $gross_salary * 5 / 100;
    }
    else if($gross_salary <= 100000){
        $tax = $gross_salary * 10 / 100;
    }
    else{
        $tax = $gross_salary * 20 / 100;
    }

    $tax = round($tax, 0);

    $net_salary = $gross_salary - $absent_amount - $tax;



    if(isset($_POST["gross_salary"])){
        $absent_amount = $_POST["absent_amount"];
        $bonus = $_POST["bonus"];
        $tax = $_POST["tax"];
        $net_salary = $_POST["net_salary"];

        
        
        $result = mysqli_query($con, "INSERT INTO salary VALUE ($id, $year, $month, $absent_amount, $bonus, $tax, $net_salary)");

        if($result){
            header("location:salary_list.php?add=done");
        }
        else{
            header("location:salary_add.php?error=notadd&staff_id$id=&year=$year&month=$month");
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
    <title>Attendance Add</title>
   
</head>
<body>
    
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Pay Salary</h1>
                </div>

                <div class="panel-body">
                    
                        <?php if(isset($_GET["error"])) { ?>

                            <div class="alert alert-danger">
                                Could not Pay Salary! Please try again!
                            </div>
                            
                        <?php } ?>
                            
                    <form method="post">

                        <div class="input-group">
                            <span class="input-group-addon">
                                Gross Salary:
                            </span>
                            <input readonly value="<?php echo $row_staff["gross_salary"]; ?>" class="form-control" type="text" name="gross_salary">
                            <span class="input-group-addon">
                                AFG
                            </span>
                      </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                Absent Hours:
                            </span>
                            <input readonly value="<?php echo $total_absent; ?>" class="form-control" type="text" name="absent_hour">
                            <span class="input-group-addon">
                                Hours
                            </span>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                Absent Amount:
                            </span>
                            <input readonly value="<?php echo $absent_amount; ?>" class="form-control" type="text"  name="absent_amount">
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                Bonus:
                            </span>
                            <input id="bonus" value="0" class="form-control" type="text" name="bonus">
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                Tax:
                            </span>
                            <input readonly value="<?php echo $tax; ?>" class="form-control" type="text" name="tax" >
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                Net Salary:     
                            </span>
                            <input id="net_salary" readonly value="<?php echo $net_salary; ?>" class="form-control" type="text" name="net_salary">
                            <input value="<?php echo $net_salary; ?>" type="hidden" id="net_salary_amount">
                        </div>

                        <input class="btn btn-success" type="submit" value="Pay Salary">


                    </form>

                </div>

            </div>



   
</body>
</html>


<?php require_once("footer.php"); ?>