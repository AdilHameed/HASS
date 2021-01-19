 <?php

include('../db_connect.php');
//Define('Title', 'Requests');
//Define('PAGE', 'requests');
 if(isset($_SESSION['isadlogin']))
 {
  $adEmail = $_SESSION['aEmail'];  
 }
 else
 {
  header('location:login.php');  
 }

    if(isset($_REQUEST['view']))
    {
    	$query = "SELECT * FROM user_submit WHERE request_id = {$_POST['id']}";
    	$res = mysqli_query($con, $query);
    	$row = mysqli_fetch_assoc($res) or die(mysqli_error($con));
    }
    if(isset($_REQUEST['close']))
    {
    	$query = "DELETE  FROM user_submit WHERE request_id = {$_POST['id']}";
    	$res = mysqli_query($con, $query) or die(mysqli_error($con));
    	if($res == TRUE)
    	{
    		echo '<meta http-equiv="refresh" content="0:URL=?closed" />';
    		header('location:requests.php');
    	}
    	else
    	{
    		echo 'Unable to delete';
    	}
    }
    if(isset($_POST['assign']))
    {
    	$id = $_POST['id_request'];
    	$info = $_POST['in_request'];
        $desc  = $_POST['in_desc'];
        $name = $_POST['in_name'];
        $ad1 = $_POST['in_add1'];
        $ad2 = $_POST['in_add2'];
        $city = $_POST['in_city'];
        $State = $_POST['in_state'];
        $zip = $_POST['in_zip'];
        $mail = $_POST['in_email'];
        $Mobile = $_POST['in_mobile'];
        $tech = $_POST['in_tech'];
        $date = $_POST['in_date'];

       $query = "INSERT INTO assign_work (r_id, r_info, r_desc, r_name, r_ad1, r_ad2, r_city, r_state, r_zip, r_email, r_mobile, tech_name, r_date) VALUES
       ('$id', '$info', '$desc', '$name', '$ad1', '$ad2', '$city', '$State', '$zip', '$mail', '$Mobile', '$tech', '$date')";
       $res = mysqli_query($con, $query) or die(mysqli_error($con));
       if($res== TRUE)
       {
       	echo '<script>window.alert("Assigned work successfully")</script>';
       }
       else{
       	echo '<script>window.alert("Unable to assign work")</script>';
       }
    }
  ?>

<div class="col-sm-5 mt-3  jumbotron">
	
	<form method="POST" class="mx-5">
       <h5 class="text-center">Assign Work Order Request</h5>

        <div class="form-group">
			<label for="requestid">Request ID</label>
			<input type="number" name="id_request" id="requestid" class="form-control" value="<?php echo $row['request_id'];?>" readonly required>
		</div> 

		<div class="form-group">
			<label for="inputrequest">Request Info</label>
			<input type="text" name="in_request" id="inputrequest" class="form-control" value="<?php echo $row['request_info'];?>" required>
		</div>

		<div class="form-group">
			<label for="inputdesc">Description</label>
			<input type="text" name="in_desc" id="inputdesc" class="form-control" value="<?php echo $row['request_desc'];?>" required>
		</div>

		<div class="form-group">
			<label for="inputname">Name</label>
			<input type="text" name="in_name" id="inputname" class="form-control" value="<?php echo $row['request_name'];?>" required>
		</div>

		<div class="form-row">

			<div class="form-group col-md-6">
			<label for="add1">Address Line 1</label>
			<input type="text" name="in_add1" id="add1" class="form-control" value="<?php echo $row['request_add1'];?>" required>
		    </div>

		    <div class="form-group col-md-6">
			<label for="add2">Address Line 2</label>
			<input type="text" name="in_add2" id="add2" class="form-control" value="<?php echo $row['request_add2'];?>" required>
		    </div>

		</div>

		<div class="form-row">
         
		    <div class="form-group col-md-4">
			<label for="incity">City</label>
			<input type="text" name="in_city" id="incity" class="form-control" value="<?php echo $row['request_city'];?>" required>
		    </div>

		    <div class="form-group col-md-4">
			<label for="instate">State</label>
			<input type="text" name="in_state" id="instate" class="form-control" value="<?php echo $row['request_state'];?>" required>
		    </div>

		    <div class="form-group col-md-4">
			<label for="inzip">zip</label>
			<input type="number" name="in_zip" id="inzip" class="form-control" pattern="[0-9]" value="<?php echo $row['request_zip'];?>" onkeypress="isInputNumber(event)" required>
		    </div>

         </div>

         <div class="form-row">

		    <div class="form-group col-md-8">
			<label for="inemail">Email</label>
			<input type="email" name="in_email" id="inemail" class="form-control" value="<?php echo $row['request_email'];?>" required>
		    </div>

		    <div class="form-group col-md-4">
			<label for="inmobile">Mobile</label>
			<input type="tel" name="in_mobile" id="inmbile" pattern="[0-9]{10}" class="form-control" value="<?php echo $row['request_mobile'];?>" onkeypress="isInputNumber(event)" required>
		    </div>
         	
         </div>

         <div class="form-row">

		    <div class="form-group col-md-6">
			<label for="assigntech">Assign to Technician</label>
			<input type="text" name="in_tech" id="assigntech" class="form-control" required>
		    </div>
		    <div class="form-group col-md-6">
			<label for="indate">Date</label>
			<input type="date" name="in_date" id="indate" class="form-control" value="<?php echo $row['request_date'];?>" required>
		    </div>
         	
         </div>
         
         <div class="float-right">
         <button type="submit" class="btn btn-success" name="assign">Assign</button>
         <button type="reset" class="btn btn-secondary" name="in_reset">Reset</button>
         	
         </div>
		</div>	

		</div>
		
	</form>
	
</div> <!-- service request form end-->