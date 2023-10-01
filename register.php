<?php
include 'conn.php';
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
	<link href="css/login.css" rel="stylesheet">
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
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
		<li class="nav-item">
          <a class="nav-link" href="login.php">Sign In</a>
        </li>
		<li class="nav-item">
          <a class="nav-link button_2 ms-2 me-2" href="#">Register <i class="fa fa-check-circle ms-1"></i></a>
        </li>
		
      </ul>
    </div>
  </div>
</nav>
</section>
 </div>
 <div class="main_2 clearfix">
 <section id="center" class="center_reg">
   <div class="center_om clearfix">
     <div class="container-xl">
  <div class="row center_o1">
   <div class="col-md-12">
      <h2 class="text-white">Register</h2>
	  <h6 class="mb-0 mt-3 fw-normal col_oran"><a class="text-light" href="#">Home</a> <span class="mx-2 col_light">/</span> Register</h6>
   </div>
  </div>
 </div>
   </div>
 </section>
 </div>
 
</div>

<section id="login" class="p_3">
 <div class="container-xl">
  <div class="row">
  <?php
 if(isset($_POST['register'])){
     extract($_POST);
     
     if(strlen($full_name)<7){
         $error[]= ' Please enter full name using 7 characters atleast!';
     }

     if(strlen($full_name)>40){
        $error[]= ' Full name can not be more than 40 characters long!';
     }
     if(!preg_match("/^[A-Za-z _]*[A-Za-z _]+[A-Za-z _]*$/",$full_name)){
         $error[] = 'Invalid entry full name. Please enter letters without any digit or special symbols';
     }  
    
    if(strlen($email) > 40){
        $error[] = 'Email can not be more than 40 characters long!';
    }
    if(strlen($password) < 6){
        $error[] = 'Password can not be less than 6 characters!';
    }
    if(strlen($password) > 40){
        $error[] = 'Password can not be more than 40 characters!';
    }

    $sql = " select * from users where email = '$email';";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res) > 0){
        $error[] = ' This email has been used already!';
    }
    
    if(!isset($error)){
        $date = date('Y-m-d');
        $password = md5($password);
        
        $sql2 = "INSERT INTO users values('','$full_name','$email', '$password','$date')";
        $result = mysqli_query($conn,$sql2);

        if($result){
            $done = 2;
        }
         else{
             $error[] = 'Failed : Something went wrong';
         }
    }
 }
 ?>
 <div class="col-md-1">
  <?php
  if(isset($error)){
      foreach($error as $error){
          echo '<p class= "errmsg">&#x26A0;'.$error.'</p>';
      }
  }
  ?>
 </div>
 <?php
 if(isset($done)){
 ?>
 <div class="successmsg">
 <span style = "font-size:100px;">&#9989;</span>
 YOU HAVE SUCCESSFULLY REGISTERED! &nbsp; &nbsp; &nbsp;
 <br> <br>
 <br>
 <br>
 </div>
 <?php
 } else {
 ?>

  <!-- <div class="col-md-1"></div> -->
   <div class="col-md-10">
    <div class="login_1 p-4 m-auto">
      <!-- input fields -->
	 <h3 class="col_oran">Register</h3>
	 <p>Create your Travel Mate account</p>

  <form action="#" method="post">
	 <h6 class="mt-4">Full Name</h6>
	 <input type="text" class="form-control" placeholder="Your Name" required name="full_name">
	 <h6 class="mt-4">Email Address</h6>
	 <input type="email" class="form-control" placeholder="Your Email" required name="email">
	 <h6 class="mt-4">Password</h6>
	 <input type="password" class="form-control" placeholder="Your Password" required name="password">
	 <div class="d-flex justify-content-between mt-4">
<div class="form-check">
<input class="form-check-input" type="checkbox" value="" id="remember" required>
<label class="form-check-label" for="remember">
I agree with the <a class="col_oran" href="#">Terms Of Service</a>
</label>
</div>
</div>
<!-- Register button -->
    
    <button type="submit" class="button" name="register">
   Register <i class="fa fa-location-arrow ms-1"></i>
    </button>
    <?php } ?>

    <p class="mt-4 mb-0">Already have an account? <a class="col_oran" href="login.php">Login</a></p>

    </form> 

	
	</div>
   </div>
   <div class="col-md-1"></div>
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
  <div class="col-md-4">
   
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
	 <p class="mb-0 mt-1">© 2023 TRAVEL MATE All Rights Reserved | <a class="col_green" href="index.html">Travel Mate</a></p>
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