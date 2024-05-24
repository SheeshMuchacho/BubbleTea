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
<div class="page-heading contact-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>contact us</h4>
                    <h2>let’s get in touch</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="find-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Our Location on Maps</h2>
                </div>
            </div>
            <div class="col-md-8">
                <!-- How to change your own map point
                    1. Go to Google Maps
                    2. Click on your location point
                    3. Click "Share" and choose "Embed map" tab
                    4. Copy only URL and paste it within the src="" field below
                -->
                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.99446459762!2d79.8668132!3d6.8912644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25bd10fa40eb5%3A0xa5985a816be5cb1!2sBubble%20Me%20Bubble%20Tea!5e0!3m2!1sen!2slk!4v1716467957906!5m2!1sen!2slk" width="100%" height="330px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-4">
                <div class="left-content">
                    <h4>About our office</h4>
                    <p>Welcome to Bubble Me Bubble Tea, your premier destination for the finest bubble tea experience in Colombo. Nestled in the heart of the city at 106 Thimbirigasyaya Rd, Colombo 00500, our office is not just a place of business, but a vibrant hub where creativity, quality, and passion for bubble tea converge.
                        <br><br>
                        Located at a prime spot in Colombo, our office is easily accessible and surrounded by a vibrant community. Whether you're visiting us for a business meeting, a casual hangout, or simply to grab your favorite bubble tea, you'll find our location convenient and inviting.</p>
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


<div class="send-message">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Send us a Message</h2>
                </div>
            </div>
            <div class="col-md-8">
                <div class="contact-form">

                    <form id="contact" action="{{ url('contactform') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email" placeholder="E-Mail Address" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset class="d-flex align-items-center">
                                    <select name="message_type" class="form-control" id="message_type" required="">
                                        <option value="compliment">Compliment</option>
                                        <option value="complaint">Complaint</option>
                                        <option value="suggestion">Suggestion</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-md-4">
                <ul class="accordion">
                    <li>
                        <a>Feedback</a>
                        <div class="content">
                            <p>We at Bubble Me Bubble Tea value your feedback and inquiries. Whether you have a question about our menu, need assistance with an order, or simply want to share your bubble tea experience, we are here to listen.</p>
                        </div>
                    </li>
                    <li>
                        <a>Community Engagement</a>
                        <div class="content">
                            <p>We believe in giving back to the community that has supported us from the beginning. Bubble Me Bubble Tea actively participates in local events, supports charitable causes, and collaborates with nearby businesses to foster a sense of togetherness</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>





@include("user.footer")





@include('user.script')





</body>

</html>
