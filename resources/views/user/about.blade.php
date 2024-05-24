<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    @vite('resources/css/app.css')


    <title>HomePage</title>

    @include("user.css")

</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->



@include("user.navbar")



<!-- Page Content -->
<div class="page-heading about-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>about us</h4>
                    <h2>our company</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="best-features about-features">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Our Background</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-image">
                    <img src="assets/images/feature-image.jpg" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="left-content">
                    <h4>Who we are &amp; What we do?</h4>
                    <p>At Bubble Me Bubble Tea, we are passionate about bringing joy and refreshment to our community through the delightful experience of bubble tea. Founded with a love for this unique beverage, we are dedicated to crafting the perfect cup for every customer who walks through our doors. Our team is made up of bubble tea enthusiasts who believe in the magic of high-quality ingredients and exceptional customer service.
                        <br><br>
                        We strive to create a welcoming environment where our customers can relax and enjoy their bubble tea experience. Whether you're a long-time fan or a first-time visitor, our friendly staff is always ready to guide you through our menu and help you find your perfect drink. At Bubble Me Bubble Tea, we believe in the power of a great beverage to bring people together and create lasting memories.</p>
                    <ul class="social-icons">
                        <li><a href="https://www.instagram.com/bubblemebubbletea/?hl=en"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://www.facebook.com/bubblemebubbletea/"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-tiktok"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="team-members">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Our Team Members</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-member">
                    <div class="thumb-container">
                        <img src="assets/images/team_01.jpg" alt="">
                        <div class="hover-effect">
                            <div class="hover-content">
                                <ul class="social-icons">
                                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="down-content">
                        <h4>Sheedh Mashood</h4>
                        <span>Developer</span>
                        <p>An ambitious undergraduate at APIIT Colombo, Sri Lanka, specializing in software development and passionate about creating innovative tech solutions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="services">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="service-item">
                    <div class="icon">
                        <i class="fa fa-cube"></i>
                    </div>
                    <div class="down-content">
                        <h4>Product Management</h4>
                        <p>We prioritize meticulous product management to ensure every bubble tea flavor we offer meets our high standards of quality and taste.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item">
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                    </div>
                    <div class="down-content">
                        <h4>Customer Relations</h4>
                        <p>Our dedicated team excels in customer relations, striving to create a welcoming atmosphere and ensuring every visitor has a delightful experience.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item">
                    <div class="icon">
                        <i class="fa fa-globe"></i>
                    </div>
                    <div class="down-content">
                        <h4>Global Collection</h4>
                        <p>Our menu features a global collection of bubble tea flavors, inspired by diverse tastes and traditions from around the world.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="happy-clients">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Happy Partners</h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="owl-clients owl-carousel">
                    <div class="client-item">
                        <img src="assets/images/client-01.png" alt="1">
                    </div>

                    <div class="client-item">
                        <img src="assets/images/client-01.png" alt="2">
                    </div>

                    <div class="client-item">
                        <img src="assets/images/client-01.png" alt="3">
                    </div>

                    <div class="client-item">
                        <img src="assets/images/client-01.png" alt="4">
                    </div>

                    <div class="client-item">
                        <img src="assets/images/client-01.png" alt="5">
                    </div>

                    <div class="client-item">
                        <img src="assets/images/client-01.png" alt="6">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@include("user.footer")





@include('user.script')





</body>

</html>
