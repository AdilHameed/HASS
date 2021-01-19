<?php
include("../db_connect.php");
define('Title', 'Userprofile');
define('PAGE', 'profile');
 include("include/header.php");


if(isset($_SESSION['islogin']))
{
	$rEmail = $_SESSION['rEmail'];
}
else
{
	echo "<script>location.href='login.php'</script>";
}
 
 $query = "SELECT r_name FROM requester WHERE r_email = '$rEmail'";
 $qres = mysqli_query($con,$query);
 if(mysqli_num_rows($qres))
 {
 $row = mysqli_fetch_assoc($qres);
 $rName = $row['r_name'];
}

if(isset($_POST['nameupdate']))
{
	if($_POST['rName'] == "")
	{
		$message = '<div class=" alert alert-warning" role="alert">Please fill the above field</div>';
	}
	else
	{
		$rename = $_POST['rName'];
		$query = "UPDATE requester SET r_name='$rename' WHERE r_email='$rEmail'";

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
  					<label for="rName">Rename</label>
  					<input type="text" name="rName" class="form-control" id="rName" value="<?php echo $rName ?>">

  					<button type="submit" class="btn btn-danger mt-3" name="nameupdate">Update</button>
  					<?php if(isset($message)){echo $message;}?>
  				</div>
  				
  			</form>
  			
  		</div>
  <?php  include("include/footer.php"); ?>