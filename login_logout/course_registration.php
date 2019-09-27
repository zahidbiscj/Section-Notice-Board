
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>login teach</title>

	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/fontawesome-all.min.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>  		
	
</head>

<body>

<section>


	<?php include("user_dashboard.php"); ?>
 </section>


<section>
	
<?php

	



if(@$_POST['delete']=="Delete"){


	$id=$_POST['id'];

	include("condb.php");
	$sql = "delete from registration where contacts_id = '$id'";
	 
	 if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
}


$message="";


if(@$_POST['add']=="Confirm"){

$id =$_POST['id'];


$semester=$_POST['semester'];
$year=$_POST['year'];

include("condb.php");


$sql = "select * from contacts where id = '$id'";
   $qry = mysqli_query($conn,$sql);
   $num = mysqli_num_rows($qry);
	if($num>0) {
		while($row=mysqli_fetch_row($qry)){
			$id = $row[0];
			$name = $row[2];
			$dept_name = $row[3];
			$section = $row[8];
			$intake = $row[7];
			
		}
	}
	 else {
		$message = "failed . please try again !! ";
	}


?>



<div  id="accordion">
	<div class="card" style="border: none;">
	   <div class="card-header bg-transparent" id="heading1"	 style="border: none; ">
	      
	      <h5 class="mb-0">
	        
	     
<?php if($message!="") { ?>
	<div class="message"><?php echo $message; }?></div>
   
		
	      </h5>
	    </div>

	   
	  
	     <div class="card-body">
	   	   		
	   		<div class="row p-3 mb-2 bg-light text-dark">
				  <div class="col-md-8">
				  		<h6 class = "text-left">	<?php echo "Name : ", $name;?> </h6>
						<h6 class = "text-left">	<?php echo "Intake : ",$intake ;?> </h6> 
						<h6 class = "text-left">	<?php echo "Section : ", $section;?> </h6>	
	     		  		
	     		  		<hr>	
				  </div>
				 <div class="col-md-4">

				 	<h6 class = "text-right">	<?php echo "ID :",$id;?> </h6>

				  	<h6 class = "text-right">	<?php echo "Department :", $dept_name ;?> </h6>

				  	<h6 class = "text-right">	<?php echo "Semester :", $semester ;?> </h6>

				  	<h6 class = "text-right">	<?php echo "year :", $year ;?> </h6>
					
				  	
				  </div>
			</div> 
		
	      </div>
	</div>
</div>








<table class="table table-bordered">
	
  <thead>
    <tr>
      <th>Course code</th>
      <th>Course title </th>
    </tr>
  </thead>
</table>
<?php

$course_code=$_POST['course_code'];
$course_title=$_POST['course_title'];

$totalSpec=sizeof($course_code);

for($i=0;$i<$totalSpec;$i++)
{
    $spec=$course_code[$i];
    $speci=$course_title[$i];

   
   
?> 

<table class="table table-bordered">
  <tbody>
    
    <tr>
      
      <td>
      	<?php echo $spec; ?>
      </td>
    
    <td >  
		<?php echo $speci; ?>	 
	</td>
    </tr>

 
  </tbody>
</table>   

    
<?php
$sql = "INSERT INTO registration(dept_name,course_code,course_title,semester, year , intake , section , contacts_id) values('$dept_name','$spec','$speci','$semester','$year','$intake','$section','$id')"; 
	  
	  if (mysqli_query($conn, $sql)){
	  echo "New record is inserted successfully";
	  
	  }
	  
	  else {
    $message = " failed . please try again !! ";
}

	  
}
}

?>













</section>


</body>
</html>