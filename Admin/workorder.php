<?php
include('../db_connect.php');
Define('Title', 'Work Order');
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

<div class="col-sm-9 col-md-10 mt-5">
	<?php
 $query = "SELECT * FROM assign_work";
 $res = mysqli_query($con, $query) or die(mysqli_error($con));
 if(mysqli_num_rows($res)>0)
 {
 	echo '<table class="table">';
 	echo '<thead>';
 	echo '<tr>';
 	echo '<th scope="col">Req ID</th>';
 	echo '<th scope="col">Req Info</th>';
 	echo '<th scope="col">Name</th>';
 	echo '<th scope="col">Address</th>';
 	echo '<th scope="col">City</th>';
 	echo '<th scope="col">Mobile</th>';
 	echo '<th scope="col">Technician</th>';
 	echo '<th scope="col">Assign Date</th>';
 	echo '<th scope="col">Action</th>';
 	echo '</tr>';
 	echo '</thead>';
 	echo '<tbody>';
 	$count=0;
 	while($row = mysqli_fetch_assoc($res))
 	{
 		echo '<tr>';
 		echo '<td>'.$row["r_id"].'</td>';
 		echo '<td>'.$row["r_info"].'</td>';
 		echo '<td>'.$row["r_name"].'</td>';
 		echo '<td>'.$row["r_ad2"].'</td>';
 		echo '<td>'.$row["r_city"].'</td>';
 		echo '<td>'.$row["r_mobile"].'</td>';
 		echo '<td>'.$row["tech_name"].'</td>';
 		echo '<td>'.$row["r_date"].'</td>';
 		echo '<td>';

 		echo '<form action="viewassignmentwork.php"  method="POST" class="d-inline mr-1">';
 		echo '<input type="hidden" name="id" value='.$row["r_id"].'><button class="btn btn-primary" name="view" value="View" type="submit"><i class="far fa-eye"></i></button>';
 		echo '</form>';

 		echo '<form action="" method="POST" class="d-inline" >';
 		echo '<input type="hidden" name="id" value='.$row["r_id"].'><button class="btn btn-secondary" name="delete" value="Delete" type="submit"><i class="far fa-trash-alt"></i></button>';
 		echo '</form>';

 		echo '</tr>';
 		$count++;
 	}
 	echo ' </tbody>
 	</table>';	
 	$_SESSION['ass'] = $count;
 }
 else
 {
 	echo '0 Result';
 }
 ?>
</div>
<?php
if(isset($_POST['delete']))
{
	$query = "DELETE FROM assign_work WHERE r_id = {$_POST['id']}";
	$res = mysqli_query($con, $query) or die(mysqli_error($con));
	if($res == TRUE)
	{
		echo '<meta http-equiv="refresh" content="0:URL=?closed" />';
    		header('location:workorder.php');
    	}
	else
	{
		echo 'Unable to delete';
	}
}
?>


<?php include('footer.php');?>