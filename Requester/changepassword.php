<?php

define('Title', 'Changepassword');
define('PAGE', 'change');
 include("include/header.php");
 include("../db_connect.php");
 if(isset($_SESSION['islogin']))
{
	$rEmail = $_SESSION['rEmail'];
}
else
{
	echo "<script>location.href='login.php'</script>";
}

$query = "SELECT r_password FROM requester WHERE r_email = '$rEmail'";
$res = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($res);

if(isset($_POST['passwordupdate']))
{
	if($_POST['rPassword'] == $row['r_password'])
	{
		$message = '<div class=" alert alert-warning" role="alert">Matching the old password!</div>';
	}
	else
	{
		$uppassword = md5($_POST['rPassword']);
		$query = "UPDATE requester SET r_password='$uppassword' WHERE r_email='$rEmail'";

		if(mysqli_query($con, $query)== TRUE)
		{
			$message = '<div class=" alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
		}
		else
		{
		   $message = '<div class=" alert alert-success col-sm-6 ml-5 mt-2" role="alert">Unable to update</div>';	
		}
	}
}
?>
<div class="col-sm-6 mt-5">
  			<form action="" method="POST" class="mx-5">
  				<div class="form-group">
  					<label for="rEmail">Email</label>
  					<input type="email" name="rEmail" class="form-control" id="rEmail" value="<?php echo $rEmail ?>" readonly>
  				</div>
  				<div class="form-group">
  					<label for="rPassword">New Password</label>
  					<input type="password" name="rPassword" class="form-control" id="rPassword" required>

  					<button type="submit" class="btn btn-danger mt-3" name="passwordupdate">Update</button>
  					<?php if(isset($message)){echo $message;}?>
  				</div>
  				
  			</form>
  			</div>


<?php  include("include/footer.php"); ?>