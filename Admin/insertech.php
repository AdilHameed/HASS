<?php
include('../db_connect.php');
Define('Title', 'Insert Technician');
Define('PAGE', 'tech');
include('header.php');
 if(isset($_SESSION['isadlogin']))
 {
  $adEmail = $_SESSION['aEmail'];  
 }
 else
 {
  header('location:login.php');  
 }
if(isset($_POST['rsignup']))
{
if(($_POST["rName"]== "") || ($_POST["rEmail"]== ""))
{
	$message ='<div class="alert alert-warning mt-2" role="alert"> All fields are required</div>';
}	
else
{
$name = $_POST['rName'];
$city = $_POST['rCity'];
$mob = $_POST['rMob'];
$mail = $_POST['rEmail'];
//$pass = md5($_POST['rPassword']);

//check whether email id is present in db or not

$check = "SELECT emp_id FROM technician WHERE tech_email = '$mail'";
//$check = "SELECT r_email FROM requester WHERE r_email = '$mail'";
$query_result = mysqli_query($con, $check) or die(mysqli_error($con));

if(mysqli_num_rows($query_result))
{
	//echo "<script>window.alert('ERROR:Email ID is already exists!');</script>";
	$message ='<div class="alert alert-warning mt-2" role="alert"> ERROR:Email ID is already exists!</div>';
	// die(mysqli_error($con));
}
else
{
 $insert = "INSERT INTO technician (tech_name, tech_city, tech_mob, tech_email) VALUES ('$name', '$city', '$mob', '$mail')";
  $res   = mysqli_query($con, $insert) or die(mysqli_error($con));
  if($res == TRUE)
  {
  	$message='<div class="alert alert-warning mt-2" role="alert"> Technician added successfully</div>';
  	// $_SESSION['islogin'] = TRUE;
  	//$_SESSION['rEmail'] = $mail;
  	header("location:insertech.php");
  }
  else
  {
  	$message= '<div class="alert alert-warning mt-2" role="alert">Unable to add</div>';
  }
 // $_SESSION['r_id'] = mysqli_insert_id($con);
 // $_SESSION['r_email'] = $mail;
 // echo "<script>window.alert('Hello $name </br> You are successfully registered!'); </script>";
 // header('location:request.php');
}
}
}

 ?>
<div class="col-sm-6 mt-5 mx-5 jumbotron">
	<h3 class="text-center">Add New Technician</h3>
			<form action="" method="POST">

				<div class="form-group">
					<i class="fas fa-user"></i> <label for="name" class="font-weight-bold pl-2">Name</label>
					<input type="text" class="form-control" name="rName"  >	
				</div>

				<div class="form-group">
					<i class="fas fa-user"></i> <label for="name" class="font-weight-bold pl-2">City</label>
					<input type="text" class="form-control" name="rCity"  required>	
				</div>
				<div class="form-group">
					<i class="fas fa-user"></i> <label for="name" class="font-weight-bold pl-2">Mobile</label>
					<input type="number" class="form-control" name="rMob" required >	
				</div>

				<div class="form-group">
					<i class="fas fa-user"></i> <label for="email" class="font-weight-bold pl-2">Email</label>
					<input type="email" class="form-control" name="rEmail" >
					<!--<small class="form-text">We'll never share your email with anyone else.</small>-->
				</div>

				<div class=text-center>
				<button type="submit" class="btn btn-primary" name="rsignup">Submit</button>
				<!--<em style="font-size: 10px;">Note - By clicking Sign Up, you agree to our terms, data policy and cookie policy</em>-->
				<a href="technician.php" class="btn btn-secondary">Close</a>
			</div>
				<?php if(isset($message)) {echo $message;} ?>
				
			</form>
			
		</div>
		
	</div>
	
</div>


 <?php include('footer.php');?>