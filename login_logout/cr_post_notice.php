<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>name</title>

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

$id =$_SESSION["id"];
include("condb.php");

$sql = "select name,intake,section,dept_name from contacts where id = '$id'";
   $qry = mysqli_query($conn,$sql);
   $num = mysqli_num_rows($qry);
	if($num>0) {
		while($row=mysqli_fetch_row($qry)){
			$intake = $row[1];
			$section = $row[2];
			$dept_name = $row[3];
			
		}
	}
	 else {
		$message = "Intake section not found ";
	}


?>


<?php
$message="";


if(@$_POST['notice_submit']=="submit"){





$notice_title = $_POST['notice_title'];

$course_code = $_POST['course_code'];
$course_code = strtoupper($course_code);
$course_title = $_POST['course_title'];
$semester= $_POST['semester'];
$year = $_POST['year'];
$submission_date = $_POST['submission_date'];
$topics = $_POST['topics'];
$others = $_POST['others'];



 $sql = "INSERT INTO notice(notice_title,dept_name,course_code,course_title,intake,section,semester,year,submission_date,publish_schedule
,topics,others
) values('$notice_title','$dept_name','$course_code','$course_title','$intake','$section','$semester','$year','$submission_date',Current_timestamp,'$topics','$others'
)"; 
	  
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



	





<div class="container">

 <?php echo "You are the CR of Intake - " .$intake. " , section - ".$section. "  and Department - ".$dept_name."  .you can give a notice to your section " ?>
  
  <br><br> 
  <center><h1>Compose a new notice </h1></center>
  
<form action="" method="post">
    <div class="form-group">
      


<label for="notice_title">Title  : </label>	  
<select class="custom-select custom-select-sm mb-3" name ="notice_title">
  <option selected>please select a title  ....</option>
   <option>ANNOUNCEMENT FOR CLASS TEST</option>
   <option>ANNOUNCEMENT FOR QUIZ</option>
   <option>ANNOUNCEMENT FOR Assignment</option>
</select>


	  
 <br><br>  



<label for="course_code">Course code : </label>
<?php
$sql = "select course_code,course_title from registration where contacts_id = '$id'";
   $qry = mysqli_query($conn,$sql);
   $num = mysqli_num_rows($qry);
	if($num>0) {
	?>	
		<select name="course_code">
			  <option selected>select a course code  ....</option>

		<?php while($row=mysqli_fetch_row($qry)){
			$course_code = $row[0];
				
		?>
            <option value="<?php echo $course_code; ?>"><?php echo $course_code; ?></option>
    		
    			<?php }} ?>
			</select>

	
			

<label for="course_title">Course Title : </label>
<?php
$sql = "select course_code,course_title from registration where contacts_id = '$id'";
   $qry = mysqli_query($conn,$sql);
   $num = mysqli_num_rows($qry);
	if($num>0) {
	?>	
		<select name="course_title">
			 <option selected>select a course title  ....</option>
		<?php while($row=mysqli_fetch_row($qry)){
			$course_title = $row[1];
				
		?>
            <option  value="<?php echo $course_title; ?>"><?php echo $course_title; ?></option>
    		
    			<?php } }?>
			</select>

<br><br>

<label for="semester">Semester  : </label>	  
<select class="custom-select-sm mb-3" name = "semester">
  <option selected>please select your semester ....</option>
   <option>Spring</option>
   <option>Fall</option>
   <option>Summer</option>
</select>


<label for="year">Year  : </label>	  
<select class=" custom-select-sm mb-3" name = "year">
  <option selected> select year  ....</option>
   <option>2018</option>
   <option>2019</option>
   <option>2020</option>
   <option>2021</option>
</select>


<br><br>





	




  <br><br>
	
	<label for="submission_date">Scheduled date :  </label>
	<input type="date" name="submission_date">
	
	
	
	<br><br><br>
	  
	  <label for="topics">Topics :</label>
	  <textarea class="form-control" rows="5" name="topics"></textarea>

<br><br>
	  <label for="others">If any important message / other messages :</label>
	  <h3><textarea class="form-control" rows="2"  name="others"></textarea></h3>

<br><br>

	  
	  
	 <center> <input type="submit" name="notice_submit" value="submit"></center>
    
<br><br>
    </div>
  
 </form>

 
 </div>

  		
</section>




</body>
</html>