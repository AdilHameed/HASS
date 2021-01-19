<?php
include('../db_connect.php');
Define('Title', 'Sell Report');
Define('PAGE', 'sp');
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

<div class="col-sm-9 col-md-10 mt-5 text-center">
	<form method="POST" class="d-print-none">
		<div class="form-row">
			<div class="form-group col-md-2.1">
				<input type="date" name="start_date" class="form-control">
			</div>
			<span>to</span>
			<div class="form-group col-md-2.1">
				<input type="date" name="end_date" class="form-control">
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
			</div>
		</div>
	</form>
	<?php
	if(isset($_POST['searchsubmit']))
	{
		$sd = $_POST['start_date'];
		$ed = $_POST['end_date'];
		$sql = "SELECT * FROM customer_bill WHERE bill_date BETWEEN '$sd' AND '$ed'";
		$res = mysqli_query($con, $sql);

		if(mysqli_num_rows($res)>0)
		{
			 echo '<table class="table">
  	         <thead>
  	         <tr>';
  	  echo  '<th scope="col">Customer ID</th>';
  	   echo  '<th scope="col">Customer Name</th>'; 
  	   echo  '<th scope="col">Address</th>';  
  	   echo  '<th scope="col">Product Name</th>'; 
  	    echo  '<th scope="col">Quantity</th>';  
  	     echo  '<th scope="col">Product Cost</th>'; 
  	      echo  '<th scope="col">Total</th>'; 
  	     echo  '<th scope="col">Date</th>';
  	     echo '</tr>
  	     </thead>
  	     <tbody>';         
  	while ($row = mysqli_fetch_assoc($res)) 
  	{
  	       echo '<tr>';
  	       echo '<td>'.$row["cust_id"].'</td>';
  	        echo '<td>'.$row["cust_name"].'</td>';
  	         echo '<td>'.$row["cust_add"].'</td>';
  	          echo '<td>'.$row["pro_name"].'</td>';
  	         echo '<td>'.$row["pro_quantity"].'</td>';
  	            echo '<td>'.$row["pro_cost"].'</td>';
  	               echo '<td>'.$row["total_cost"].'</td>';
  	               echo '<td>'.$row["bill_date"].'</td>';
  	               echo '</tr>';
		}
		echo '<tr>
		      <td>';
		echo '<input type="submit" class="btn btn-primary text-center d-print-none" value="Print" onClick="window.print()">';
		echo '</td>
		         </tr>';      
		echo '</tbody>
		          </table>';
	}
	else
	{
		echo 'No record found!';
	}
}
	?>
</div>



<?php include('footer.php');?>