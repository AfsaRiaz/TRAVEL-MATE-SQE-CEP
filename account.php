<?php 
session_start();
include 'conn.php';
if(!isset($_SESSION['login'])){
    header('location:login.php');
}
$email = $_SESSION["email"];
$query = " select * from users where email = '$email';";
$findresult = mysqli_query($conn,$query);
if($res = mysqli_fetch_array($findresult)){
    $full_name = $res['full_name'];
    // $fname = $res['fname'];
    // $lname = $res['lname'];
    // $faname = $res['faname'];
    // $gender = $res['gender'];
    // $dept = $res['dept'];
    // $email = $res['email'];
    // $dor = $res['dor'];
}
$_SESSION['full_name'] = $full_name

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Travel Mate</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/font-awesome.min.css" rel="stylesheet" >
	<link href="css/global.css" rel="stylesheet">
	<link href="css/models.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>

</head>
<body>

<div class="main_o clearfix position-relative">
 <div class="main_1 clearfix position-absolute top-0 w-100">
   <section id="header">
<nav class="navbar navbar-expand-md navbar-light" id="navbar_sticky">
  <div class="container-xl">
    <a class="navbar-brand fs-3 p-0 fw-bold text-white" href="index.html"><i class="fa fa-car col_oran me-1 fs-2 align-middle"></i> TRAVEL <br> <span class="fs-5 span_1">MATE</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-0 ">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.html">Home</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="about.html">About </a>
        </li>
		<li class="nav-item">
          <a class="nav-link active" href="models.html">Vehicle Models </a>
        </li>
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Blog
          </a>
          <ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="blog.html"> Blog</a></li>
            <li><a class="dropdown-item border-0" href="blog_detail.html"> Blog Detail</a></li>
          </ul>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="team.html">Team</a>
        </li>
		<!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pages
          </a>
          <ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="login.html"> Login</a></li>
            <li><a class="dropdown-item border-0" href="register.html"> Register</a></li>
          </ul>
        </li> -->
		<li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
      </ul>
	  <ul class="navbar-nav mb-0 ms-auto">
		
		<li class="nav-item dropdown">
			<a class="nav-link button_2  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				<i class="fa fa-user me-2"></i>   <?php echo $full_name; ?> 
			</a>
			<ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
			  <li><a class="dropdown-item" href="logout.php"> Logout</a></li>
			  <!-- <li><a class="dropdown-item border-0" href="#"> Register</a></li> -->
			</ul>
		  </li>

		<!-- <li class="nav-item">
          <a class="nav-link button_2 ms-2 me-2" href="#">User Account <i class="fa fa-check-circle ms-1"></i></a>
        </li> -->
		
      </ul>
    </div>
  </div>
</nav>
</section>
 </div>
 <div class="main_2 clearfix">
 <section id="center" class="center_o">
   <div class="center_om clearfix">
     <div class="container-xl">
  <div class="row center_o1">
   <div class="col-md-12">
      <h2 class="text-white">Vehicle Models</h2>
	  <h6 class="mb-0 mt-3 fw-normal col_oran"><a class="text-light" href="#">Home</a> <span class="mx-2 col_light">/</span> Vehicle Models</h6>
   </div>
  </div>
 </div>
   </div>
 </section>
 </div>
 
</div>

