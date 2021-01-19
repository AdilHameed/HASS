<?php
include('../db_connect.php');
Define('Title', 'Requester');
Define('PAGE', 'requester');
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
  	$query = "DELETE  FROM requester WHERE r_id = {$_POST['id']}";
  	$res = mysqli_query($con, $query) or die(mysqli_error($con));
  	if($res== TRUE)
  	{
  			echo '<meta http-equiv="refresh" content="0:URL=?closed" />';
    		header('location:requester.php');
  	}
  	else{
  		echo 'Unable to delete';
  	}
  }

?>
  
  <div class="col-sm-9 col-md-10 mt-5 text-center">
  	<p class="bg-dark text-white p-2"> List of Requester</p>
  <?php
  $sql = "SELECT * FROM requester";
  $res = mysqli_query($con, $sql) or die(mysqli_error($con));
  if(mysqli_num_rows($res)>0)
  {
  	 echo '<table class="table">
  	         <thead>
  	         <tr>';
  	  echo  '<th scope="col">Requester ID</th>';
  	   echo  '<th scope="col">Name</th>';  
  	    echo  '<th scope="col">Email</th>';  
  	     echo  '<th scope="col">Action</th>';
  	     echo '</tr>
  	     </thead>
  	     <tbody>';         
  	while ($row = mysqli_fetch_assoc($res)) 
  	{
  	       echo '<tr>';
  	       echo '<td>'.$row["r_id"].'</td>';
  	        echo '<td>'.$row["r_name"].'</td>';
  	         echo '<td>'.$row["r_email"].'</td>';
  	          echo '<td>';
  	          echo '<form action="editreq.php" method="POST" class="d-inline">';
      echo '<input type="hidden" name="id" value='.$row["r_id"].'>';
      echo '<button type="submit" class="btn btn-info mr-3" name="edit">';
      echo '<i class="fas fa-pen"></i></button>';
      echo   '</form>';
       echo '<form action="" method="POST" class="d-inline">';
      echo '<input type="hidden" name="id" value='.$row["r_id"].'>';
      echo '<button type="submit" class="btn btn-secondary mr-3" name="delete">';
      echo '<i class="far fa-trash-alt"></i></button>';
      echo   '</form>';
  	          echo'</td>';
  	          echo '</tr>';
  	}
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
  		<a href="insertreq.php" class="btn btn-primary"><li class="fas fa-plus fa-2x"></li></label></a>
  	</div>
  </div>

 	<!-- javascript-->
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/popper.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/all.min.js"></script>

</body>
</html>


