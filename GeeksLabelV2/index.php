<!DOCTYPE html>
<html lang="en-us">
<!--
  * Geek Label's Markup for Compucorp
  *
  * Built by Eric Aprioku AKA Eric McwinNEr
  *
  * 13-07-2017
  -->
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Geeks Label | Home</title>
    <link href="https://fonts.googleapis.com/css?family=PT+Sans|Zilla+Slab" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="CSS/lightslider.min.css" />
    <link href="CSS/styles.css" type="text/css" rel="stylesheet" />
    <link href="CSS/responsive.css" type="text/css" rel="stylesheet" />
    <script src="JS/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/e0ed9c2094.js"></script>
    <script src="JS/lightslider.min.js"></script>
    <script src="JS/scripts.js"></script>
    <script src="JS/responsive.js"></script>
  </head>
  <body>
    <div id="first-slide">
      <div class="container">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 text-center logocontainer">
          <img src="Images/logo.png" id="logo" alt="Logo" />
          <p>A team of self confessed geeks who are all about great digital design</p>
        </div>
      </div>
      <div class="bottom-scroll"><a href="#" class="bottom"><img class="godown" alt="Go Down" src="Images/godown.png" /></a></div>
    </div>
    <div id="second-slide" class="greyslide">
      <div class="container">
        <div class="col-md-8 col-md-offset-2 text-center greyslidecol">
          <img src="Images/cantbuild.png" alt="Can't build" class="illustration" />
          <p>Some agencies love <span>design</span>, but don't know how to build</p>
        </div>
      </div>
      <div class="bottom-scroll"><a href="#" class="bottom"><img class="godown" alt="Go Down" src="Images/pink-ish_godown.png" /></a></div>
    </div>
    <div id="third-slide" class="greyslide">
      <div class="container">
        <div class="col-md-8 col-md-offset-2 text-center greyslidecol">
          <img src="Images/cantdesign.png" alt="Can't design" class="illustration" />
          <p>Some agencies know how to <span>build</span> but can't do design</p>
        </div>
      </div>
      <div class="bottom-scroll"><a href="#" class="bottom"><img class="godown" alt="Go Down" src="Images/pink-ish_godown.png" /></a></div>
    </div>
    <div id="fourth-slide" class="greyslide">
      <div class="container">
        <div class="col-md-8 col-md-offset-2 text-center greyslidecol">
          <img src="Images/loveboth.png" alt="Can't build" class="illustration" />
          <p>We love <span>both</span></p>
        </div>
      </div>
      <div class="bottom-scroll"><a href="#" class="bottom"><img class="godown" src="Images/pink-ish_godown.png" /></a></div>
    </div>
    <div id="fifth-slide" class="whiteslide">

      <div class="container">
        <p class="title text-center">Services</p>
        <div class="row text-center servicerow">
          <div class="col-md-3 col-sm-3 col-xs-3">
            <img class="serviceicons" src="Images/webdevelopment.png" alt="Web Develpment" />
            <p>Web Development</p>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-3">
            <img class="serviceicons" src="Images/design.png" alt="Design" />
            <p>Design</p>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-3">
            <img class="serviceicons" src="Images/branding.png" alt="Branding" />
            <p>Branding</p>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-3">
            <img class="serviceicons" src="Images/uxresearch.png" alt="UX Research" />
            <p>UX Research</p>
          </div>
        </div>
      </div>
      <div class="bottom-scroll"><a href="#" class="bottom"><img class="godown black" alt="Go Down" src="Images/godown.png" /></a></div>
    </div>
    <div id="sixth-slide" class="greyslide">
      <div class="container">
        <p class="title text-center">Clients</p>
        <div class="row text-center">
          <ul id="lightSlider">
            <li><img src="Images/thephotographersociety.png" alt="The Photographers' Society" class="clientlogos" /></li>
            <li><img src="Images/thevegansociety.png" alt="The Vegan Society" class="clientlogos" /></li>
            <li><img src="Images/PSHEAssociation.png" alt="PSHE Association" class="clientlogos" /></li>
          </ul>
          <a href="#" class="buttoncontrol" id="prevbutton"><i class="fa fa-angle-left"></i></a>
          <a href="#" class="buttoncontrol" id="nextbutton"><i class="fa fa-angle-right"></i></a>
        </div>
      </div>
      <div class="bottom-scroll"><a href="#" class="bottom"><img class="godown black" alt="Go Down" src="Images/godown.png" /></a></div>
    </div>
    <div id="seventh-slide" class="greyslide">
      <div class="container-fluid">
        <p class="title text-center"><span class="visible-md-inline visible-lg-inline hidden-sm hidden-xs">How to f</span><span class="hidden-md hidden-lg visible-sm-inline visible-xs-inline">F</span>ind us</p>
        <div class="full-width" id="responsivewidth"><img src="Images/pleasefindusASAPlol.png" id="findus" alt="Map" /></div>
      </div>
      <div class="bottom-scroll"><a href="#" class="bottom"><img class="godown" src="Images/pink-ish_godown.png" /></a></div>
    </div>
    <div id="last-slide" class="greyslide">
      <div class="container">
        <p class="title text-center">Contact</p>
        <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center">
            <div class="eric-form">
              <form method="post" action="someaction.php">
                <input type="input" class="ericfield" placeholder="Name" />
                <input type="email" class="ericfield" placeholder="Email" />
                <textarea class="ericfield ericarea" placeholder="Message"></textarea>
                <input type="submit" name="somename" value="Send Message!" class="ericfield ericsubmit" />
              </form>
              <p class="phonelargescreen visible-block-md visible-block-lg hidden-xs hidden-sm">Or phone on: 01923 220121</p>
              <p class="phonesmallscreen hidden-md hidden-lg visible-block-sm visible-block-sm"><i class="fa fa-phone" aria-hidden="true"></i> 01923 220121</p>
              <p class="phonesmallscreen hidden-md hidden-lg visible-block-sm visible-block-sm"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@compucorp.co.uk</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
