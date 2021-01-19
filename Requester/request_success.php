
<?php
 include("../db_connect.php");
define('Title', 'Success');
 
// include("include/header.php");

 if(isset($_SESSION['islogin']))
 {
   $mail = $_SESSION['rEmail'];
 }
 else
 {
 	echo "<script> location.href='login.php'</script>";
 }
 include('include/header.php');
?>


<?php
 $sql = "SELECT request_id,request_info,request_name,request_date FROM user_submit WHERE request_id = {$_SESSION['request_id']}";
  $res = mysqli_query($con, $sql);

  if(mysqli_num_rows($res) == 1)
  {
  	$row = mysqli_fetch_assoc($res);

  	echo "<div class='ml-5 mt-5'>
  	<table class='table'>
  	<tbody>
  	<tr>
  	<th>Request ID</th>
  	<td>".$row['request_id']."</td>
  	</tr>
  	<tr>
  	<th>Request Info</th>
  	<td>".$row['request_info']."</td>
  	</tr>
  	<tr>
  	<th>Requester Name</th>
  	<td>".$row['request_name']."</td>
  	</tr>
  	<tr>
  	<th>Request Date</th>
  	<td>".$row['request_date']."</td>
  	</tr>
  	<tr>
  	<td>
  	<form class='d-print-none'>
  	<input class='btn btn-primary' type='submit' value='Print' onClick='window.print()'>
  	</form>
  	</td>
  	</tr>
  	</tbody>
  	</table>
  	</div>";

  }
  	else
  	{
  		echo "Failed";
  	}
    ?>

  	<?php include('include/footer.php'); ?>
  	