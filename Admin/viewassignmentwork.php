<?php
include('../db_connect.php');
Define('Title', 'View Assignment');
Define('PAGE', 'workorder');
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


<div class="col-sm-6 mt-5 mx-3">
	<h3 class="text-center">Assigned Work Details</h3>
  <?php
  if(isset($_POST['view']))
  {
  	$rid = $_POST['id'];
  	$query = "SELECT * FROM assign_work WHERE r_id = '$rid'";
  	$res = mysqli_query($con, $query) or die(mysqli_error($con));
  	$row = mysqli_fetch_assoc($res);


  ?>
   
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
   	<form action="" class="mb-3 d-print-none d-inline">
   		<input type="submit" class=" btn btn-primary" name="" value="Print" onClick="window.print()"> 		
   	</form>
   		<form action="workorder.php" class="mb-3 d-print-none d-inline">       
   		<input type="submit" class=" btn btn-secondary" name="" value="Close"> 		
   	</form>
   	
   </div>
<?php } ?>
  </div>


<?php include('footer.php');?>