
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>login teacher</title>

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


 <!-- form  --> 



<form action="course_registration.php" method = "post">


<br><br><br><br><br>
<center><h1 class="text-success">Course Registration </h1></center>

<br><br>

<table class="table table-bordered">
 <center>
  <label for="course_code">Enter student's ID : </label>
		<input type="text" name="id" required> </input>
		

<br><br>
<label for="semester">Semester  : </label>	  
<select class="custom-select-sm mb-3" name = "semester"required>
  <option selected>please select your semester ....</option>
   <option>Spring</option>
   <option>Fall</option>
   <option>Summer</option>
</select>


<label for="year">Year  : </label>	  
<select class="custom-select-sm mb-3" name = "year"required>
  <option selected> select year  ....</option>
   <option>2018</option>
   <option>2019</option>
   <option>2020</option>
   <option>2021</option>
</select>
</center>


<p>(NOTE: press ctrl then select to register in multiple course At a time)</p>

<br><br><br>
  <thead>
    <tr>
      <th scope="col">Course code</th>
      <th scope="col">Course title </th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <th scope="row">
      	<select class="custom-select my-1 mr-sm-2" name="course_code[]" multiple="multiple" >
		  <option selected>Select  Course code  </option>
		   <option value="CSE-101">CSE 101</option>
		   <option value="CSE-111">CSE 111</option>
		   <option value="CSE-103">CSE 103</option>
		   <option value="CSE-121">CSE 121</option>
		   <option value="CSE-213">CSE 213</option>
		   <option value="CSE-205">CSE 205</option>
		   <option value="CSE-231">CSE 231</option>
		   <option value="CSE-241">CSE 241</option>
		   <option value="CSE-223">CSE 223</option>
		   <option value="CSE-317">CSE 317</option>
		   <option value="CSE-331">CSE 331</option>
		   <option value="CSE-309">CSE 309</option>
		   <option value="CSE-323">CSE 323</option>
		   <option value="CSE-327">CSE 327</option>
		   <option value="CSE-351">CSE 351</option>
		   
		   </select>

      </th>
      <td colspan="2">
      	<select class="custom-select my-1 mr-sm-2" name = "course_title[]"multiple="multiple" >
		  <option selected>Select  Course Title  </option>
		   <option value="Computer and Programming Concepts">Computer and Programming Concepts</option>
		   <option value="Structured Programming Language">Structured Programming Language</option>
		   <option value="Discrete Mathematics">Discrete Mathematics</option>
		   <option value="Object Oriented Programming Language">Object Oriented Programming Language</option>
		   <option value="Data Structures">Data Structures</option>
		   <option value="Theory of Computing & Automata Theory ">Theory of Computing & Automata Theory </option>
		   <option value="Data Structures">Data Structures</option>
		   <option value="Digital Logic Design">Digital Logic Design</option>
		   <option value="Algorithms">Algorithms</option>
		   <option value="System Analysis and Design">System Analysis and Design</option>
		   <option value="Microprocessor and Interfacing ">Microprocessor and Interfacing </option>
		   <option value="Operating Systems  ">Operating Systems </option>
		    <option value="Software Engineering ">Software Engineering</option>
		   <option value="Artificial Intelligence and Expert System">Artificial Intelligence and Expert System  </option>
		  
		</select>
      </td>
    <td>  
				

		 <input type='submit' value="Confirm" name = "add"></input>
		 <input type='submit' value="Delete" name = "delete"></input>
		 
	</td>
    </tr>

 
  </tbody>
</table>
</form>





</section>



</body>

</html>