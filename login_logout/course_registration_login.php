<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>name4</title>
	<link rel="stylesheet" type="text/css" href="styles.css" />
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/fontawesome-all.min.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>  		
	
</head>


<body>


<section>



<?php
session_start();
include ("functions.php");

include("condb.php");

$message="";

if(@$_POST['submit_login']=="submit") {

   $id = strtoupper($_POST['short_code']);
   $password = md5($_POST['teacher_password']);
   
   $sql = "select * from contacts where short_code = '$id'";
   $qry = mysqli_query($conn,$sql);
   $num = mysqli_num_rows($qry);
   
	if($num > 0 && $password==MD5("123")) {
		
		while($row=mysqli_fetch_row($qry)){
		$_SESSION["user_id"] = 1004;
		$_SESSION["name"] = $row[2];
		$_SESSION["id"] = $row[1];
		$_SESSION['loggedin_time'] = time(); 
		}}

	 else {
		$message = "Invalid ID or Password!";
	}





if(isset($_SESSION["user_id"])) {
	if(!isLoginSessionExpired()) {
		header("Location: c_r.php");
	} else {
		header("Location:logout.php?session_expired=1");
	}
}

if(isset($_GET["session_expired"])) {
	$message = "Login Session is Expired. Please Login Again";
}

}


?>



	<form name="admin_login" method="post" action="">
	<?php if($message!="") { ?>
	<div class="message"><?php echo $message; }?></div>
		

		<table border="0" align="center" cellpadding="10" cellspacing="1" width="70%" class="tblLogin">
			<tr class="tableheader">
				<td align="center" colspan="2">Teacher login </td>
			</tr>
			<tr class="tablerow">
				<td align="right">Short code  </td>
				<td><input type="text" name="short_code"></td>
			</tr>
			<tr class="tablerow">
				<td align="right">Secret Password </td>
				<td><input type="password" name="teacher_password"></td>
			</tr>
			<tr class="tableheader">
				<td align="center" colspan="2"><input type="submit" name="submit_login" value="submit"></td>
			</tr>
		</table>
	</form>



</section>
</body>
</html>