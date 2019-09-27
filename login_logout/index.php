
<script type="text/javascript" >
			window.history.forward();
</script>

<!DOCTYPE html>
<html>
	<head>
		 <meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Log in panel </title>
		
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script> 
	
	</head>


<style>
body {
    background-image: url("../images/a.jpg");
    background-repeat: no-repeat;
	background-size: 110%;

	
}
</style>


<body>

	<!-- navbar part start -->
    
<nav class="navbar navbar-expand-lg navbar-light" style=" width:1100;">
		  
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


 <section>

<?php

session_start();
include("condb.php");
include("functions.php");

$message="";

if(@$_POST['submit']=="login") {
	
   $id = $_POST['id'];
   $password = md5($_POST['password']);
   $sql = "select * from contacts where id = '$id'  and password = '$password' and type='student'";
   $qry = mysqli_query($conn,$sql);
   $num = mysqli_num_rows($qry);
	if($num>0) {
		while($row=mysqli_fetch_row($qry)){
		$_SESSION["user_id"] = 1001;
		$_SESSION["name"] = $row[2];
		$_SESSION["id"] = $_POST['id'];
		$_SESSION['loggedin_time'] = time(); 
		}
	}
	 else {
		$message = "Invalid ID or Password!";
	}
	
	



if(isset($_SESSION["user_id"])) {
	if(!isLoginSessionExpired()) {
		header("Location: ../notice_board.php");
	} else {
		header("Location:logout.php?session_expired=1");
	}
}

if(isset($_GET["session_expired"])) {
	$message = "Login Session is Expired. Please Login Again";
}

}
?>




	<form  name="frmUser" method="post" action="">
	<?php if($message!="") { ?>
	<div class="message"><?php echo $message; }?></div>
		

		<table border="0" align="center" cellpadding="10" cellspacing="1" width="50%" class="tblLogin">
			<tr class="tableheader">
				<td align="center" colspan="2">Enter Login Details</td>
			</tr>
			<tr class="tablerow">
				<td align="right">ID </td>
				<td><input type="text" name="id" required></td>
			</tr>

			<tr class="tablerow">
				<td align="right">Password </td>
				<td><input type="password" name="password"required></td>
			</tr>
			<tr class="tableheader">
				<td align="center" colspan="2"><input type="submit" name="submit" value="login"></td>
			</tr>
		</table>
	</form>

</section>


<section>



<?php




$message="";

if(@$_POST['submit_login']=="submit") {
   $id = $_POST['cr_id'];
   $password = md5($_POST['cr_password']);
   
   $sql = "select * from contacts where id = '$id'";
   $qry = mysqli_query($conn,$sql);
   $num = mysqli_num_rows($qry);
   
	if($num != 0 && $password==MD5("123")) {
		
		while($row=mysqli_fetch_row($qry)){
		$_SESSION["user_id"] = 1002;
		$_SESSION["name"] = $row[2];
		$_SESSION["id"] = $row[0];
		$_SESSION['loggedin_time'] = time(); 
		}}

	 else {
		$message = "Invalid ID or Password!";
	}





if(isset($_SESSION["user_id"])) {
	if(!isLoginSessionExpired()) {
		header("Location: cr_post_notice.php");
	} else {
		header("Location:logout.php?session_expired=1");
	}
}

if(isset($_GET["session_expired"])) {
	$message = "Login Session is Expired. Please Login Again";
}

}
?>



	<form name="cr_login" method="post" action="">
	<?php if($message!="") { ?>
	<div class="message"><?php echo $message; }?></div>
		

		<table border="0" align="center" cellpadding="10" cellspacing="1" width="70%" class="tblLogin">
			<tr class="tableheader">
				<td align="center" colspan="2">CR login </td>
			</tr>
			<tr class="tablerow">
				<td align="right">ID  </td>
				<td><input type="text" name="cr_id"required></td>
			</tr>
			<tr class="tablerow">
				<td align="right">Secret Password </td>
				<td><input type="password" name="cr_password"required></td>
			</tr>
			<tr class="tableheader">
				<td align="center" colspan="2"><input type="submit" name="submit_login" value="submit"></td>
			</tr>
		</table>
	</form>



</section>

</body>

</html>

