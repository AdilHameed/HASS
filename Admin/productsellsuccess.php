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
  $query = "SELECT * FROM customer_bill WHERE cust_id = {$_SESSION['id']}";
  $res = mysqli_query($con, $query) or die(mysqli_error($con));
  if(mysqli_num_rows($res)==1)
  {
  	$row = mysqli_fetch_assoc($res);
  	

   ?>
  	 <div ml-5 mt-5>
   <h3 class="text-center mt-5">Customer Bill</h3>
   <table class="table table-bordered">
   	<tbody>
   		<tr>
   			<td>Customer ID</td>
   			<td><?php echo $row['cust_id']; ?></td>
   		</tr>
   		<tr>
   			<td>Customer Name</td>
   			<td><?php echo $row['cust_name']; ?></td>
   		</tr>
   		<tr>
   			<td>Customer Address</td>
   			<td><?php echo $row['cust_add']; ?></td>
   		</tr>
   		<tr>
   			<td>Product Name</td>
   			<td><?php echo $row['pro_name']; ?></td>
   		</tr>
   		<tr>
   			<td>Quantity</td>
   			<td><?php echo $row['pro_quantity']; ?></td>
   		</tr>
   		<tr>
   			<td>Product Cost</td>
   			<td><?php echo $row['pro_cost']; ?></td>
   		</tr>
   		<tr>
   			<td>Total Cost</td>
   			<td><?php echo $row['total_cost']; ?></td>
   		</tr>
   		<tr>
   			<td>Date</td>
   			<td><?php echo $row['bill_date']; ?></td>
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
 <?php include('footer.php'); ?>