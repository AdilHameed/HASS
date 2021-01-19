<?php
 include ('../db_connect.php');
 if(isset($_SESSION['isadlogin']))
 {
 	header('location:dashboard.php');
 }

  if(isset($_POST['rEmail']))
  {
  	$mail = $_POST['rEmail'];
  	$pass = $_POST['rPassword'];
  $check = "SELECT ad_id FROM admin WHERE ad_email = '$mail'";
//$check = "SELECT r_email FROM requester WHERE r_email = '$mail'";
$query_result = mysqli_query($con, $check) or die(mysqli_error($con));

  	if(mysqli_num_rows($query_result) == 0)
  	{
  		 $message = "<div class='alert alert-warning ' role='alert'> Invalid email!</div>";
  	 
  	
  	}
  	else
  	{
  		  $query = "SELECT ad_id FROM admin WHERE ad_email ='$mail' AND ad_password = '$pass'";
  		$qresult = mysqli_query($con, $query) or die(mysqli_error($con));

  		if(mysqli_num_rows($qresult)== 0)
  		{
  			
  		$message = '<div class="alert alert-warning" role="alert">Your password is incorrect!</div>';
  		}
  		
  		else
  		 {
  		// 	$_SESSION['r_email'] = 'r_email';
  		// 	$_SESSION['id']  = 'r_id';
             $_SESSION['isadlogin'] = TRUE;
             $_SESSION['aEmail'] = $mail;
  			header("location:dashboard.php");
     	}
   }
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width", initial-scale="1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Bootstrap CSS linked-->
	<link rel="stylesheet" href="../css/bootstrap.min.css">

	<!-- Font Awesome Css-->
	<link rel="stylesheet" href="../css/all.min.css">

    <!-- Googlefont-->
    <!--<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet"-->

	<!-- custom css-->
	<link rel="stylesheet" href="../css/custom.css">
	<title>Login</title>
</head>

    <body>
    	<div class="mt-5 text-center" style="font-size: 30px">
    		<i class="fas fa-stethoscope"></i>
    		<span>Home Appliance Service Solution</span>
    	</div>

    	<p class="mt-5 text-center" style="font-size: 20px"><i class="fas fa-user text-primary"></i> Admin Login</p>

    	<div class="container-fluid">
    		<div class="row justify-content-center">
    			<div class="col-sm-6 col-md-4">
    				<form action="" method="POST" class="shadow-lg p-3">
    					<div class="form-group ">
    					    <i class="fas fa-user text-primary"></i><label for="email" class="pl-2 font-weight-bold">Email</label>
    					    <input type="email" name="rEmail" class="form-control" placeholder="Email">
    					   <!-- <small class="form-text">We'll never share your email with anyone else</small>-->
    					</div>
    					<div class="form-group">
    						<i class="fas fa-key text-primary"></i><label for="password" class="pl-2 font-weight-bold">Password</label>
    						<input type="password" name="rPassword" class="form-control" placeholder="Password">
    					</div>
                         <button class="btn btn-outline-primary btn-block mt-3 font-weight-bold" type="submit"  name="rLogin">Login</button>
    					
    					<?php if(isset($message)){ echo $message;}?>
    				</form>
    				
    			</div>
    			
    		</div>
    		
    	</div>

    	<!-- javascript-->
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/popper.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/all.min.js"></script>

    </body>

 </html>