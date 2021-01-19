<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width", initial-scale="1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Bootstrap CSS linked-->
	<link rel="stylesheet" href="../css/bootstrap.min.css">

	<!-- Font Awesome Css-->
	<link rel="stylesheet" href="../css/all.min.css">

    <!-- Googlefont-->
    <!--<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet"-->

	<!-- custom css-->
	<link rel="stylesheet" href="../custom.css">

	<title><?php echo Title ?></title>

</head>

<body>
     <nav class="navbar navbar-dark theme-bg-color fixed-top flex-md-nowrap p-0 shadow">
     	<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="userprofile.php">Home Appliance Service Solution</a>
     </nav>

     <!-- sidebar-->
  <div class="container-fluid" style="margin-top: 40px;">
  	<div class="row">
  		<nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
  			<div class="sidebar-sticky">
  				<ul class="nav nav-pills nav-fill">
  					<li class="nav-item"><a class="nav-link <?php if(PAGE == 'profile') {echo 'active'; }?>" href="userprofile.php"><i class="fas fa-user mr-1"></i>Profile</a></li>
  					<li class="nav-item"><a class="nav-link <?php if(PAGE == 'sreq') {echo 'active'; }?>" href="submitrequest.php" ><i class="fab fa-accessible-icon mr-1"></i>Submit Request</a></li>
  					<li class="nav-item"><a class="nav-link <?php if(PAGE == 'check') {echo 'active'; }?>" href="checkstatus.php"><i class="fas fa-align center mr-1"></i>Check Status</a></li>
  					<li class="nav-item"><a class="nav-link <?php if(PAGE == 'change') {echo 'active'; }?>" href="changepassword.php"><i class="fas fa-key mr-1"></i>Change Password</a></li>
  					<li class="nav-item"><a class="nav-link <?php if(PAGE == 'lt') {echo 'active'; }?>" href="../logout.php"><i class="fas fa-sign-out-alt mr-1"></i>Logout</a></li>
  				</ul>
  				
  			</div>
  		</nav>  <!-- end side-->
  