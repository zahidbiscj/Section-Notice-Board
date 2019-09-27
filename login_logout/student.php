<script type="text/javascript" >
			window.history.forward();
</script>

<!DOCTYPE html>
<html>
<head>
      <title>Student regform</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/fontawesome-all.min.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>  		
</head>      

<style>
body {
    background-image: url("../images/d.jpg");
    background-repeat: no-repeat;
	background-size: 110%;

	
}
</style>


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


<center><h1>Student Registration Form </h1></center>

<section>

<?php
session_start();
include("condb.php");

$message="";

if(@$_POST['student_register']=="submit"){



$id = $_POST['id'];
$name = $_POST['name'];
$dept_name = $_POST['dept_name'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$mobile= $_POST['mobile'];
$intake= $_POST['intake'];
$section= $_POST['section'];


 $sql = "INSERT INTO contacts(id,name,dept_name,email,password,mobile,intake , section,type) values('$id','$name','$dept_name','$email', '$password','$mobile','$intake','$section','student')"; 
	  
	  if (mysqli_query($conn, $sql)){
	  echo "New record is inserted successfully";
	  }
	  else {
	  			$message = "Registration failed . please try again !! ";

	  }


?>
<?php if($message!="") { ?>
	<div class="message"><?php echo $message; }?></div>

<?php
}
?>

<form name="student_register" method="post" enctype="multipart/form-data">

	
	<table class="table table-bordered">
	
				
				
				<tr>
					<td>ID :</td>
					<Td><input  type="text"  class="form-control" name="id" required/></td>
				</tr>

				
				<tr>
					<td>Full name : </td>
					<Td><input  type="text"  class="form-control" name="name" required/></td>
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
					
					
					<td><label for="intake">Intake  : </label>	</td>  
				<td><select class="custom-select custom-select-sm mb-3" name = "intake">
					 <option selected> select your intake....</option>
					  
					  <?php for($i=27;$i<=50;$i++)
						{
						    echo '<option value='.$i.'>'.$i.'</option>';
						   
						}

					  ?>

				</select></td>

					
				</tr>

				<tr>
				<td><label for="section">Section  : </label></td>  
					  
					<td><select class="custom-select custom-select-sm mb-3" name = "section">
						  <option selected>select your section ....</option>
						   <option>1</option>
						   <option>2</option>
						   <option>3</option>
						   <option>4</option>
						   <option>5</option>
						   <option>6</option>
						   <option>7</option>
						   <option>8</option>
						   <option>9</option>
						   <option>10</option>
						</select>
					</td>
					
				</tr>
		
				<tr>
					
					
					<td colspan="2" align="center">
					<input type="submit" class="btn btn-success" value="submit" name="student_register"/>
					<input type="reset" class="btn btn-success" value="Reset"/>
				
					</td>
				</tr>
			</table>
</form>
</section>
</body>