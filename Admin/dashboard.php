<?php
include('../db_connect.php');
 if(isset($_SESSION['isadlogin']))
 {

  $adEmail = $_SESSION['aEmail'];
   $c = $_SESSION['req']; 
   $a = $_SESSION['ass'];
  // $t = $_SESSION['tech'];
 }
 else
 {
  header('location:login.php');  
 }
Define('Title', 'Dashboard');
Define('PAGE', 'dashboard');
include('header.php');
$q = "SELECT count(emp_id) FROM technician";
$res =mysqli_query($con, $q);
$row = mysqli_fetch_array($res);
$count = $row[0];
?>

<div class="col-sm-9 col-md-10">
	<div class="row text-center mx-5">

	  <div class="col-sm-4 mt-5">
        <div class="card text-white bg-danger mb-3" style="max-width:18rem;">
        	<div class="card-header">Requests Received</div>
        	<div class="card-body">
        		<h4 class="card-title"><?php echo $c;?></h4>
        		<a class="btn text-white" href="Requests.php">View</a>
        	</div>        	
        </div>
	  </div>

	  <div class="col-sm-4 mt-5">
        <div class="card text-white bg-success mb-3" style="max-width:18rem;">
        	<div class="card-header">Assigned Work</div>
        	<div class="card-body">
        		<h4 class="card-title"><?php echo $a;?></h4>
        		<a class="btn text-white" href="workorder.php">View</a>
        	</div>        	
        </div>
	  </div>

	  <div class="col-sm-4 mt-5">
        <div class="card text-white bg-primary mb-3" style="max-width:18rem;">
        	<div class="card-header">No. of Technician</div>
        	<div class="card-body">
        		<h4 class="card-title"><?php echo $count;?></h4>
        		<a class="btn text-white" href="technician.php">View</a>
        	</div>        	
        </div>
	  </div>

	</div>

      <div class="mx-5 mt-5 text-center">
      	<p class="bg-dark text-white p-2">List of Requesters</p>
      	<?php
         $query = "SELECT r_id,r_name,r_email FROM Requester";
         $res = mysqli_query($con, $query);
        if(mysqli_num_rows($res)>0)
       { 	
         echo '<table class="table">
         <thead>
         <tr>
         <th scope="col">Requester ID</th>
         <th scope="col">Name</th>
         <th scope="col">Email</th>
         </tr>
         </thead>
         <tbody>';
         while($row = mysqli_fetch_assoc($res))
         {
         	
         	echo '<tr>';
         	  echo '<td>'.$row["r_id"].'</td>';
         	  echo '<td>'.$row["r_name"].'</td>';
         	  echo '<td>'.$row["r_email"].'</td>';
         	 echo '</tr>';
         	
         }
         echo '</tbody>

         </table>';
     }else
     {
     	echo '0 Result';
     }
      	?>
      	
      </div>

</div>

<?php
include('footer.php');
?>