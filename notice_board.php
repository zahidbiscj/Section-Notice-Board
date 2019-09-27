<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Notice Board</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>  		
	
</head>

<body>

<section>
	
  		<?php include("login_logout/user_dashboard.php");
  		?>
</section>



<section>




<?php
 include('login_logout/condb.php');

$id =$_SESSION["id"];

 $query = "SELECT * FROM notice,registration  WHERE notice.intake = registration.intake AND notice.section=registration.section and notice.course_code=registration.course_code AND registration.contacts_id = '$id' AND notice.dept_name = registration.dept_name order by notice.serial_no DESC LIMIT 6";
 $res = mysqli_query($conn,$query);
 $num = mysqli_num_rows($res);
  

?>


	
<div style="text-align: center" >
	<h1> NOTICE BOARD  </h1>
</div>

<br><br><br><br><br>
<?php
		
	$row_count = 1;
	while($row=mysqli_fetch_row($res)){

?>	
	
	<div  id="accordion">
	  <div class="card" style="border: none;">
	    <div class="card-header bg-transparent" id="heading<?=$row_count?>"	 style="border: none;>
	      <h5 class="mb-0">
	        <button class="btn" style="width: 65rem;" type="button" data-toggle="collapse" data-target="#demo<?=$row_count?>"aria-expanded="false" aria-controls="#demo<?=$row_count?>" >  
	        	<?php echo $row[1]; ?>
	          
	        </button><br>
		<?php echo "NOTICE PUBLISH DATE : " , $row[10]; ?>
	      </h5>
	    </div>

	    <div id="demo<?=$row_count?>"  class="collapse" aria-labelledby="heading<?=$row_count?>" data-parent="#accordion">
	  
	     <div class="card-body">
	   	   		
	   		<div class="row p-3 mb-2 bg-light text-dark">
				  <div class="col-md-8">
						<h6 class = "text-left">	<?php echo "COURSE Title : ", $row[4];?> </h6> 
						<h6 class = "text-left">	<?php echo "Topics : ", nl2br($row[11]);?> </h6> <br>	
	     		  		
	     		  		<hr>
	     		  		<h5 class = "text-left"><span class="badge badge-pill badge-danger"><?php echo "Important Notice : ", $row[12];?> </span></h5> 	
				  </div>
				 <div class="col-md-4">

				  	<h6 class = "text-right">	<?php echo "Department :", $row[2];?> </h6> 
					
				  	<h6 class = "text-right">	<?php echo "COURSE CODE : ", $row[3];?> </h6> 
					<h6 class = "text-right">	<?php echo "Intake-section : ", $row[5]."-".$row[6];?> </h6> 
					<h6 class = "text-right">	<?php echo "Semester : ", $row[7].",".$row[8];?> </h6> 
					<h6 class = "text-right">	<?php echo "Scheduled date : ", $row[9];?> </h6> <br>
				  </div>
			</div> 
		
	      </div>
	    </div>
	  </div>


	  
	 
	

</div>



<?php $row_count++; } ?>		



</section>



</body>
</html>