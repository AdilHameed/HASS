<?php
 include("../db_connect.php");
define('Title', 'Submitrequest');
 define('PAGE', 'sreq');
 include("include/header.php");

 if(isset($_SESSION['islogin']))
 {
   $mail = $_SESSION['rEmail'];
 }
 else
 {
 	echo "<script> location.href='login.php'</script>";
 }

 if(isset($_POST["in_submit"]))
 {
 	$reqinfo = $_POST["in_request"];
 	$reqdesc = $_POST["in_desc"];
 	$name = $_POST["in_name"];
 	$add1 = $_POST["in_add1"];
 	$add2 = $_POST["in_add2"];
 	$city = $_POST["in_city"];
 	$State = $_POST["in_state"];
 	$zip = $_POST["in_zip"];
 	$mail = $_POST["in_email"];
 	$num = $_POST["in_mobile"];
 	$date = $_POST["in_date"];
 
    $query = "INSERT INTO user_submit (request_info,request_desc,request_name,request_add1,request_add2,request_city,request_state,request_zip,request_email,request_mobile,request_date)
         VALUES ('$reqinfo', '$reqdesc', '$name', '$add1', '$add2', '$city', '$State', '$zip', '$mail', '$num', '$date')";
         
         $qres  = mysqli_query($con,$query) or die(mysqli_error($con));
         if($res = TRUE)
         {
         	$_SESSION['request_id'] = mysqli_insert_id($con);
          echo "<script>window.alert('Submitted Successfully');</script>";
          echo "<script>location.href='request_success.php'</script>";
         }
         else
         {
         	echo  "<script>window.alert('Unable to submit your request');</script>";
         }
 }
?>
<!-- service request form start-->
<div class="col-sm-9 col-md-10 mt-4">
	<form method="POST" class="mx-5">

		<div class="form-group">
			<label for="inputrequest">Request Info</label>
			<input type="text" name="in_request" id="inputrequest" class="form-control" placeholder="Request Info" required>
		</div>

		<div class="form-group">
			<label for="inputdesc">Description</label>
			<input type="text" name="in_desc" id="inputdesc" class="form-control" placeholder="Write Description" required>
		</div>

		<div class="form-group">
			<label for="inputname">Name</label>
			<input type="text" name="in_name" id="inputname" class="form-control" placeholder="Rahul" required>
		</div>

		<div class="form-row">

			<div class="form-group col-md-6">
			<label for="add1">Address Line 1</label>
			<input type="text" name="in_add1" id="add1" class="form-control" placeholder="House No. 123" required>
		    </div>

		    <div class="form-group col-md-6">
			<label for="add2">Address Line 2</label>
			<input type="text" name="in_add2" id="add2" class="form-control" placeholder="Railway Colony" required>
		    </div>

		</div>

		<div class="form-row">
         
		    <div class="form-group col-md-6">
			<label for="incity">City</label>
			<input type="text" name="in_city" id="incity" class="form-control" required>
		    </div>

		    <div class="form-group col-md-4">
			<label for="instate">State</label>
			<input type="text" name="in_state" id="instate" class="form-control" required>
		    </div>

		    <div class="form-group col-md-2">
			<label for="inzip">zip</label>
			<input type="number" name="in_zip" id="inzip" class="form-control" pattern="[0-9]" onkeypress="isInputNumber(event)" required>
		    </div>

         </div>
         <div class="form-row">

		    <div class="form-group col-md-6">
			<label for="inemail">Email</label>
			<input type="email" name="in_email" id="inemail" class="form-control" required>
		    </div>

		    <div class="form-group col-md-2">
			<label for="inmobile">Mobile</label>
			<input type="tel" name="in_mobile" id="inmbile" pattern="[0-9]{10}" class="form-control" onkeypress="isInputNumber(event)" required>
		    </div>


		    <div class="form-group col-md-2.1">
			<label for="indate">Date</label>
			<input type="date" name="in_date" id="indate" class="form-control" required>
		    </div>
         	
         </div>
         <button type="submit" class="btn btn-primary" name="in_submit">Submit</button>
         <button type="reset" class="btn btn-secondary" name="in_reset">Reset</button>
         	
         </div>
			
		</div>
		
	</form>
	
</div> <!-- service request form end-->
<script>
	function isInputNumber(evt)
	{
		var ch = String.formCharCode(evt.which)
		if(!(/[0-9]/.test(ch)))
		{
			evt.preventDefault();
		}
	}
</script>

<?php  include("include/footer.php"); ?>