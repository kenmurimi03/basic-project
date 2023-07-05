
<?php
require_once 'config.php';


if(isset($_POST['submit'])) {

    if(!empty($_POST['firstname'])  && !empty($_POST['lastname'])   && !empty($_POST['email'])  && !empty($_POST['mobilenumber'])  && !empty($_POST['pickuplocation'])  && !empty($_POST['droplocation'])  && !empty($_POST['specialrequest'])      ){
        $fullname = $_POST['firstname'];
        $surname = $_POST['lastname'];
        $phonenumber = $_POST['email'];
        $people = $_POST['mobilenumber'];
        $date = ($_POST['pickuplocation']);
        $text= ($_POST['droplocation']);
        $request = $_POST['specialrequest'];
        
        
        




        //var_dump($fullname,$email,$phonenumber);

        //Insert Data to database 
        $query = "insert into reservation(firstname,lastname,email,mobilenumber,pickuplocation,droplocation,specialrequest) values('$fullname' , '$surname' ,'$phonenumber','$people','$date', '$text', '$request')"; 
     
       //run query
       $run = mysqli_query($conn, $query) or die('Error: ' . mysqli_error($conn));;

       //check if our query runs
       if ($run) {

        echo "<script>alert('your car reservation has been made successfully.');</script>";
        header('Location: reservationsmade.php');

       }
       else {
        echo 'Data not  submitted';
       }
    }

    else {
        echo 'All fields are required';
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ROYAL CARS </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i>+254741808375</a>
                    <span class="text-body">|</span>
                    <a class="text-body px-3" href=""><i class="fa fa-envelope mr-2"></i>info@example.com</a>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body px-3" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-body pl-3" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="position-relative px-lg-5" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-uppercase text-primary mb-1">Royal Cars</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="service.html" class="nav-item nav-link">Service</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Cars</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="car.html" class="dropdown-item">Car Listing</a>
                                <a href="detail.html" class="dropdown-item">Car Detail</a>
                                <a href="booking.html" class="dropdown-item">Car Booking</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="team.html" class="dropdown-item">The Team</a>
                                
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link active">Contact</a>
                    </div>
                </div>
                <a href="registernow.php" class="nav-item nav-link">REGISTER</a>
            </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->





    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">make car reservation</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Contact</h6>
        </div>
    </div>
    <!-- Page Header Start -->

    <!-- Detail Start -->
    <div class="container-fluid pt-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase mb-5">Ford Mustang</h1>
            <div class="row align-items-center pb-2">
                <div class="col-lg-6 mb-4">
                    <img class="img-fluid" src="img/bg-banner.jpg" alt="">
                </div>
                <div class="col-lg-6 mb-4">
                    <h4 class="mb-2">10000ksh/Day</h4>
                    <div class="d-flex mb-3">
                        <h6 class="mr-2">Rating:</h6>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star-half-alt text-primary mr-1"></small>
                            <small>(250)</small>
                        </div>
                    </div>
                    
                    <div class="d-flex pt-1">
                        <h6>Share on:</h6>
                        <div class="d-inline-flex">
                            <a class="px-2" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="px-2" href=""><i class="fab fa-twitter"></i></a>
                            <a class="px-2" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="px-2" href=""><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-n3 mt-lg-0 pb-4">
                <div class="col-md-3 col-6 mb-2">
                    <i class="fa fa-car text-primary mr-2"></i>
                    <span>Model: 2015</span>
                </div>
                <div class="col-md-3 col-6 mb-2">
                    <i class="fa fa-cogs text-primary mr-2"></i>
                    <span>Automatic</span>
                </div>
                <div class="col-md-3 col-6 mb-2">
                    <i class="fa fa-road text-primary mr-2"></i>
                    <span>20km/liter</span>
                </div>
                <div class="col-md-3 col-6 mb-2">
                    <i class="fa fa-eye text-primary mr-2"></i>
                    <span>GPS Navigation</span>
                </div>
                <div class="col-md-3 col-6 mb-2">
                    <i class="fa fa-eye text-primary mr-2"></i>
                    <span>Owned by Moses owuor</span>
                </div>
                
               
            </div>
        </div>
    </div>
    <!-- Detail End -->


    <!-- Car Booking Start -->

    <form class="" action="" method="post" autocomplete="off">
        <div class="container-fluid pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h2 class="mb-4">Personal Detail</h2>
                        <div class="mb-5">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4"  name="firstname"  placeholder="First Name" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" name="lastname"  placeholder="Last Name" required="required">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="email" class="form-control p-4" name="email"  placeholder="Your Email" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="number" class="form-control p-4"  name="mobilenumber"  placeholder="Mobile Number" required="required">
                                </div>
                            </div>
                        </div>
                        <h2 class="mb-4">Booking Detail</h2>
                        <div class="mb-5">
                            <div class="row">
                            <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4"  name="pickuplocation"  placeholder="pickuplocation" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4"  name="droplocation"  placeholder="droplocation" required="required">
                                </div>
                               
                            </div>
                           
                          
                            <div class="form-group">
                                <textarea class="form-control py-3 px-4" rows="3" name="specialrequest"  placeholder="Special Request" required="required"></textarea>
                            </div>
                            <div class="col-lg-8">
                    <div class="bg-secondary p-5 mb-5">
                        <h2 class="text-primary mb-4">Payment</h2>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5"  name="submit" type="submit">book reservation</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!-- Car Booking End -->
        
    <!-- Car Booking End -->

        <!-- Detail Start -->
        <div class="container-fluid pt-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase mb-5">Mercedes R3</h1>
            <div class="row align-items-center pb-2">
                <div class="col-lg-6 mb-4">
                    <img class="img-fluid" src="img/car-rent-1.png" alt="">
                </div>
                <div class="col-lg-6 mb-4">
                    <h4 class="mb-2">12000ksh/Day</h4>
                    <div class="d-flex mb-3">
                        <h6 class="mr-2">Rating:</h6>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star-half-alt text-primary mr-1"></small>
                            <small>(250)</small>
                        </div>
                    </div>
                    
                    <div class="d-flex pt-1">
                        <h6>Share on:</h6>
                        <div class="d-inline-flex">
                            <a class="px-2" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="px-2" href=""><i class="fab fa-twitter"></i></a>
                            <a class="px-2" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="px-2" href=""><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-n3 mt-lg-0 pb-4">
                <div class="col-md-3 col-6 mb-2">
                    <i class="fa fa-car text-primary mr-2"></i>
                    <span>Model: 2016</span>
                </div>
                <div class="col-md-3 col-6 mb-2">
                    <i class="fa fa-cogs text-primary mr-2"></i>
                    <span>Automatic</span>
                </div>
                <div class="col-md-3 col-6 mb-2">
                    <i class="fa fa-road text-primary mr-2"></i>
                    <span>25km/liter</span>
                </div>
                <div class="col-md-3 col-6 mb-2">
                    <i class="fa fa-eye text-primary mr-2"></i>
                    <span>GPS Navigation</span>
                </div>
                <div class="col-md-3 col-6 mb-2">
                    <i class="fa fa-eye text-primary mr-2"></i>
                    <span>owned by walter Oloo</span>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Detail End -->


    <!-- Car Booking Start -->

    <form class="" action="" method="post" autocomplete="off">
        <div class="container-fluid pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h2 class="mb-4">Personal Detail</h2>
                        <div class="mb-5">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4"  name="firstname"  placeholder="First Name" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" name="lastname"  placeholder="Last Name" required="required">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="email" class="form-control p-4" name="email"  placeholder="Your Email" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="number" class="form-control p-4"  name="mobilenumber"  placeholder="Mobile Number" required="required">
                                </div>
                            </div>
                        </div>
                        <h2 class="mb-4">Booking Detail</h2>
                        <div class="mb-5">
                            <div class="row">
                            <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4"  name="pickuplocation"  placeholder="pickuplocation" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4"  name="droplocation"  placeholder="droplocation" required="required">
                                </div>
                               
                            </div>
                           
                          
                            <div class="form-group">
                                <textarea class="form-control py-3 px-4" rows="3" name="specialrequest"  placeholder="Special Request" required="required"></textarea>
                            </div>
                            <div class="col-lg-8">
                    <div class="bg-secondary p-5 mb-5">
                        <h2 class="text-primary mb-4">Payment</h2>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5"  name="submit" type="submit">book reservation</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!-- Car Booking End -->
        
    <!-- Car Booking End -->

        <!-- Detail Start -->
        <div class="container-fluid pt-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase mb-5">BMW X5</h1>
            <div class="row align-items-center pb-2">
                <div class="col-lg-6 mb-4">
                    <img class="img-fluid" src="img/car-rent-2.png" alt="">
                </div>
                <div class="col-lg-6 mb-4">
                    <h4 class="mb-2">8,5000ksh/Day</h4>
                    <div class="d-flex mb-3">
                        <h6 class="mr-2">Rating:</h6>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star-half-alt text-primary mr-1"></small>
                            <small>(250)</small>
                        </div>
                    </div>
                    
                    <div class="d-flex pt-1">
                        <h6>Share on:</h6>
                        <div class="d-inline-flex">
                            <a class="px-2" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="px-2" href=""><i class="fab fa-twitter"></i></a>
                            <a class="px-2" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="px-2" href=""><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-n3 mt-lg-0 pb-4">
                <div class="col-md-3 col-6 mb-2">
                    <i class="fa fa-car text-primary mr-2"></i>
                    <span>Model: 2013</span>
                </div>
                <div class="col-md-3 col-6 mb-2">
                    <i class="fa fa-cogs text-primary mr-2"></i>
                    <span>Automatic</span>
                </div>
                <div class="col-md-3 col-6 mb-2">
                    <i class="fa fa-road text-primary mr-2"></i>
                    <span>29km/liter</span>
                </div>
                <div class="col-md-3 col-6 mb-2">
                    <i class="fa fa-eye text-primary mr-2"></i>
                    <span>GPS Navigation</span>
                </div>
                <div class="col-md-3 col-6 mb-2">
                    <i class="fa fa-eye text-primary mr-2"></i>
                    <span>owned by kennedy kithaka</span>
                </div>
                
               
            </div>
        </div>
    </div>
    <!-- Detail End -->


    <!-- Car Booking Start -->

    <form class="" action="" method="post" autocomplete="off">
        <div class="container-fluid pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h2 class="mb-4">Personal Detail</h2>
                        <div class="mb-5">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4"  name="firstname"  placeholder="First Name" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" name="lastname"  placeholder="Last Name" required="required">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="email" class="form-control p-4" name="email"  placeholder="Your Email" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="number" class="form-control p-4"  name="mobilenumber"  placeholder="Mobile Number" required="required">
                                </div>
                            </div>
                        </div>
                        <h2 class="mb-4">Booking Detail</h2>
                        <div class="mb-5">
                            <div class="row">
                            <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4"  name="pickuplocation"  placeholder="pickuplocation" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4"  name="droplocation"  placeholder="droplocation" required="required">
                                </div>
                               
                            </div>
                           
                          
                            <div class="form-group">
                                <textarea class="form-control py-3 px-4" rows="3" name="specialrequest"  placeholder="Special Request" required="required"></textarea>
                            </div>
                            <div class="col-lg-8">
                    <div class="bg-secondary p-5 mb-5">
                        <h2 class="text-primary mb-4">Payment</h2>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5"  name="submit" type="submit">book reservation</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!-- Car Booking End -->
        
    <!-- Car Booking End -->

  
                           
            


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="owl-carousel vendor-carousel">
                <div class="bg-light p-4">
                    <img src="img/vendor-1.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-2.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-3.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-4.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-5.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-6.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-7.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-8.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-secondary py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Get In Touch</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-white mr-3"></i>Kipande Street, Nairobi, Kenya</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-white mr-3"></i>+254741808375</p>
                <p><i class="fa fa-envelope text-white mr-3"></i>royalcars@infoke.com</p>
                <h6 class="text-uppercase text-white py-2">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Usefull Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Private Policy</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Term & Conditions</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>New Member Registration</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Affiliate Programme</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Return & Refund</a>
                    <a class="text-body" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Help & FQAs</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Car Gallery</h4>
                <div class="row mx-n1">
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-2.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-3.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-4.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-5.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-6.jpg" alt=""></a>
                    </div>
                </div>
            </div>
           
              
        </div>
    </div>
    <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">&copy; <a href="#">royalcars</a>. All Rights Reserved.</p>
        <p class="m-0 text-center text-body">Designed by <a href="https://htmlcodex.com">Kithaka css</a></p>
    </div>
    <!-- Footer End -->
    
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>





