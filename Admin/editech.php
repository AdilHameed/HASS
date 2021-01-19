
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

    <h3 class="text-center">Update Technician Details</h3>
<?php
   if(isset($_REQUEST['edit']))
    {
    	$query = "SELECT * FROM technician WHERE emp_id = {$_POST['id']}";
    	$res = mysqli_query($con, $query) ;
    	$row = mysqli_fetch_assoc($res) or die(mysqli_error($con));
    
}


  if(isset($_POST['techupdate']))
  {
     $i = $_POST['id_tech'];  	
     $n = $_POST['in_name'];
     $c = $_POST['in_city'];
     $m = $_POST['in_mob'];
     $e = $_POST['in_email'];
     $query ="UPDATE Technician SET tech_name = '$n', tech_city='$c', tech_mob='$m', tech_email = '$e' WHERE emp_id = '$i'";
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
			<label for="requestid">Employment ID</label>
			<input type="number" name="id_tech" id="requestid" class="form-control" value="<?php if(isset($row['emp_id'])){ echo $row['emp_id'];}?>" readonly required>
		</div> 

		<div class="form-group">
			<label for="inputrequest">Technician Name</label>
			<input type="text" name="in_name" id="inputrequest" class="form-control" value="<?php if(isset($row['tech_name'])){ echo $row['tech_name'];}?>" required>
		</div>
    <div class="form-group">
      <label for="inputrequest">City</label>
      <input type="text" name="in_city" id="inputrequest" class="form-control" value="<?php if(isset($row['tech_city'])){ echo $row['tech_city'];}?>" required>
    </div>
    <div class="form-group">
      <label for="inputrequest">Mobile</label>
      <input type="text" name="in_mob" id="inputrequest" class="form-control" value="<?php if(isset($row['tech_mob'])){ echo $row['tech_mob'];}?>" required>
    </div>

		<div class="form-group">
			<label for="inputdesc">Email</label>
			<input type="email" name="in_email" id="inputdesc" class="form-control" value="<?php if(isset($row['tech_email'])) {echo $row['tech_email'];}?>" required>
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-primary" name="techupdate">Update</button>
			<a href="technician.php" class="btn btn-secondary">Close</a>
		</div>
    	
    </form>	

  </div>



<?php include('footer.php');?>