<?php

	if(!isset($_SESSION)){
		session_start();
	}

?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">	
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="css/calendar-blue2.css">
<link rel="stylesheet" type="text/css" href="css/style.css">	
<style type="text/css">
	body{
		background-color: gray;
	}
</style>				

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>	
<script type="text/javascript" src="js/calendar.js"></script>	
<script type="text/javascript" src="js/calendar-en.js"></script>	
<script type="text/javascript" src="js/calendar-setup.js"></script>	
<script type="text/javascript" src="js/script.js"></script>	

<title>Hospital MIS</title>
	
<meta charset="utf-8">	
	
</head>
<body>

	


<div class="container">

	<div id="banner" class="noprint">

		<?php if(!isset($_SESSION["staff_id"])) { ?>

			<a href = "login.php" class="btn btn-primary pull-right" style="margin-top: 30px; margin-left: 20px;">
				Login to MIS
			</a>


		<?php }else{  ?>

			<a href = "user_add.php" class="btn btn-primary pull-right" style="margin-left: 5px; width: 70px; margin-top: 30px;">
				Sign up		
			<a/>

		<?php } ?>

		
		<div>
			<a href = "<?php echo $_SERVER['PHP_SELF']; ?>?lang=en" class="btn btn-primary pull-right" style="margin-left: 5px; width: 70px; margin-top: 30px;">
				English
			<a/>&nbsp;
			
			<a href = "<?php echo $_SERVER['PHP_SELF']; ?>?lang=pr" class="btn btn-primary pull-right" style="margin-left: 30px; width: 70px; margin-top: 30px;">
				دری		
			<a/>


			</div>



		<img src="images/home.jpeg" width="100" height="100">
		
		<h1>Hospital Management System</h1>
		
		<div class="clearfix"></div>
		
	</div>
	
	<div id="menu">
	
				
		<nav class="navbar navbar-default navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="collapse">
            
			<?php if(isset($_SESSION["staff_id"])) 	{ ?>

				<ul class="nav navbar-nav" id="nav-top">
                	<li><a href="home.php" style="margin-top: -30px;">Home</a></li>
                	<li class="dropdown"><a href="#" data-toggle="dropdown">Patient <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="patient_add.php">Register New Patient</a></li>
                        	<li><a href="patient_list.php">Patient List</a></li>
                        	<li><a href="#">Diagnosis</a></li>
                        	<li><a href="#">Patient Admit</a></li>
                        	<li><a href="#">Appointment</a></li>
                        </ul>                    
                    </li>
				

                	<li class="dropdown"><a href="#" data-toggle="dropdown">Pharmacy <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                            <li><a href="medicine_add.php">Add New Medicine</a></li>
                        	<li><a href="medicine_list.php">Medicine List</a></li>
                            <li><a href="#">Patient Medicine</a></li>
                            <li><a href="#">Shortage Medicine</a></li>
                        </ul>                    
                    </li>
                	<li class="dropdown"><a href="#" data-toggle="dropdown">Laboratoar <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="test_add.php">Add New Test</a></li>
                        	<li><a href="test_lab_add.php">Lab Test</a></li>
                            <li><a href="patient_test.php">Patient Tests</a></li>
                            <li><a href="#">Blood Bank</a></li>
                            
                        </ul>                    
                    </li>
                	<li class="dropdown"><a href="#" data-toggle="dropdown">Finance <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="#">Add New Income</a></li>
                        	<li><a href="#">Income List</a></li>
                            <li><a href="expense_add.php">Add New Expense</a></li>
                            <li><a href="expense_list.php">Expense List</a></li>
                        </ul>                    
                    </li>
                	<li class="dropdown"><a href="#" data-toggle="dropdown">Staff <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="staff_add.php">Add New Staff</a></li>
                            <li><a href="staff_list.php">Staff List</a></li>
                            <li><a href="attendance_list.php">Staff Attendance</a></li>
                            <li><a href="salary_list.php">Staff Salary</a></li>
                            <li><a href="#">Staff Schedule</a></li>
                        </ul>                    
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown">Management <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="department_list.php">Department</a></li>
                        	<li><a href="#">Room Management</a></li>
                            <li><a href="#">Equipment Management</a></li>
                            <li><a href="user_list.php">User Accounts</a></li>
                        </ul>                    
                    </li>
                    <li><a href="logout.php">Logout</a></li>  
                </ul>
				
			<?php } else {  ?>

				<ul class = "nav navbar-nav" id = "navtop">
					<li><a href = "#" style="margin-top: -30px;">Home</a></li>
					<li><a href = "#">About</a></li>
					<li><a href = "#">Gallery</a></li>
					<li><a href = "contact.php">Contact</a></li>			
				</ul>

			<?php } ?>
					
            </div>  
        </nav>
			
		

	</div>
	
	
	<div class="clearfix"></div>
	
	<div id="content">