<?php
include('../db_connect.php');
Define('Title', 'Work Report');
Define('PAGE', 'wp');
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
		$sql = "SELECT * FROM assign_work WHERE r_date BETWEEN '$sd' AND '$ed'";
		$res = mysqli_query($con, $sql) or die(mysqli_error($con));

		if(mysqli_num_rows($res)>0)
		{
			 echo '<table class="table">
  	         <thead>
  	         <tr>';
  	  echo  '<th scope="col">Request ID</th>';
  	   echo  '<th scope="col">Request Info</th>'; 
  	   echo  '<th scope="col">Request Description</th>';  
  	   echo  '<th scope="col">Requester Name</th>'; 
  	    echo  '<th scope="col">Address</th>';  
  	     echo  '<th scope="col">City</th>'; 
  	      echo  '<th scope="col">State</th>'; 
  	       echo  '<th scope="col">Zip</th>';
  	        echo  '<th scope="col">Email</th>';
  	         echo  '<th scope="col">Mobile</th>';
  	         echo  '<th scope="col">Technician Name</th>';
  	     echo  '<th scope="col">Date</th>';
  	     echo '</tr>
  	     </thead>
  	     <tbody>';         
  	while ($row = mysqli_fetch_assoc($res)) 
  	{
  	       echo '<tr>';
  	       echo '<td>'.$row["r_id"].'</td>';
  	        echo '<td>'.$row["r_info"].'</td>';
  	         echo '<td>'.$row["r_desc"].'</td>';
  	          echo '<td>'.$row["r_name"].'</td>';
  	         echo '<td>'.$row["r_ad2"].'</td>';
  	            echo '<td>'.$row["r_city"].'</td>';
  	               echo '<td>'.$row["r_state"].'</td>';
  	                   echo '<td>'.$row["r_zip"].'</td>';
  	                       echo '<td>'.$row["r_email"].'</td>';
  	                           echo '<td>'.$row["r_mobile"].'</td>';
  	                           echo '<td>'.$row["tech_name"].'</td>';
  	               echo '<td>'.$row["r_date"].'</td>';
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