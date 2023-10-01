<?php
session_start();
include 'conn.php';

$vehicle_model = $_GET['id'];

if(isset($_POST['proceed'])){
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

  $phone_number = $_POST['phone_number'];

  if(strlen($phone_number)!=11){
      $error[]= ' Please enter phone number using 11 digits!';
  }  
  
  if(strlen($pick_up_location)<10){
     $error[]= ' Please enter pick-up location using 10 characters atleast!';
 }

 if(strlen($pick_up_location)>100){
    $error[]= ' Pick-up Location can not be more than 100 characters long!';
 }

 if(strlen($drop_off_location)<10){
  $error[]= ' Please enter drop-off location using 10 characters atleast!';
}

if(strlen($drop_off_location)>100){
 $error[]= ' Drop-off Location can not be more than 100 characters long!';
}

if($drop_off_location == $pick_up_location){
  $error[]= ' Drop-off Location and Pick-up Location can not be same!';
}

$pick_up_date = strtotime($pick_up_date);
$pick_up_date = date("Y-m-d", $pick_up_date);


if($pick_up_date < date("Y-m-d")){
  $error[]= ' You can not book a ride in past!';
}

$q = " select * from bookings where pick_up_date = '$pick_up_date' && vehicle_model = '$vehicle_model'";
$res = mysqli_query($conn,$q);
$num = mysqli_num_rows($res);
if($num >= 10){
  $error[]= $vehicle_model.' is not available in the specified date. Please choose another vehicle model or change your pick-up date! ';
}


 if(!isset($error)){
     $_SESSION['original_full_name'] = $_SESSION['full_name'];
     $_SESSION['full_name'] = $full_name;
     $_SESSION['phone_number'] = $phone_number;
     $_SESSION['pick_up_time'] = $pick_up_time;
     $_SESSION['pick_up_date'] = $pick_up_date;
     $_SESSION['pick_up_location'] = $pick_up_location;
     $_SESSION['drop_off_location'] = $drop_off_location;
     $_SESSION['vehicle_model'] = $vehicle_model;

     function getDistance($addressFrom,$addressTo,$unit=''){
      // Google API Key
      $apiKey = 'AIzaSyBn6u-exI2PVokZAjI56DBz-Zhub7XMr1Y';
  
      // Change address fromat
      $FormattedAddrFrom = str_replace(' ','+',$addressFrom);
      $FormattedAddrTo = str_replace(' ','+',$addressTo);
  
      // Geocoding API request with start address
      $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$FormattedAddrFrom.'&sensor=false&key='.$apiKey);
      $outputFrom = json_decode($geocodeFrom);
      if(!empty($outputFrom->error_message)){
          return $outputFrom->error_message;
      }
  
       // Geocoding API request with end address
       $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$FormattedAddrTo.'&sensor=false&key='.$apiKey);
       $outputTo = json_decode($geocodeTo);
       if(!empty($outputTo->error_message)){
           return $outputTo->error_message;
       }
       
       // Get latitude and longitude from the geodata
       $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
       $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
       $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
       $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
       
       // Calculate distance between latitude and longitude
       $theta    = $longitudeFrom - $longitudeTo;
       $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
       $dist    = acos($dist);
       $dist    = rad2deg($dist);
       $miles    = $dist * 60 * 1.1515;
       


       // Convert unit and return distance
      //  $unit = strtoupper($unit);
      //  if($unit == "K"){
      //      return round($miles * 1.609344, 2).' km';
      //  }elseif($unit == "M"){
      //      return round($miles * 1609.344, 2).' meters';
      //  }else{
      //      return round($miles, 2).' miles';
      //  }

      return round($miles * 1.609344, 2);
  
  }
       
  $distance = getDistance($pick_up_location, $drop_off_location, "K");
  $_SESSION['distance'] = $distance;
  $cost = 0;

  if($vehicle_model == 'Audi 1'){
      $cost = 200 * $distance;
  }
  elseif($vehicle_model == 'Audi 2'){
     $cost = 250 * $distance;
  }
  elseif($vehicle_model == 'Audi 3'){
    $cost = 300 * $distance;
 }
 elseif($vehicle_model == 'BMW 1'){
  $cost = 250 * $distance;
}
elseif($vehicle_model == 'BMW 2'){
  $cost = 300 * $distance;
}
else{
  $cost = 350 * $distance;
}

