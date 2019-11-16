<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Melroy Distributors Ltd</title>
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
    <link rel="stylesheet" href="https://bootstrapmade.com/demo/assets/css/normalize.css">
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/Medilab/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/Medilab/css/style.css')}}">
    
    <style>
        
        a {
            text-decoration: none;
            color: white;
        }
    
    </style>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<!--banner-->
<section id="banner" class="banner">
    <div class="bg-color"
         style="
                 background-image:url('{{asset("/images/site-images/homepage-image-grey.jpg")}}'); background-blend-mode:;">
        <nav class="navbar navbar-expand-md navbar-fixed-top" style="background-color: rgb(0, 131, 143); color:white;">
            <div class="container">
                <div class="col-md-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
    
                        <a class="navbar-brand ml-5" href="{{ url('/') }}" style="color: white; font-weight: bolder;">
                            
                            <h2 style="color:white;">{{ config('app.king', 'MDL') }}</h2>
                        </a>
                    </div>
                    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                        <ul class="nav navbar-nav" style="color:white;">
                            <li class="active"><a href="#banner">Home</a></li>
                            <li class=""><a href="/login">Login</a></li>
                            <li class=""><a href="/register">Register</a></li>
                            <li class=""><a href="/store">Store</a></li>
                            <li class="nav-item"><a class="nav-link" style="color: white;" href="/#service">Services</a></li>
                            <li class="nav-item"><a class="nav-link" style="color: white;" href="/#testimonial">Testimonial</a></li>
                            <li class="nav-item"><a class="nav-link" style="color: white;" href="/#about-us">About</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="banner-info">
                    <div class="banner-logo text-center">
                    </div>
                    <div class="banner-text text-center">
                        <h1 class="white">Melroy Distributors Limited</h1>
                        <p>Quality Hardware Store</p>
                        <a href="/store" class="btn btn-appoint">Visit Store</a>
                        <a href="/login" class="btn btn-appoint">Login</a>
                        <a href="/register" class="btn btn-appoint">Register</a>

                    </div>
                    <div class="overlay-detail text-center">
                        <a href="#service"><i class="fa fa-angle-down"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ banner-->
<!--service-->
<section id="service" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <h2 class="ser-title">Our Service</h2>
                <hr class="botm-line">
                <p>We provide quality hardware materials and equipment for your needs</p>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="service-info">
                    <div class="icon">
                        {{--<i class="fa fa-truck"></i>--}}
                    </div>
                    <div class="icon-info">
                        <h4>7 days a week delivery</h4>
                        <p>Customer satisfaction is at our core, so we deliver to you 7 days a week</p>
                    </div>
                </div>
                <div class="service-info">
                    <div class="icon">
                        {{--<i class="fa fa-ambulance"></i>--}}
                    </div>
                    <div class="icon-info">
                        <h4>Raw Materials</h4>
                        <p>We have raw materials such as lumnber</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="service-info">
                    <div class="icon">
                        {{--<i class="fas fa-shovel"></i>--}}
                    </div>
                    <div class="icon-info">
                        <h4>All your equipment needs</h4>
                        <p>We have a variety of equipment</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ service-->
<!--cta-->
<section id="cta-1" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="schedule-tab">
                
                <div class="col-md-12 col-sm-12 mt-boxy-3">
                    <div class="mt-boxy-color"></div>
                    <div class="time-info">
                        <h3>Opening Hours</h3>
                        <table style="margin: 8px 0px 0px;" >
                            <tbody>
                            <tr>
                                <td>Monday - Friday</td>
                                <td>8.00 - 17.00</td>
                            </tr>
                            <tr>
                                <td>Saturday</td>
                                <td>9.30 - 17.30</td>
                            </tr>
                            <tr>
                                <td>Sunday</td>
                                <td>9.30 - 15.00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--cta-->
<!--about-->


<!--testimonial-->
<section id="testimonial" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="ser-title">see what customer are saying?</h2>
                <hr class="botm-line">
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="testi-details">
                    <!-- Paragraph -->
                    <p>MDL has fast delivery service.</p>
                </div>
                <div class="testi-info">
                    <!-- User Image -->
                    <a href="#"><img src="img/thumb.png" alt="" class="img-responsive"></a>
                    <!-- User Name -->
                    <h3>Ackeem<span>Spanish</span></h3>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="testi-details">
                    <!-- Paragraph -->
                    <p>They had all equipment needed.</p>
                </div>
                <div class="testi-info">
                    <!-- User Image -->
                    <a href="#"><img src="img/thumb.png" alt="" class="img-responsive"></a>
                    <!-- User Name -->
                    <h3>Shelly<span>Papine</span></h3>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="testi-details">
                    <!-- Paragraph -->
                    <p>Their customer service is top quality. Very friendly people.</p>
                </div>
                <div class="testi-info">
                    <!-- User Image -->
                    <a href="#"><img src="img/thumb.png" alt="" class="img-responsive"></a>
                    <!-- User Name -->
                    <h3>Sabrina<span>Texas</span></h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ testimonial-->
<!--cta 2-->
<section id="cta-2" class="section-padding">
    <div class="container">
        <div class=" row">
            <div class="col-md-2"></div>
            <div class="text-right-md col-md-4 col-sm-4">
                <h2 class="section-title white lg-line">« A few words<br> about us »</h2>
            </div>
            <div class="col-md-4 col-sm-5"  id="about-us">
              Given our customers more than they expect, is the motto that we live by. We are more than a hardware store, we are one big family!
                <p class="text-right text-primary"><i>— Melroy Griffiths</i></p>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>
<!--cta-->
<!--/ contact-->
<!--footer-->
<footer id="footer">
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 marb20">
                    <div class="ftr-tle">
                        <h4 class="white no-padding">About Us</h4>
                    </div>
                    <div class="info-sec">
                        <p>We have over 30 years experience in the hardware industry.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 marb20">
                    <div class="ftr-tle">
                        <h4 class="white no-padding">Quick Links</h4>
                    </div>
                    <div class="info-sec">
                        <ul class="quick-info">
                            <li><a href="#banner"><i class="fa fa-circle"></i>Home</a></li>
                            <li><a href="#service"><i class="fa fa-circle"></i>Service</a></li>
                            <li><a href="/login"><i class="fa fa-circle"></i>Login</a></li>
                            <li><a href="/register"><i class="fa fa-circle"></i>Register</a></li>
                            <li><a href="/store"><i class="fa fa-circle"></i>Store</a></li>
                        </ul>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
    <div class="footer-line">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    © Copyright MDL. All Rights Reserved
                
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/ footer-->

<script src="{{asset('js/Medilab/js/jquery.min.js')}}"></script>
<script src="{{asset('js/Medilab/js/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/Medilab/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/Medilab/js/bootstrap.min.js')}}"></script>
<script src="contactform/contactform.js"></script>

</body>

</html>