<section id="model_pg" class="p_3">
<div class="container-xl">
	<div class="row model_pg1">
		<div class="col-md-12">
			<h2 class="mt-3">Audi</h2>
			<h6 class="mb-5 mt-3 fw-normal col_oran"><a class="text-dark" href="#">Vehicle</a> <span class="mx-2 col_light">/</span> Audi Models</h6>
		 </div>
	</div>
  <div class="row model_pg1">
   <div class="col-md-4">
    <div class="model_pg1i clearfix">
	 <div class="model_pg1i1">
	   <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="img/Audi1.jpg" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
	 </div>
	 <div class="model_m p-3 clearfix border-top-0">
	   <div class="model_pg1i2 row">
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i2l">
	    <h4>Audi 1</h4>
		<span class="font_12 col_yell">
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star-half-o"></i>
		  </span>
	   </div>
	  </div>
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i2r text-end">
	    <!-- <h3 class="mb-1"><i class="fa fa-dollar col_oran"></i> </h3> -->
		<h6 class="mb-0 font_14"></h6>
	   </div>
	  </div>
	 </div>
	 <div class="model_pg1i3 row mt-4 mb-4">
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i3l">
	     <h6><i class="fa fa-car col_oran me-1"></i> E-tron</h6>
		 <h6 class="mb-0 mt-3"><i class="fa fa-male col_oran me-1"></i> 4 Seats</h6>
	   </div>
	  </div>
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i3l text-end">
	     <h6><i class="fa fa-suitcase col_oran me-1"></i> 2 Luggage</h6>
		 <h6 class="mb-0 mt-3"><i class="fa fa-female col_oran me-1"></i> 4 Seats</h6>
	   </div>
	  </div>
	 </div><hr>
	 
	 <div class="model_pg1i4 row text-center mt-4">
	  <div class="col-md-12">
	      <h6 class="mb-0"><a class="button" href="book.php?id=<?php echo 'Audi 1'; ?>">Book Ride <i class="fa fa-check-circle ms-1"></i> </a></h6>
	  </div>
	 </div>
	 </div>
	</div>
   </div>
   <div class="col-md-4">
    <div class="model_pg1i clearfix">
	 <div class="model_pg1i1">
	   <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="img/audi2.webp" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
	 </div>
	 <div class="model_m p-3 clearfix border-top-0">
	   <div class="model_pg1i2 row">
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i2l">
	    <h4>Audi 2</h4>
		<span class="font_12 col_yell">
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star-half-o"></i>
		  </span>
	   </div>
	  </div>
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i2r text-end">
	    <!-- <h3 class="mb-1"><i class="fa fa-dollar col_oran"></i></h3> -->
		<h6 class="mb-0 font_14"></h6>
	   </div>
	  </div>
	 </div>
	 <div class="model_pg1i3 row mt-4 mb-4">
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i3l">
	     <h6><i class="fa fa-car col_oran me-1"></i> E-tron</h6>
		 <h6 class="mb-0 mt-3"><i class="fa fa-male col_oran me-1"></i> 4 Seats</h6>
	   </div>
	  </div>
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i3l text-end">
	     <h6><i class="fa fa-suitcase col_oran me-1"></i> 3 Luggage</h6>
		 <h6 class="mb-0 mt-3"><i class="fa fa-female col_oran me-1"></i> 4 Seats</h6>
	   </div>
	  </div>
	 </div><hr>
	 
	 <div class="model_pg1i4 row text-center mt-4">
	  <div class="col-md-12">
	      <h6 class="mb-0"><a class="button" href="book.php?id=<?php echo 'Audi 2'; ?>">Book Ride <i class="fa fa-check-circle ms-1"></i> </a></h6>
	  </div>
	 </div>
	 </div>
	</div>
   </div>
   <div class="col-md-4">
    <div class="model_pg1i clearfix">
	 <div class="model_pg1i1">
	   <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="img/audi3.jpg" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
	 </div>
	 <div class="model_m p-3 clearfix border-top-0">
	   <div class="model_pg1i2 row">
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i2l">
	    <h4>Audi 3</h4>
		<span class="font_12 col_yell">
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star-half-o"></i>
		  </span>
	   </div>
	  </div>
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i2r text-end">
	    <!-- <h3 class="mb-1"><i class="fa fa-dollar col_oran"></i> </h3> -->
		<h6 class="mb-0 font_14"></h6>
	   </div>
	  </div>
	 </div>
	 <div class="model_pg1i3 row mt-4 mb-4">
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i3l">
	     <h6><i class="fa fa-car col_oran me-1"></i> E-tron</h6>
		 <h6 class="mb-0 mt-3"><i class="fa fa-male col_oran me-1"></i> 4 Seats</h6>
	   </div>
	  </div>
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i3l text-end">
	     <h6><i class="fa fa-suitcase col_oran me-1"></i> 4 Luggage</h6>
		 <h6 class="mb-0 mt-3"><i class="fa fa-female col_oran me-1"></i> 4 Seats</h6>
	   </div>
	  </div>
	 </div><hr>
	 
	 <div class="model_pg1i4 row text-center mt-4">
	  <div class="col-md-12">
	      <h6 class="mb-0"><a class="button" href="book.php?id=<?php echo 'Audi 3'; ?>">Book Ride <i class="fa fa-check-circle ms-1"></i> </a></h6>
	  </div>
	 </div>
	 </div>
	</div>
   </div>
  </div>
  <div class="row model_pg1">
	<div class="col-md-12">
		<h2 class="mt-5">BMW</h2>
		<h6 class="mb-3 mt-3 fw-normal col_oran"><a class="text-dark" href="#">Vehicle</a> <span class="mx-2 col_light">/</span> BMW Models</h6>
	 </div>
