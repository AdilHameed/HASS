<?php
include('../db_connect.php');
Define('Title', 'Insert Assets');
Define('PAGE', 'assets');
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
if(($_POST["pName"]== "") || ($_POST["pDop"]== ""))
{
	$message ='<div class="alert alert-warning mt-2" role="alert"> All fields are required</div>';
}	
else
{
$name = $_POST['pName'];
$d = $_POST['pDop'];
$a = $_POST['pAvail'];
$t = $_POST['pTotal'];
$c = $_POST['pCp'];
$s = $_POST['pSp'];
//$pass = md5($_POST['rPassword']);

//check whether email id is present in db or not

$check = "SELECT p_id FROM assets WHERE p_name = '$name'";
//$check = "SELECT r_email FROM requester WHERE r_email = '$mail'";
$query_result = mysqli_query($con, $check) or die(mysqli_error($con));

if(mysqli_num_rows($query_result))
{
	//echo "<script>window.alert('ERROR:Email ID is already exists!');</script>";
	$message ='<div class="alert alert-warning mt-2" role="alert"> ERROR:This product already exists!</div>';
	// die(mysqli_error($con));
}
else
{
 $insert = "INSERT INTO assets (p_name, p_dop, p_avail, p_total, p_cp, p_sp) VALUES ('$name', '$d', '$a', '$t', '$c', '$s')";
  $res   = mysqli_query($con, $insert) or die(mysqli_error($con));
  if($res == TRUE)
  {
  	$message='<div class="alert alert-warning mt-2" role="alert"> Product added successfully</div>';
  	// $_SESSION['islogin'] = TRUE;
  	//$_SESSION['rEmail'] = $mail;
  	header("location:insertasset.php");
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
	<h3 class="text-center">Add New Product</h3>
			<form action="" method="POST">

				<div class="form-group">
					 <label for="name" class="font-weight-bold">Name</label>
					<input type="text" class="form-control" name="pName"  >	
				</div>

				<div class="form-group">
					 <label for="name" class="font-weight-bold">DOP</label>
					<input type="date" class="form-control" name="pDop"  >	
				</div>
				<div class="form-group">
					<label for="name" class="font-weight-bold ">Available</label>
					<input type="number" class="form-control" name="pAvail" required >	
				</div>

				<div class="form-group">
				 <label for="email" class="font-weight-bold ">Total</label>
					<input type="number" class="form-control" name="pTotal" >
					<!--<small class="form-text">We'll never share your email with anyone else.</small>-->
				</div>
				<div class="form-group">
					<label for="name" class="font-weight-bold ">Cost Price</label>
					<input type="number" class="form-control" name="pCp" required >	
				</div>
				<div class="form-group">
					<label for="name" class="font-weight-bold ">Selling Price</label>
					<input type="text" class="form-control" name="pSp" required >	
				</div>

				<div class=text-center>
				<button type="submit" class="btn btn-primary" name="rsignup">Submit</button>
				<!--<em style="font-size: 10px;">Note - By clicking Sign Up, you agree to our terms, data policy and cookie policy</em>-->
				<a href="assets.php" class="btn btn-secondary">Close</a>
			</div>
				<?php if(isset($message)) {echo $message;} ?>
				
			</form>
			
		</div>
		
	</div>
	
</div>


 <?php include('footer.php');?>