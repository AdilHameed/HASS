<?php
include('../db_connect.php');
Define('Title', 'Technician');
Define('PAGE', 'tech');
include('header.php');
if(isset($_SESSION['isadlogin']))
 {
  $adEmail = $_SESSION['aEmail'];  
 }
 else
 {
  header('location:login.php');  
 }
if(isset($_POST['delete']))
  {
  	$query = "DELETE  FROM technician WHERE emp_id = {$_POST['id']}";
  	$res = mysqli_query($con, $query) or die(mysqli_error($con));
  	if($res== TRUE)
  	{
  			echo '<meta http-equiv="refresh" content="0:URL=?closed" />';
    		header('location:technician.php');
  	}
  	else{
  		echo 'Unable to delete';
  	}
  }

?>
  
  <div class="col-sm-9 col-md-10 mt-5 text-center">
  	<p class="bg-dark text-white p-2"> List of Technician</p>
  <?php
  $sql = "SELECT * FROM technician";
  $res = mysqli_query($con, $sql) or die(mysql_error($con));
  if(mysqli_num_rows($res)>0)
  {
  	 echo '<table class="table">
  	         <thead>
  	         <tr>';
  	  echo  '<th scope="col">Employment ID</th>';
  	   echo  '<th scope="col">Name</th>'; 
  	   echo  '<th scope="col">City</th>';  
  	   echo  '<th scope="col">Mobile</th>'; 
  	    echo  '<th scope="col">Email</th>';  
  	     echo  '<th scope="col">Action</th>';
  	     echo '</tr>
  	     </thead>
  	     <tbody>';   
         $count = 0;      
  	while ($row = mysqli_fetch_assoc($res)) 
  	{
  	       echo '<tr>';
  	       echo '<td>'.$row["emp_id"].'</td>';
  	        echo '<td>'.$row["tech_name"].'</td>';
  	         echo '<td>'.$row["tech_city"].'</td>';
  	          echo '<td>'.$row["tech_mob"].'</td>';
  	         echo '<td>'.$row["tech_email"].'</td>';
  	          echo '<td>';
  	          echo '<form action="editech.php" method="POST" class="d-inline">';
      echo '<input type="hidden" name="id" value='.$row["emp_id"].'>';
      echo '<button type="submit" class="btn btn-info mr-3" name="edit">';
      echo '<i class="fas fa-pen"></i></button>';
      echo   '</form>';
       echo '<form action="" method="POST" class="d-inline">';
      echo '<input type="hidden" name="id" value='.$row["emp_id"].'>';
      echo '<button type="submit" class="btn btn-secondary mr-3" name="delete">';
      echo '<i class="far fa-trash-alt"></i></button>';
      echo   '</form>';
  	          echo'</td>';
  	           echo '</tr>';
               $count++;
  	}
    $_SESSION['tech'] = $count;
  	echo '</tbody> </table>';
    
  	
  }
  else
  {
  	echo '0 Result';
  }
  ?> 
</div>

	</div>
  	<div class="float-right mb-2">
  		<a href="insertech.php" class="btn btn-primary"><li class="fas fa-plus fa-2x"></li></label></a>
  	</div>
  </div>

 	<!-- javascript-->
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/popper.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/all.min.js"></script>

</body>
</html>