$_SESSION['cost'] = $cost;
header('location:payment.php');
 }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Travel Mate</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
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
            <a class="navbar-brand fs-3 p-0 fw-bold text-white" href="index.html"><i
                class="fa fa-car col_oran me-1 fs-2 align-middle"></i> TRAVEL <br> <span
                class="fs-5 span_1">MATE</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
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
                  <a class="nav-link" href="models.html">Vehicle Models </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
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

                <li class="nav-item dropdown">
                  <a class="nav-link button_2  dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user me-2"></i> <?php echo $_SESSION['full_name']; ?> 
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
      <section id="center" class="center_reg">
        <div class="center_om clearfix">
          <div class="container-xl">
            <div class="row center_o1">
              <div class="col-md-12">
                <h2 class="text-white">Booking</h2>
                <h6 class="mb-0 mt-3 fw-normal col_oran"><a class="text-light" href="#">Vehicle</a> <span
                    class="mx-2 col_light">/</span> Booking</h6>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

  </div>

  <section id="login" class="p_3 mt-3">
    <div class="container-xl">
      <div class="row">
        <div class="col-md-12 text-center">
          <h3 class="col_oran">Booking Details</h3>
          <p>fill your details</p>
        </div>
      </div>
      <div class="row">
      <?php
  if(isset($error)){
      foreach($error as $error){
          echo '<p class= "errmsg">&#x26A0;'.$error.'</p>';
      }
  }
  ?>
      </div>
      <div class="row">
        <div class="col-sm-8 login_1 m-auto">
          <form action="#" method="post">
            <!-- input fields -->
            <div class="row">
            
              <div class="col-sm-6">
                <h6 class="mt-4">Full Name</h6>
                <input type="text" class="form-control" placeholder="Your Name" required name="full_name">
                <h6 class="mt-4">Phone Number</h6>
                <input type="number" class="form-control" placeholder="Your Number" required name="phone_number">
                <h6 class="mt-4">Pick-up Time</h6>
                <input type="time" class="form-control" placeholder="Your Time" required name="pick_up_time">

              </div>
              <div class="col-sm-6">
                <h6 class="mt-4">Pick-up Date</h6>
                <input type="date" class="form-control" placeholder="Your Number" required name="pick_up_date">
                <h6 class="mt-4">Pick-up Location</h6>
                <input type="text" class="form-control" placeholder="Your Location" required name="pick_up_location">
                <h6 class="mt-4">Drop-off Location</h6>
                <input type="text" class="form-control" placeholder="Your Destination" required name="drop_off_location">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <div class="d-flex justify-content-between mt-4">

                  <div class="form-check">

                    <input class="form-check-input" type="checkbox" value="" id="remember" required>
                    <label class="form-check-label " for="remember">
                      I agree with the <a class="col_oran" href="#">Terms Of Service</a>
                    </label>
                  </div>
                </div>
                <!-- Register button -->
              
                  <button type="submit" class="btn button mt-4 mb-0" name="proceed">
                   Proceed to Payment <i class="fa fa-location-arrow ms-1"></i>
                  </button>
              

                <!-- <a class="button" href="payment">Proceed to Payment<i class="fa fa-location-arrow ms-1"></i></a></h6> -->

              </div>
            </div>
          </form>
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
            <h4><a href="index.html"><i class="fa fa-car col_oran "></i> TRAVEL <span class="fw-normal"></span>MATE</a>
            </h4>
            <p class="mt-3">Use securing confined his shutters. Delightful as he it acceptance an solicitude discretion.
            </p>
            <h6 class="mt-3 fw-normal"><i class="fa fa-map col_oran me-1"></i> 36 Hyderabad, Old East 2360, Pakistan
            </h6>
            <h6 class="mt-3 fw-normal"><a href="#"><i class="fa fa-phone col_oran me-1"></i> (123) 456-7890</a></h6>
            <h6 class="mt-3 mb-0 fw-normal"><a href="#"><i class="fa fa-envelope col_oran me-1"></i> info@gmail.com</a>
            </h6>
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
            <h6 class="mb-0 mt-4"><a class="button pt-3 pb-3" href="#">Submit <i class="fa fa-check-circle ms-1"></i>
              </a></h6>
          </div>
        </div>
      </div>
      <hr>
      <div class="row footer_2">
        <div class="col-md-8">
          <div class="footer_2l">
            <p class="mb-0 mt-1">© 2023 TRAVEL MATE All Rights Reserved | <a class="col_green" href="index.html">Travel
                Mate</a></p>
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
    window.onscroll = function () { myFunction() };

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