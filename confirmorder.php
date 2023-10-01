<?php 
session_start();
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

<body style="background-color: #165235ab;">

    <div class="main_o clearfix position-relative">
        <div class="main_1 clearfix position-absolute top-0 w-100">
            <section id="header">
                <nav class="navbar navbar-expand-md navbar-light" id="navbar_sticky">
                    <div class="container-xl">
                        <a class="navbar-brand fs-3 p-0 fw-bold text-white" href="index.html"><i
                                class="fa fa-car col_oran me-1 fs-2 align-middle"></i> TRAVEL <br> <span
                                class="fs-5 span_1">MATE</span></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
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
                                        <li><a class="dropdown-item border-0" href="blog_detail.html"> Blog Detail</a>
                                        </li>
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
                                    <a class="nav-link button_2  dropdown-toggle" href="#" id="navbarDropdown"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-user me-2"></i> 
                                        <?php echo $_SESSION['original_full_name'];?>
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
        <!-- <div class="main_2 clearfix">
            <section id="center" class="center_reg">
                <div class="center_om clearfix">
                    <div class="container-xl">
                        <div class="row center_o1">
                            <div class="col-md-12">
                                <h2 class="text-white">Payment Method</h2>
                                <h6 class="mb-0 mt-3 fw-normal col_oran"><a class="text-light" href="#">Booking</a>
                                    <span class="mx-2 col_light">/</span> Payment Method</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div> -->

    </div>


    <section id="login" class="p_3" style="padding-top: 145px;">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-12">
                  
                        <div class="login_1 p-4 m-auto text-center" style="    background-color: white;
                        border-radius: 3%;">
                           
                            <!-- fields -->
                            <h3 class="col_oran">YOUR BOOKING FOR</h3>
                            
                                <div class="rounded border d-flex w-100 px-3 py-2 justify-content-center align-items-center">
                            <h5 style="padding-top: 3%; color:#000000ba;">Vehicle Model:
                        <?php echo $_SESSION['vehicle_model'];?>
                        </h5>
                            </div>
                            
                            <h5 class="mt-3" style="color:#000000ba">IS CONFIRMED!</h5>
                            <h6 class="mt-1 mb-4"  style="color:#000000ba">Ride Rent: Rs. 
                            <?php echo $_SESSION['cost'];?>
                        </h6>
                          
                            <!-- login button -->
                            <h6 class="mt-4 mb-0 text-center">
                               <a href="account.php"> <button type="submit" class="btn button"> 
                                Back To Models <i class="fa fa-location-arrow ms-1"></i>
                              </button></a>
                              </h6>
                            <!-- <h6 class="mt-4 mb-0"><a class="button" href="#">Login <i
                                        class="fa fa-sign-in ms-1"></i></a></h6> -->
                          
                            </form>
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
                    <div class="col-md-4">
                       
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="footer" class="pt-3 pb-3" style="background-color: white;">
        <div class="container-xl">
            <div class="row footer_1">
                <div class="col-md-4">
                    <div class="footer_1i">
                        <h4><a href="index.html"><i class="fa fa-car col_oran "></i> TRAVEL <span
                                    class="fw-normal"></span>MATE</a></h4>
                        <p class="mt-3">Use securing confined his shutters. Delightful as he it acceptance an solicitude
                            discretion.</p>
                        <h6 class="mt-3 fw-normal"><i class="fa fa-map col_oran me-1"></i> 36 Hyderabad, Old East 2360,
                            Pakistan</h6>
                        <h6 class="mt-3 fw-normal"><a href="#"><i class="fa fa-phone col_oran me-1"></i> (123)
                                456-7890</a></h6>
                        <h6 class="mt-3 mb-0 fw-normal"><a href="#"><i class="fa fa-envelope col_oran me-1"></i>
                                info@gmail.com</a></h6>
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
                        <h6 class="mb-0 mt-4"><a class="button pt-3 pb-3" href="#">Submit <i
                                    class="fa fa-check-circle ms-1"></i> </a></h6>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row footer_2">
                <div class="col-md-8">
                    <div class="footer_2l">
                        <p class="mb-0 mt-1">© 2023 TRAVEL MATE All Rights Reserved | <a class="col_green"
                                href="index.html">Travel Mate</a></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer_2r text-end">
                        <ul class="social-network social-circle mb-0">
                            <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-pinterest"></i></a>
                            </li>
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