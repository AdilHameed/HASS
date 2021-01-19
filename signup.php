
<?php

include('db_connect.php');
if(isset($_SESSION['islogin']))
{
	header("location:Requester/userprofile.php");
}

if(isset($_POST['rsignup']))
{
if(($_POST["rName"]== "") || ($_POST["rEmail"]== "") || ($_POST["rPassword"]== ""))
{
	$message ='<div class="alert alert-warning mt-2" role="alert"> All fields are required</div>';
}	
else
{
$name = $_POST['rName'];
$mail = $_POST['rEmail'];
$pass = md5($_POST['rPassword']);

//check whether email id is present in db or not

$check = "SELECT r_id FROM requester WHERE r_email = '$mail'";
//$check = "SELECT r_email FROM requester WHERE r_email = '$mail'";
$query_result = mysqli_query($con, $check);

if(mysqli_num_rows($query_result))
{
	//echo "<script>window.alert('ERROR:Email ID is already exists!');</script>";
	$message ='<div class="alert alert-warning mt-2" role="alert"> ERROR:Email ID is already exists!</div>';
	// die(mysqli_error($con));
}
else
{
 $insert = "INSERT INTO requester (r_name, r_email, r_password) VALUES ('$name','$mail','$pass')";
  $res   = mysqli_query($con, $insert) or die(mysqli_error($con));
  if($res == TRUE)
  {
  	$message='<div class="alert alert-warning mt-2" role="alert"> Account successfully created</div>';
  	 $_SESSION['islogin'] = TRUE;
  	$_SESSION['rEmail'] = $mail;
  	header("location:Requester/userprofile.php");
  }
  else
  {
  	$message= '<div class="alert alert-warning mt-2" role="alert">Unable to create account</div>';
  }
 // $_SESSION['r_id'] = mysqli_insert_id($con);
 // $_SESSION['r_email'] = $mail;
 // echo "<script>window.alert('Hello $name </br> You are successfully registered!'); </script>";
 // header('location:request.php');
}
}
}
?>



<div class="container pt-5" id="registration">
	<h2 class="text-center">Create an account</h2>
	<div class="row mt-4 mb-4">
		<div class="col-md-6 offset-md-3">
			<form action="" method="POST" class="shadow-lg p-4">

				<div class="form-group">
					<i class="fas fa-user"></i> <label for="name" class="font-weight-bold pl-2">Name</label>
					<input type="text" class="form-control" name="rName" placeholder="Name" >	
				</div>

				<div class="form-group">
					<i class="fas fa-user"></i> <label for="email" class="font-weight-bold pl-2">Email</label>
					<input type="email" class="form-control" name="rEmail" placeholder="Email" >
					<small class="form-text">We'll never share your email with anyone else.</small>
				</div>

				<div class="form-group">
					<i class="fas fa-key"></i> <label for="pass" class="font-weight-bold pl-2">New Password</label>
					<input type="password" class="form-control" name="rPassword" placeholder="Password"  >	
				</div>
				<button type="submit" class="btn btn-danger btn-block mt-5 shadow-sm font-weight-bold" name="rsignup">Sign Up</button>
				<em style="font-size: 10px;">Note - By clicking Sign Up, you agree to our terms, data policy and cookie policy</em>
				<?php if(isset($message)) {echo $message;} ?>
				
			</form>
			
		</div>
		
	</div>
	
</div>