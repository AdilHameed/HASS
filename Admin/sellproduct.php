<?php
include('../db_connect.php');
Define('Title', 'Billing');
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
?>

  
  <div class="col-sm-6 mt-3 mx-5 jumbotron">

    <h3 class="text-center">Customer Bill</h3>
<?php
   if(isset($_REQUEST['bill']))
    {
    	$query = "SELECT * FROM assets WHERE p_id = {$_POST['id']}";
    	$res = mysqli_query($con, $query) ;
    	$row = mysqli_fetch_assoc($res) or die(mysqli_error($con));
    
}


  if(isset($_POST['psubmit']))
  {
     $i = $_POST['id_pro'];  	
     $cn = $_POST['c_name'];
     $cd = $_POST['c_add'];
     $pn = $_POST['p_name'];
     $a = $_POST['p_av'] - $_POST['p_quan'];
      $pq = $_POST['p_quan'];
       $pp = $_POST['p_p'];
       $s = $_POST['p_p'] *  $_POST['p_quan'];
       $_POST['t_cost'] = $s ;
       $tc = $_POST['t_cost'];
       $sd = $_POST['sell_date'];
     $query ="UPDATE assets SET  p_avail='$a' WHERE p_id = '$i'";
     $res = mysqli_query($con, $query) or die(mysqli_error($con));
     $query1 = "INSERT INTO customer_bill (cust_name, cust_add, pro_name, pro_quantity, pro_cost, total_cost, bill_date) VALUES ('$cn', '$cd', '$pn', '$pq', '$pp', '$tc', '$sd')";

      $res1 = mysqli_query($con, $query1) or die(mysqli_error($con));
      if($res1 == TRUE)
     {
     	 echo "<script>window.alert('Updated Successfully');</script>";
     	 $_SESSION['id'] = mysqli_insert_id($con);
     	  echo "<script>location.href='productsellsuccess.php';</script>";
         
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
			<label for="inputrequest">Customer Name</label>
			<input type="text" name="c_name" id="inputrequest" class="form-control"  required>
		</div>

		<div class="form-group">
			<label for="inputrequest">Customer Address</label>
			<input type="text" name="c_add" id="inputrequest" class="form-control" required>
		</div>

		<div class="form-group">
			<label for="inputrequest">Product Name</label>
			<input type="text" name="p_name" id="inputrequest" class="form-control" value="<?php if(isset($row['p_name'])){ echo $row['p_name'];}?>" required>
		</div>

    <div class="form-group">
      <label for="inputrequest">Available</label>
      <input type="number" name="p_av" id="inputrequest" class="form-control" value="<?php if(isset($row['p_avail'])){ echo $row['p_avail'];}?>" required>
    </div>

		<div class="form-group">
			<label for="inputdesc">Quantity</label>
			<input type="number" name="p_quan" id="inputdesc" class="form-control"  required>
		</div>
   
    <div class="form-group">
      <label for="inputdesc">Product Price</label>
      <input type="number" name="p_p" id="inputdesc" class="form-control" value="<?php if(isset($row['p_sp'])) {echo $row['p_sp'];}?>" required>
    </div>
    <div class="form-group">
      <label for="inputdesc">Total Price</label>
      <input type="number" name="t_cost" id="inputdesc" class="form-control"  >
    </div>

    <div class="form-group col-md-4">
      <label for="inputdesc">Date</label>
      <input type="date" name="sell_date" id="inputdesc" class="form-control" required>
    </div>
		<div class="text-center">
			<button type="submit" class="btn btn-primary" name="psubmit">Submit</button>
			<a href="assets.php" class="btn btn-secondary">Close</a>
		</div>
    	
    </form>	

  </div>


 <?php include('footer.php');?>