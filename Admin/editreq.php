
<?php  
include('../db_connect.php');
Define('Title', 'Requester Edit');
Define('PAGE', 'requester');
 if(isset($_SESSION['isadlogin']))
 {
  $adEmail = $_SESSION['aEmail'];  
 }
 else
 {
  header('location:login.php');  
 }
include('header.php');
?>

  
  <div class="col-sm-6 mt-5 mx-3 jumbotron">

    <h3 class="text-center">Update Requester Details</h3>
<?php
   if(isset($_REQUEST['edit']))
    {
    	$query = "SELECT * FROM requester WHERE r_id = {$_POST['id']}";
    	$res = mysqli_query($con, $query) ;
    	$row = mysqli_fetch_assoc($res) or die(mysqli_error($con));
    
}


  if(isset($_POST['requpdate']))
  {
     $i = $_POST['id_request'];  	
     $n = $_POST['in_name'];
     $e = $_POST['in_email'];
     $query ="UPDATE requester SET r_name = '$n', r_email = '$e' WHERE r_id = '$i'";
     $res = mysqli_query($con, $query) or die(mysqli_error($con));
     if($res == TRUE)
     {
     	 echo "<script>window.alert('Updated Successfully');</script>";
         
     }	
     else
     {
     	echo "<script>window.alert('Unable to update');</script>";
     }
  } 
  
 
   
  ?>

    <form method="POST">
    	  <div class="form-group">
			<label for="requestid">Requester ID</label>
			<input type="number" name="id_request" id="requestid" class="form-control" value="<?php if(isset($row['r_id'])){ echo $row['r_id'];}?>" readonly required>
		</div> 

		<div class="form-group">
			<label for="inputrequest">Requester Name</label>
			<input type="text" name="in_name" id="inputrequest" class="form-control" value="<?php if(isset($row['r_name'])){ echo $row['r_name'];}?>" required>
		</div>

		<div class="form-group">
			<label for="inputdesc">Email</label>
			<input type="email" name="in_email" id="inputdesc" class="form-control" value="<?php if(isset($row['r_email'])) {echo $row['r_email'];}?>" required>
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-primary" name="requpdate">Update</button>
			<a href="Requester.php" class="btn btn-secondary">Close</a>
		</div>
    	
    </form>	

  </div>



<?php include('footer.php');?>