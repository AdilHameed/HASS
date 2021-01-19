<?php
  include('../db_connect.php');
define('Title', 'Checkstatus');
define('PAGE', 'check');
 if(isset($_SESSION['islogin']))
 {
   $mail = $_SESSION['rEmail'];
 }
 else
 {
 	echo "<script> location.href='login.php'</script>";
 }
 include("include/header.php");
?>
  
  <div class="col-sm-6 mx-3 mt-5">
  	<form method="POST" class="form-inline d-print-none">
  		<div class="form-group  mr-3">
  			<label for=req_id class="mr-1">Enter Request ID: </label>
  			<input type="number" name="rid" class="form-control" required>
  			
  			
  		</div>
  		<button type="submit" class="btn btn-primary " name="sub">Search</button>
  	</form>


  <?php
  if(isset($_POST['sub']))
  {
  	$rid = $_POST['rid'];
  	$query = "SELECT * FROM assign_work WHERE r_id = '$rid'";
  	$res = mysqli_query($con, $query) or die(mysqli_error($con));
  	$row = mysqli_fetch_assoc($res);


  ?>
   <h3 class="text-center mt-5">Assigned Work Details</h3>
   <table class="table table-bordered">
   	<tbody>
   		<tr>
   			<td>Request ID</td>
   			<td><?php echo $row['r_id']; ?></td>
   		</tr>
   		<tr>
   			<td>Request Info</td>
   			<td><?php echo $row['r_info']; ?></td>
   		</tr>
   		<tr>
   			<td>Request Description</td>
   			<td><?php echo $row['r_desc']; ?></td>
   		</tr>
   		<tr>
   			<td>Name</td>
   			<td><?php echo $row['r_name']; ?></td>
   		</tr>
   		<tr>
   			<td>Address Line 1</td>
   			<td><?php echo $row['r_ad1']; ?></td>
   		</tr>
   		<tr>
   			<td>Address Line 2</td>
   			<td><?php echo $row['r_ad2']; ?></td>
   		</tr>
   		<tr>
   			<td>City</td>
   			<td><?php echo $row['r_city']; ?></td>
   		</tr>
   		<tr>
   			<td>State</td>
   			<td><?php echo $row['r_state']; ?></td>
   		</tr>
   		<tr>
   			<td>Zip</td>
   			<td><?php echo $row['r_zip']; ?></td>
   		</tr>
   		<tr>
   			<td>Email</td>
   			<td><?php echo $row['r_email']; ?></td>
   		</tr>
   		<tr>
   			<td>Mobile</td>
   			<td><?php echo $row['r_mobile']; ?></td>
   		</tr>
   		<tr>
   			<td>Technician Name</td>
   			<td><?php echo $row['tech_name']; ?></td>
   		</tr>
   		<tr>
   			<td>Date</td>
   			<td><?php echo $row['r_date']; ?></td>
   		</tr>
   		<tr>
   			<td>Customer Sign</td>
   			<td></td>
   		</tr>
   		<tr>
   			<td>Technician Sign</td>
   			<td></td>
   		</tr>
   	</tbody>
   	
   </table>
   <div class="text-center">
   	<form action="POST" class="mb-3 d-print-none">
   		<input type="submit" class=" btn btn-primary" name="" value="Print" onClick="window.print()"> 		
   	</form>
   	
   </div>
<?php } ?>
  </div>

<?php  include("include/footer.php"); ?>