</div>
  <div class="row model_pg1 mt-4">
   <div class="col-md-4">
    <div class="model_pg1i clearfix">
	 <div class="model_pg1i1">
	   <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="img/bm1.jpg" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
	 </div>
	 <div class="model_m p-3 clearfix border-top-0">
	   <div class="model_pg1i2 row">
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i2l">
	    <h4>BMW 1</h4>
		<span class="font_12 col_yell">
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star-half-o"></i>
		  </span>
	   </div>
	  </div>
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i2r text-end">
	    <!-- <h3 class="mb-1"><i class="fa fa-dollar col_oran"></i> </h3> -->
		<h6 class="mb-0 font_14"></h6>
	   </div>
	  </div>
	 </div>
	 <div class="model_pg1i3 row mt-4 mb-4">
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i3l">
	     <h6><i class="fa fa-car col_oran me-1"></i> i5</h6>
		 <h6 class="mb-0 mt-3"><i class="fa fa-male col_oran me-1"></i> 4 Seats</h6>
	   </div>
	  </div>
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i3l text-end">
	     <h6><i class="fa fa-suitcase col_oran me-1"></i> 2 Luggage</h6>
		 <h6 class="mb-0 mt-3"><i class="fa fa-female col_oran me-1"></i> 4 Seats</h6>
	   </div>
	  </div>
	 </div><hr>
	 
	 <div class="model_pg1i4 row text-center mt-4">
	  <div class="col-md-12">
	      <h6 class="mb-0"><a class="button" href="book.php?id=<?php echo 'BMW 1'; ?>">Book Ride <i class="fa fa-check-circle ms-1"></i> </a></h6>
	  </div>
	 </div>
	 </div>
	</div>
   </div>
   <div class="col-md-4">
    <div class="model_pg1i clearfix">
	 <div class="model_pg1i1">
	   <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="img/bm2.jpg" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
	 </div>
	 <div class="model_m p-3 clearfix border-top-0">
	   <div class="model_pg1i2 row">
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i2l">
	    <h4>BMW 2</h4>
		<span class="font_12 col_yell">
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star-half-o"></i>
		  </span>
	   </div>
	  </div>
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i2r text-end">
	    <!-- <h3 class="mb-1"><i class="fa fa-dollar col_oran"></i></h3> -->
		<h6 class="mb-0 font_14"></h6>
	   </div>
	  </div>
	 </div>
	 <div class="model_pg1i3 row mt-4 mb-4">
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i3l">
	     <h6><i class="fa fa-car col_oran me-1"></i> i3</h6>
		 <h6 class="mb-0 mt-3"><i class="fa fa-male col_oran me-1"></i> 4 Seats</h6>
	   </div>
	  </div>
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i3l text-end">
	     <h6><i class="fa fa-suitcase col_oran me-1"></i> 3 Luggage</h6>
		 <h6 class="mb-0 mt-3"><i class="fa fa-female col_oran me-1"></i> 4 Seats</h6>
	   </div>
	  </div>
	 </div><hr>
	 
	 <div class="model_pg1i4 row text-center mt-4">
	  <div class="col-md-12">
	      <h6 class="mb-0"><a class="button" href="book.php?id=<?php echo 'BMW 2'; ?>">Book Ride <i class="fa fa-check-circle ms-1"></i> </a></h6>
	  </div>
	 </div>
	 </div>
	</div>
   </div>
   <div class="col-md-4">
    <div class="model_pg1i clearfix">
	 <div class="model_pg1i1">
	   <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="img/bm3.jpg" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
	 </div>
	 <div class="model_m p-3 clearfix border-top-0">
	   <div class="model_pg1i2 row">
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i2l">
	    <h4>BMW 3</h4>
		<span class="font_12 col_yell">
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star"></i>
		   <i class="fa fa-star-half-o"></i>
		  </span>
	   </div>
	  </div>
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i2r text-end">
	    <!-- <h3 class="mb-1"><i class="fa fa-dollar col_oran"></i> </h3> -->
		<h6 class="mb-0 font_14"></h6>
	   </div>
	  </div>
	 </div>
	 <div class="model_pg1i3 row mt-4 mb-4">
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i3l">
	     <h6><i class="fa fa-car col_oran me-1"></i> i8</h6>
		 <h6 class="mb-0 mt-3"><i class="fa fa-male col_oran me-1"></i> 4 Seats</h6>
	   </div>
	  </div>
	  <div class="col-md-6 col-sm-6">
	   <div class="model_pg1i3l text-end">
	     <h6><i class="fa fa-suitcase col_oran me-1"></i> 4 Luggage</h6>
		 <h6 class="mb-0 mt-3"><i class="fa fa-female col_oran me-1"></i> 4 Seats</h6>
	   </div>
	  </div>
	 </div><hr>
	 
	 <div class="model_pg1i4 row text-center mt-4">
	  <div class="col-md-12">
	      <h6 class="mb-0"><a class="button" href="book.php?id=<?php echo 'BMW 3'; ?>">Book Ride <i class="fa fa-check-circle ms-1"></i> </a></h6>
	  </div>
	 </div>
	 </div>
	</div>
   </div>
  </div>
