<?php
include('db_connect.php');
if(isset($_SESSION['islogin']))
{
  echo "<script>location.href='Requester/userprofile.php'</script>";
}
if(isset($_SESSION['isadlogin']))
{
  echo "<script>location.href='Admin/dashboard.php'</script>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width", initial-scale="1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Bootstrap CSS linked-->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Font Awesome Css-->
	<link rel="stylesheet" href="css/all.min.css">

    <!-- Googlefont-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">

	<!-- custom css-->
	<link rel="stylesheet" href="custom.css">
    <title>index.php</title>

</head>
<body>
	<!-- start navigation-->
	<nav class="navbar navbar-expand-sm navbar-dark theme-bg-color pl-5 fixed-top">
		

		<a class="navbar-brand "href="index.php">Home Appliance Service Solution</a>
		<span class="navbar-text">You can rely on!</span>
      <button  type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mymenu" >
      	<span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mymenu">
      	<ul class="navbar-nav navbar-right pl-5 custom-nav">

      	<li class="nav-item">  <a class="nav-link" href="index.php">Home</a> </li>
      	<li class="nav-item">  <a class="nav-link" href="#Service">Services</a> </li>
        <li class="nav-item">  <a class="nav-link" href="#registration">Registration</a> </li>
      	<li class="nav-item">  <a class="nav-link" href="Requester/login.php">Login</a> </li>
      	<li class="nav-item">  <a class="nav-link" href="#Contact">Contact</a> </li>	

      	</ul>
      
   </div>
	</nav> <!-- end nav-->

	<!-- starting jumbotron-->
	  <header class="jumbotron bg-image" style="background-image:url(images/portrait-smiling-young-male-builder-pointing_171337-5209.jpg)" >
     <div class="heading mob">
     	<h1 class="text-uppercase text-danger font-weight-bold">Welcome to HA$$</h1>
     	<P class="subtitle">You can rely on!</P>
     	<a href='Requester/login.php' class="btn btn-success mr-4">Login</a>
     	<a href="#registration" class="btn btn-danger mr-4">Signup</a>
     </div>
    </header>

    <div class="container">
    	<div class="jumbotron">
    		<h3 class="text-center">About Us</h3>
    		<p>Home Appliance Service Solution is India's leading chain of multi-brand Electronics Electrical service workshop offering wide array of  
    		   services. We focus on enhancing the user's exeprience by offering world-class Electonics appliance maintenance services.
    		   Our sole mission is 'To provide electronics appliances care services to keep the devices fit and healthy and customers happy and smiling. </p>
    		
    	</div>
    </div>

    <div class="container text-center border-bottom">
    	<h3 >Our Services</h3>
    	<div class="row mt-4 ">
    		<div class="col-sm-4 mb-4"><a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
    			<h4 class="mt-4">Electronics Appliance</h4>
    		</div>
    			
    		<div class="col-sm-4 mb-4"><a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
    			<h4 class="mt-4">Preventive Maintenance</h4>
    		</div>
    	<div class="col-sm-4 mb-4"><a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
    			<h4 class="mt-4">Fault Repair</h4>
    		</div>
    	
    </div>
</div>

<!-- Registration Start-->
<?php
include ('signup.php');
?>
 <!-- end registration-->


<div class="jumbotron bg-danger">
	<div class="container">
		<h2 class="text-center text-white mb-4">Happy Customers</h2>

		<div class="row ">

			<div class="col-lg-3 col-sm-6">
				<div class="card shadow-lg mb-2">
					<div class="card-body text-center">
						<img src="images/download1.jpg" alt="avt1" class="img-fluid" style="border-radius: 100px;">
						<h4 class="card-title">Ajay Singh</h4>
						<p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
					</div>	
				</div>
			</div>

			<div class="col-lg-3 col-sm-6">
				<div class="card shadow-lg mb-2">
					<div class="card-body text-center">
						<img src="images/download2.jpg" alt="avt1" class="img-fluid" style="border-radius: 100px;">
						<h4 class="card-title">Sukhdev Singh</h4>
						<p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>	
					</div>
				</div>
			</div>


			<div class="col-lg-3 col-sm-6">
				<div class="card shadow-lg mb-2">
					<div class="card-body text-center">
						<img src="images/download3.jpg" alt="avt1" class="img-fluid" style="border-radius: 100px;">
						<h4 class="card-title">Deepa Sengar</h4>
						<p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-sm-6">
				<div class="card shadow-lg mb-2">
					<div class="card-body text-center">
						<img src="images/download4.jpg" alt="avt1" class="img-fluid" style="border-radius: 100px;">
						<h4 class="card-title">Roshni Mishra</h4>
						<p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>


<div class="container">
	<h2 class="text-center mb-4">Contact Us</h2>

	<div class="row">

		<div class="col-md-8">

			<form action="" method="POST">
				<input type="text" name="name" class="form-control" placeholder="Name"> </br>
				<input type="text" name="subject" class="form-control" placeholder="Subject"> </br>
				<input type="email" name="email" class="form-control" placeholder="Email"> </br>
				<textarea class="form-control" name="message" placeholder="How can we assist you?" style="height:150px;"></textarea> </br>
				<input type="submit" name="submit" class="btn btn-primary" value="send"> </br></br>
			</form>
			
		</div>
		
		<div class="col-md-4 text-center">
			<strong>Headquarter:</strong> </br>
			HA$$ pvt ltd,<br>
			JC Road,Bangalore<br>
			Phone:+999999999 <br>
			<a href="#" target="_blank">www.homeapplianceservicesol.com</a><br>
			<br> <br>
			<strong>Branch:</strong> </br>
			HA$$ pvt ltd,<br>
			Greater Noida,Uttar-Pradesh<br>
			Phone:+999999999  <br>
			<a href="#" target="_blank">www.homeapplianceservicesol.com</a> <br>
			
		</div>
		
	</div>
</div>


<footer class=" container-fluid bg-dark mt-5 text-white py-2 ">
    <div class="container">
    <div class="row">
    <div class="col-md-11">	
    <center>
        <p>Copyright &copy; Home Appliance Service Solution. All Rights Reserved | Contact Us: +91 99999999999</p>
    </center>
</div>
<div class="col-md-1 text-right"  >
	<a class="" href="Admin/login.php"><small class="form-text text-danger">Admin</small></a>
</div>
</div>
    </div>
</footer>


	<!-- javascript-->
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/all.min.js"></script>
</body>
</html>
