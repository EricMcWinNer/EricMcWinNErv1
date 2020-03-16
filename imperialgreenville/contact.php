<?php
  session_save_path('../Functions');
  session_start();
  $_SESSION['ericimperialtoken'] = random_int(000000, 999999);
  $token = $_SESSION['ericimperialtoken'];
?>
<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<head>

  <!-- Basic -->
  <title>Platinum Funworld | Contact</title>

  <!-- Define Charset -->
  <meta charset="utf-8">

  <!-- Responsive Metatag -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Page Description and Author -->
  <meta name="description" content="Margo - Responsive HTML5 Template">
  <meta name="author" content="iThemesLab">

  <!--Favicon-->
  <link rel="icon" href="images/gamepad.svg" type="image/x-icon" />

  <!-- Bootstrap CSS  -->
  <link rel="stylesheet" href="asset/css/bootstrap.min.css" type="text/css" media="screen">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen">

  <!-- Slicknav -->
  <link rel="stylesheet" type="text/css" href="css/slicknav.css" media="screen">

  <!-- Margo CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

  <!-- Responsive CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">

  <!-- Color CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="css/colors/weirdshit.css" title="weirdshit" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/mcwinnercss.css" />

  <!-- Margo JS  -->
  <script type="text/javascript" src="../JS/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/jquery.migrate.js"></script>
  <script type="text/javascript" src="js/modernizrr.js"></script>
  <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.fitvids.js"></script>
  <script type="text/javascript" src="js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="js/nivo-lightbox.min.js"></script>
  <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="js/jquery.appear.js"></script>
  <script type="text/javascript" src="js/count-to.js"></script>
  <script type="text/javascript" src="js/jquery.textillate.js"></script>
  <script type="text/javascript" src="js/jquery.lettering.js"></script>
  <script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
  <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
  <script type="text/javascript" src="js/jquery.parallax.js"></script>
  <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
  <script type="text/javascript" src="js/jquery.slicknav.js"></script>
  <script type="text/javascript" src="js/mcwinnerjs.js"></script>
  <script type="text/javascript" src="../JS/submitmail.js"></script>


  <!--[if IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>

<body>
  <div id="mcwinnerloader">
    <div class="rotating">
      <span class="helper"></span>
      <img src="images/gamepad.svg" class="rotater text-align" />
      <div class="hidden" id="hidden" data-valueey="<?php echo $token; ?>"></div>
    </div>
  </div>
  <div class="loading">
    <span class="errormessage"><span class="float-right pointer">&#10006;</span></span>
    <span class="successmessage"><span class="float-right pointer">&#10006;</span></span>
    <div class="mcwinnernavigation">
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="index.html"><img src="images/gamepad.svg" class="logo" /></a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a class="selected" href="contact.php">Contact</a></li>
      </ul>
    </div>
    <nav class="navbar emobile navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="images/gamepad.svg" class="brandimage" /></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li class="active"><a href="gallery.html">Gallery</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>

        </div>
      </div>
    </nav>
    <!-- Container -->
    <div id="container">

      <!-- Start Header -->
      <div class="hidden-header"></div>
      <header class="clearfix">

        <!-- Start Header ( Logo & Naviagtion ) -->

      </header>
      <!-- End Header -->

      <!-- Start Map -->
      <div class="page-banner contact">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1039.798147063326!2d8.338372548221896!3d4.949549476260621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbf5f22765a37544c!2sMr+Fans!5e0!3m2!1sen!2sng!4v1469405594979" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        <div class="banneroverlay">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="parent">
                  <div class="child text-center left">
                    <h2>Hey, drop a  <span class="aboutspan">Message</span></h2>
                    <p class="capitalize">We'll play with you but we'll never play with you...</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 right-text">
                <div class="parent">
                  <div class="child right">
                    <ul class="breadcrumbs">
                      <li><a href="index.html">Home</a></li>
                      <li>Contact</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Map -->

      <!-- Start Content -->
      <div id="content">
        <div class="container">

          <div class="row">

            <div class="col-md-8">

              <!-- Classic Heading -->
              <h4 class="classic-title"><span>Contact Us</span></h4>

              <!-- Start Contact Form -->
              <form action="" id="contactform" method="post">
                <div class="form-group">
                  <div class="controls">
                    <input type="text" placeholder="First Name" name="firstname" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="controls">
                    <input type="text" placeholder="Last Name" name="lastname" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="controls">
                    <input type="text" placeholder="Phone Number" name="number" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="controls">
                    <input type="email" class="email" placeholder="Email" name="email" required>
                  </div>
                </div>
                <div class="form-group">

                  <div class="controls">
                    <textarea rows="7" placeholder="Message" name="message" required></textarea>
                  </div>
                </div>
                  <button id="sendmessage" class="btn-system btn-large">Send</button>
                <div id="messageloader"></div>
              </form>
              <!-- End Contact Form -->

            </div>

            <div class="col-md-4">

              <!-- Classic Heading -->
              <h4 class="classic-title"><span>Information</span></h4>

              <!-- Some Info -->
              <p>Please remember the gameville isn't real and the pictures aren't mine. Messages sent via this contact form will be sent to me (Eric McwinNEr)</p>

              <!-- Divider -->
              <div class="hr1" style="margin-bottom:10px;"></div>

              <!-- Info - Icons List -->
              <ul class="icons-list">
                <li><i class="fa fa-globe">  </i> <strong>Disclaimer:</strong> &nbsp;This website was built to test my skills and show my abilities. If you own any pictures used on this website and you want it taken down, just let me know via the contact
                  form with proof and I'll take it down.</li>
                <li><i class="fa fa-envelope-o"></i> <strong>Email:</strong> malfuoy@gmail.com</li>
                <li><i class="fa fa-mobile"></i> <strong>Phone:</strong> +234 811 454 6067</li>
              </ul>

              <!-- Divider
            <div class="hr1" style="margin-bottom:15px;"></div>
            -->
              <!-- Classic Heading
            <h4 class="classic-title"><span>Working Hours</span></h4>
            -->
              <!-- Info - List
            <ul class="list-unstyled">
              <li><strong>Monday - Friday</strong> - 9am to 5pm</li>
              <li><strong>Saturday</strong> - 9am to 2pm</li>
              <li><strong>Sunday</strong> - Closed</li>
            </ul>
            -->
            </div>

          </div>

        </div>
      </div>
      <!-- End content -->


      <!-- Start Footer Section -->
      <footer>
        <div class="container">
          <div class="row footer-widgets">


            <!-- Start Subscribe & Social Links Widget -->
            <div class="col-md-3 col-xs-12">
              <div class="footer-widget mail-subscribe-widget">
                <h4>Get in touch<span class="head-line"></span></h4>
                <p>Join our mailing list to stay up to date and get notices about our new releases!</p>
                <form class="subscribe">
                  <input type="text" placeholder="mail@example.com">
                  <input type="submit" class="btn-system" value="Send">
                </form>
              </div>
              <div class="footer-widget social-widget">
                <h4>Follow Us<span class="head-line"></span></h4>
                <ul class="social-icons">
                  <li>
                    <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                  </li>
                  <li>
                    <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                  </li>
                  <li>
                    <a class="google" href="#"><i class="fa fa-google-plus"></i></a>
                  </li>
                  <li>
                    <a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a>
                  </li>
                  <li>
                    <a class="linkdin" href="#"><i class="fa fa-linkedin"></i></a>
                  </li>
                  <li>
                    <a class="flickr" href="#"><i class="fa fa-flickr"></i></a>
                  </li>
                  <li>
                    <a class="tumblr" href="#"><i class="fa fa-tumblr"></i></a>
                  </li>
                  <li>
                    <a class="instgram" href="#"><i class="fa fa-instagram"></i></a>
                  </li>
                  <li>
                    <a class="vimeo" href="#"><i class="fa fa-vimeo-square"></i></a>
                  </li>
                  <li>
                    <a class="skype" href="#"><i class="fa fa-skype"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- .col-md-3 -->
            <!-- End Subscribe & Social Links Widget -->


            <!-- Start Twitter Widget -->
            <div class="col-md-6 hidden-xs">
              <div class="footterLogo">
                <img src="images/gamepad.svg" width="300px" height="300px" style=" border-radius: 10%;">
              </div>
            </div>
            <!-- .col-md-3 -->
            <!-- End Twitter Widget -->



            <!-- Start Contact Widget -->
            <div class="col-md-3 col-xs-12">
              <div class="footer-widget contactinfo contact-widget">
                <h4>Platinum Funworld</h4>
                <p>Welcome to Platinum Funworld, a website built for an imaginary arcade shop by me and my gees at Xyneex. If you like it and you'd like something cool like this for your brand, don't hesitate to give me a message with my email or my website.
                  Cha-cha.</p>
                <ul>
                  <li><span>Phone Number:</span> <a href="tel:08114546067">08114546067</a></li>
                  <li><span>Email:</span> <a href="mailto:malfuoy@gmail.com">malfuoy@gmail.com</a></li>
                  <li><span>Website:</span> <a href="ericmcwinner.epizy.com">ericmcwinner.epizy.com</a></li>
                  <li><span>Xyneex Website:</span> <a href="www.xyneex.com">www.xyneex.com</a></li>

                </ul>
              </div>
            </div>
            <!-- .col-md-3 -->
            <!-- End Contact Widget -->


          </div>
          <!-- .row -->

          <!-- Start Copyright -->
          <div class="copyright-section">
            <div class="row">
              <div class="col-md-6">
                <p>&copy; 2014 Platinum Funworld - All Rights Reserved </p>
              </div>
              <!-- .col-md-6 -->
              <div class="col-md-6">
                <ul class="footer-nav">
                  <li><a href="#">Privacy Policy</a>
                  </li>
                  <li><a href="#">Contact</a>
                  </li>
                </ul>
              </div>
              <!-- .col-md-6 -->
            </div>
            <!-- .row -->
          </div>
          <!-- End Copyright -->

        </div>
      </footer>
      <!-- End Footer Section -->
    </div>
  </div>
  <!-- End Container -->

  <!-- Go To Top Link -->
  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- Style Switcher -->


  <script type="text/javascript" src="js/script.js"></script>

  <script type="text/javascript">
    //Contact Form
/*
    $('#submit').click(function() {

      $.post("php/send.php", $(".contact-form").serialize(), function(response) {
        $('#success').html(response);
      });
      return false;

    });*/
  </script>

</body>

</html>