</div>
</section>

<section id="ride">
	<div class="ride_m">
	 <div class="container-xl">
	 <div class="row ride_1">
	  <div class="col-md-8">
	   <div class="ride_1l">
		<h1 class="text-white">Save big with our cheap <br> car rental!</h1>
		<p class="text-light mb-0 fs-4 mt-3">Top Cars. Local Suppliers. 24/7 Support.</p>
	   </div>
	  </div>
	  
	 </div>
	</div>
	</div>
	</section>
	
	<section id="footer" class="pt-3 pb-3">
	<div class="container-xl">
	  <div class="row footer_1">
		<div class="col-md-4">
		 <div class="footer_1i">
		  <h4><a href="index.html"><i class="fa fa-car col_oran "></i> TRAVEL  <span class="fw-normal"></span>MATE</a></h4>
		  <p class="mt-3">Use securing confined his shutters. Delightful as he it acceptance an solicitude discretion.</p>
		  <h6 class="mt-3 fw-normal"><i class="fa fa-map col_oran me-1"></i> 36 Hyderabad,  Old East 2360, Pakistan</h6>
		  <h6 class="mt-3 fw-normal"><a href="#"><i class="fa fa-phone col_oran me-1"></i> (123) 456-7890</a></h6>
		  <h6 class="mt-3 mb-0 fw-normal"><a href="#"><i class="fa fa-envelope col_oran me-1"></i> info@gmail.com</a></h6>
		 </div>
		</div>
		<div class="col-md-2">
		 <div class="footer_1i">
		  <h4>COMPANY</h4>
		  <div class="row">
		  <h6 class="fw-normal mt-2 col-md-12 col-6"><a href="#">New York</a></h6>
		  <h6 class="fw-normal mt-2 col-md-12 col-6"><a href="#">Careers</a></h6>
		  <h6 class="fw-normal mt-2 col-md-12 col-6"><a href="#">Mobile</a></h6>
		  <h6 class="fw-normal mt-2 col-md-12 col-6"><a href="#">Blog</a></h6>
		  <h6 class="fw-normal mt-2 col-md-12 col-6"><a href="#">About Us</a></h6>
		  <h6 class="fw-normal mt-2 mb-0 col-md-12 col-6"><a href="#">How we work</a></h6>
		  </div>
		 </div>
		</div>
		<div class="col-md-3">
		 <div class="footer_1i">
		  <h4>WORK HOURS</h4>
		  <p class="mt-3">Mon - Fri: <span class="fw-bold text-black">09:00AM - 09:00PM</span></p>
		  <p class="mt-3">Sat: <span class="fw-bold text-black">09:00AM - 06:00PM</span></p>
		  <p class="mt-3 mb-0">Sun: <span class="fw-bold text-black">Closed</span></p>
		 </div>
		</div>
		<div class="col-md-3">
		 <div class="footer_1i">
		  <h4>SUBSCRIPTION</h4>
		  <p class="mt-3">Subscribe your Email address for latest news & updates.</p>
		  <input class="form-control" placeholder="Enter Email Address" type="text">
		  <h6 class="mb-0 mt-4"><a class="button pt-3 pb-3" href="#">Submit <i class="fa fa-check-circle ms-1"></i> </a></h6>
		 </div>
		</div>
	  </div><hr>
	  <div class="row footer_2">
	   <div class="col-md-8">
		<div class="footer_2l">
		 <p class="mb-0 mt-1">© 2023 TRAVEL MATE All Rights Reserved <a class="col_green" href="index.html">TRAVEL MATE</a></p>
		</div>
	   </div>
	   <div class="col-md-4">
		<div class="footer_2r text-end">
		  <ul class="social-network social-circle mb-0">
						<li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
						<li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
					</ul>
		</div>
	   </div>
	  </div>
	</div>
	</section>
<script>
window.onscroll = function() {myFunction()};

var navbar_sticky = document.getElementById("navbar_sticky");
var sticky = navbar_sticky.offsetTop;
var navbar_height = document.querySelector('.navbar').offsetHeight;

function myFunction() {
  if (window.pageYOffset >= sticky + navbar_height) {
    navbar_sticky.classList.add("sticky")
	document.body.style.paddingTop = navbar_height + 'px';
  } else {
    navbar_sticky.classList.remove("sticky");
	document.body.style.paddingTop = '0'
  }
}
</script>

</body>

</html>