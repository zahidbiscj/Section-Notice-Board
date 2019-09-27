<script type="text/javascript" >
			window.history.forward();
</script>

<!DOCTYPE html>
<html>
<head>
      <title>Teacher regform</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/fontawesome-all.min.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>  		
</head>      

<body>



	
    
<!-- navbar part start -->
    
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: white; width:1100;">
		  
		<a class="navbar-brand" href="../index.php"><img src="../images/logo.png" class="" alt="LOGO of website" width="400" height="100" ></a>
		
	
		 <!-- Links -->
				<ul class="navbar-nav ml-auto text-dark bg-light">
					<li class="nav-item">
						<a class="nav-link" href="../index.php">Home</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="../about_us.php">About us</a>
					</li>

					<!-- Dropdown -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
						Important links
						</a>
						<div class="dropdown-menu">
								<a class="dropdown-item" href="https://www.bubt.edu.bd/Home/page_details/Class_Routine" target="_blank">Class schedule</a>
								<a class="dropdown-item" href="https://www.bubt.edu.bd/Home/page_details/Exam_Routine"target="_blank">Exam routine</a>
							<a class="dropdown-item" href="https://www.bubt.edu.bd/home/results" target="_blank">Show your result</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Help</a>
					</li>
				  </ul>
		</nav>
	

<!-- navbar part end -->



	

<center><h1>Teacher Registration Form </h1></center>

<section>

<?php

session_start();
include("condb.php");

$message="";

if(@$_POST['teacher_register']=="register"){
	


$short_code = $_POST['short_code'];
$fullname = $_POST['fullname'];
$dept_name = $_POST['dept_name'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$mobile= $_POST['mobile'];


 $sql = "INSERT INTO contacts(short_code,name,dept_name,email,password,mobile,type) values ('$short_code','$fullname','$dept_name','$email', '$password','$mobile','teacher')"; 
	  
	  if (mysqli_query($conn,$sql)){
	  echo "New record is inserted successfully";
	  }
	  else {
	  			$message = "Registration failed . please try again !! ";

	  }


?>



<?php
}
?>

<?php if($message!="") { ?>
	<div class="message"><?php echo $message; }?></div>

<form name="teacher_register_new" method="post" enctype="multipart/form-data">
		

			<table class="table table-bordered">
				
				<tr>
					<td>Full name : </td>
					<td><input  type="text"  class="form-control" name="fullname" required/></td>
				</tr>

				<tr>
					<td>Short code of your name </td>
					<Td><input  type="text"  class="form-control" name="short_code" required/></td>
				</tr>

				<tr>
					<td><label for="dept_name">Department name  : </label></td>	  <td>
						<select class="custom-select custom-select-sm mb-3" name="dept_name">
						  <option selected>please select a Department  ....</option>
						   <option>CSE</option>
						   <option>EEE</option>
						   <option>textile engg.</option>
						</select>
					</td>
				</tr>


				<tr>
					<td>Enter Your E-mail : </td>
					<td><input type="email"  class="form-control" name="email" required/></td>
				</tr>
				
				<tr>
					<td>Enter Your Password </td>
					<td><input type="password"  class="form-control" name="password" required/></td>
				</tr>
				
				<tr>
					<td>Enter Your Mobile </td>
					<td><input  class="form-control" type="number" name="mobile" required/></td>
				</tr>
				
			
				
			<tr>
				<td colspan="2" align="center">
					<input type="submit" class="btn btn-success" value="register" name="teacher_register"/>
					<input type="reset" class="btn btn-success" value="Reset"/>
				
				</td>
			</tr>
		</table>
</form>





</section>
</body>