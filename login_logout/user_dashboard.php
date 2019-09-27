

<html>
	<head>
		<title>User Login</title>
		<link rel="stylesheet" type="text/css" href="styles.css" />
		<script type="text/javascript" >
			window.history.forward();
</script>
	</head>

	<body>

		
<section>


<?php
session_start();
include("functions.php");
if(isset($_SESSION["user_id"])) {
	if(isLoginSessionExpired()) {
		header("Location:logout.php?session_expired=1");
	}
}
?>

<div class="row bg-light">
		  <div class="col"><h3>User Dashboard</h3></div>
		  <div class="col">
		  	<?php
				if(isset($_SESSION["name"])&&$_SESSION["user_id"]==1001) {
				?>
				Welcome <?php echo $_SESSION["name"]; ?>. Click here to <a href="login_logout/logout.php" >Logout</a>
				<?php
				}

				if(isset($_SESSION["name"])&&$_SESSION["user_id"]==1002) {
				?>
				Welcome <?php echo $_SESSION["name"]; ?>. Click here to <a href="logout.php" >Logout</a>
				
				<?php
				}

				if(isset($_SESSION["name"])&&$_SESSION["user_id"]==1004) {
				?>
				Welcome <?php echo $_SESSION["name"]; ?>. Click here to <a href="logout.php" >Logout</a>
				
				<?php
				}


				?>
		  </div>
		  
</div>



</section>




		
		
	</body>
</html>
