
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

    <h3 class="text-center">Update Product Details</h3>
<?php
   if(isset($_REQUEST['edit']))
    {
    	$query = "SELECT * FROM assets WHERE p_id = {$_POST['id']}";
    	$res = mysqli_query($con, $query) ;
    	$row = mysqli_fetch_assoc($res) or die(mysqli_error($con));
    
}


  if(isset($_POST['pupdate']))
  {
     $i = $_POST['id_pro'];  	
     $n = $_POST['p_name'];
     $d = $_POST['p_dop'];
     $a = $_POST['p_av'];
     $t = $_POST['p_to'];
      $c = $_POST['p_cp'];
       $s = $_POST['p_sp'];
     $query ="UPDATE assets SET p_name = '$n', p_dop='$d', p_avail='$a', p_total = '$t', p_cp = '$c', p_sp='$s' WHERE p_id = '$i'";
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
			<label for="requestid">Product ID</label>
			<input type="number" name="id_pro" id="requestid" class="form-control" value="<?php if(isset($row['p_id'])){ echo $row['p_id'];}?>" readonly required>
		</div> 

		<div class="form-group">
			<label for="inputrequest">Product Name</label>
			<input type="text" name="p_name" id="inputrequest" class="form-control" value="<?php if(isset($row['p_name'])){ echo $row['p_name'];}?>" required>
		</div>
    <div class="form-group">
      <label for="inputrequest">DOP</label>
      <input type="date" name="p_dop" id="inputrequest" class="form-control" value="<?php if(isset($row['p_dop'])){ echo $row['p_dop'];}?>" required>
    </div>
    <div class="form-group">
      <label for="inputrequest">Available</label>
      <input type="number" name="p_av" id="inputrequest" class="form-control" value="<?php if(isset($row['p_avail'])){ echo $row['p_avail'];}?>" required>
    </div>

		<div class="form-group">
			<label for="inputdesc">Total</label>
			<input type="number" name="p_to" id="inputdesc" class="form-control" value="<?php if(isset($row['p_total'])) {echo $row['p_total'];}?>" required>
		</div>
    <div class="form-group">
      <label for="inputdesc">Cost Price</label>
      <input type="number" name="p_cp" id="inputdesc" class="form-control" value="<?php if(isset($row['p_cp'])) {echo $row['p_cp'];}?>" required>
    </div>
    <div class="form-group">
      <label for="inputdesc">Selling Price</label>
      <input type="number" name="p_sp" id="inputdesc" class="form-control" value="<?php if(isset($row['p_sp'])) {echo $row['p_sp'];}?>" required>
    </div>
		<div class="text-center">
			<button type="submit" class="btn btn-primary" name="pupdate">Update</button>
			<a href="assets.php" class="btn btn-secondary">Close</a>
		</div>
    	
    </form>	

  </div>



<?php include('footer.php');?>