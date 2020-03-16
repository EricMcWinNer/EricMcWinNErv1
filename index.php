<?php
session_save_path('Functions');
session_start();
$_SESSION['erictoken'] = random_int(000000, 999999);
$token = $_SESSION['erictoken'];
?>
<!DOCTYPE html>
<html>
    <head>
        <!--
        Eric McWinNer's World
        Author: Eric McWinner
        Date: 27/5/2017
        -->
        <title>Home | Eric McWinNer's World</title>
        <?php include 'Partitions/head.php'; ?>
    </head>
    <body>
        <!--HEADER STARTS HERE-->
        <div class="eric-loader">
            <div><img src="Images/logo.jpg" alt="Page is loading" /><p class="loading">Loading<span></span></p></div>

        </div>
        <div class="eric-loading">
            <div class="welcome-banner">

                <?php include 'Partitions/navigation.php'; ?>
                <span class="errormessage"><span class="float-right pointer">&#10006;</span></span>
                <span class="successmessage"><span class="float-right pointer">&#10006;</span></span>
                <div class="em-carousel" id="banner-carousel">
                    <div class="em-item active">
                        <div class="background-container standard"></div>
                        <div class="helper"></div>
                        <div class="content">
                            <span class="helper"></span><ul data-em-delay="6500" data-transitionspeed="000" class="animated"><li class="selected"><h1 class="bannertext">Hello, I'm Eric McWinNEr</h1></li><li><h1 class="bannertext">I am a web Developer</h1></li><li><h1 class="bannertext">I'd <i class="fa fa-heart red" aria-hidden="true"></i> to work with you</h1></li></ul>
                            <span class="helper"></span><p class="lead margin"><span class="wrap dynamic-text"></span></p>
                            <div class="anchormargin"></div>
                            <a class="hireme capitalize text-center contactt" href="#contact">Hire Me</a>
                        </div>
                    </div>

                </div>
            </div>
            <!--HEADER ENDS HERE-->
            <!--FIRST SLIDE STARTS HERE-->
            <div class="first-slide">
                <div class="container">
                    <p class="text-center larger init capitalize">I won't rest until you're satisfied</p>
                    <p class="text-center little-margin">I strongly believe in customer satisfaction. I tailor my workflow to suit my client's needs; being that I can only work with a particular number of clients at a time, I pay attention to every detail and ensure you're happy with your project. I write code because I love what I do and I want to see my creation change the world. I believe in team work and I make sure my client and I are on the same team, that way <strong>WE</strong> can get the most out of your project.</p>
                </div>
            </div>
            <div class="standardmargin"></div>
            <div class="second-slide" id="services">
                <div class="container">
                    <p class="larger text-center init capitalize">What can I do?</p>
                    <p class="text-center ok tiny-margin">I provide high quality services in the following areas:</p>
                    <div class="standardmargin"></div><div class="standardmargin"></div><div class="standardmargin"></div>
                    <div class="row little-margin text-center doo">
                        <div class="col-md-4 col-sm-4 col-xs-4 phone-4 transit text-center slide slideright">
                            <img src="Images/coding.svg" class="service-image text-center" alt="Web design" />
                            <p class="lead poppins tiny-margin capitalize servicetitle">Web Development</p>
                            <p class="">I will build you a unique, attractive, professional and responsive website or web application that suites your need.</p>

                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 phone-4 transit text-center slide slideup">
                            <img src="Images/seo.svg" class="service-image text-center" alt="Web design" />
                            <p class="lead poppins tiny-margin capitalize servicetitle">Search engine Optimization</p>
                            <p class="">I'll get your website enlisted on search engines like Google, Yahoo and Bing which would dramatically increase your traffic.</p>

                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 phone-4 transit text-center slide slideleft">
                            <img src="Images/content.svg" class="service-image text-center" alt="Web design" />
                            <p class="lead poppins tiny-margin capitalize servicetitle">Content Creation</p>
                            <p class="">I'll create mesmerizing write-ups that would keep visitors glued to your page and transform them to long lasting customers.</p>
                        </div>

                    </div>
                    <div class="full-width text-center little-margin">  <a class="little-margin hire lead contactt" href="#contact">Hire Me</a></div>
                </div>
            </div>
            <div class="first-slide" id="about">
                <div class="container">
                    <p class="text-center larger init capitalize">Here's a little stuff about me</p>
                    <p class="text-center little-margin">I watch a lot of cartoons, anime and sitcoms. I love a hot cup of coffee, my favorite drink is Coke and my favorite snack is a good ol' burger. I'm a huge fan of Jhené Aiko and Jon Bellion, my favorite sport is table tennis. I love to play video games, I play drums a little and you'd most probably find me humming or singing to myself. I'm a 400 level student studying Electronics and Computer Technology in UNICAL. I love learning new things and I love good arguments; I feel we learn a lot through them. You disagree?</p>
                </div>
            </div>
            <div class="whiteslide">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <p class="capitalize larger init">Some background story</p>
                            <p class="ok capitalize">How it all began...</p>
                            <p>I've always had a strong interest in computers since I knew my name is Eric. I've been fascinated by those devices. Wanting to understand how they work and learn more led me to the world of development and I'm happy I got here. I wrote my first line of code in Java when I was 15 and I was barely 17 when I started my career path as a web developer. I love building things and fixing and paying attention to little details. I love hand coding projects and building from scratch; I like knowing the nitty gritty.</p>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <img src="Images/about/mev1.jpg" class="roundimage rotatein" alt="me" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="third-slide" id="portfolio">
                <div class="container">
                    <p class="larger text-center init white capitalize">What have I done?</p>
                    <p class="text-center ok">Here's a sneak-peek of a few projects I've handled so far...</p>
                    <div class="row little-margin nophonemargin">
                        <div class="little-margin"></div>
                        <div class="col-md-6 col-sm-6 col-xs-6 phone-6 slide slidedown">
                            <div id="tiltleft" class="portfoliocard-container">
                                <a href="imperialgreenville/" target="_blank"><img src="Images/portfolio/portfolio8.jpg" alt="Imperial Games Ville" class="portfolio-image left" /></a>
                                <!--<div class="text-div">
                                  <span>Impressive Games Ville</span>
                                </div>-->
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 phone-6 slide slidedown">
                            <div id="tiltright" class="portfoliocard-container">
                                <a href="opencharity/" target="_blank"><img src="Images/portfolio/portfolio9.jpg" alt="Open Charity" class="portfolio-image right" /></a>
                                <!--<div class="text-div">
                                  <span>Pandora Makeup Shop</span>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="lastrowmargin"></div>
                    <div class="row topupmarginn">

                        <div class="col-md-6 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-sm-6 col-xs-6 phone-6 slide slideup">
                            <div id="tiltZ" class="portfoliocard-container">
                                <a href="GeeksLabelV2/" target="_blank"><img src="Images/portfolio/portfolio6.png" alt="Calabar Marathon" class="portfolio-image left" /></a>
                                <!--<div class="text-div">
                                  <span>Impressive Games Ville</span>
                                </div>-->
                            </div>
                        </div>

                    </div>
                    <div class="text-center full-width humongaous-margin"><p class="text-center ok"><span class="red">*</span> If you want to see more of my work, drop a <a href="#contact" style="color:#f9f9f9;text-decoration: underline" class="contactt">message</a></p></div>
                </div>
            </div>
            <div class="why-slide">
                <div class="container">
                    <p class="larger text-center init capitalize">Why should we work together?</p>
                    <p class="ok text-center">Well, here's why...</p>
                    <div class="row little-margin">
                        <div class="col-md-3 col-sm-4 col-xs-12 percentage">
                            <p><img src="Images/htmllogo.png" alt="HTML" class="proress_icons"/>HTML</p>
                            <div class="proress_div" id="html"><div class="proress html "><span data-start="0" class="incrementpercent" data-end="91"></span></div></div>
                            <p><img src="Images/csslogofirst.png" alt="CSS" class="proress_icons"/> CSS</p>
                            <div class="proress_div" id="css"><div class="proress css "><span class="incrementpercent" data-start="0" data-end="87"></span></div></div>
                            <p><img src="Images/javascriptlogo.png" alt="Javascript" class="proress_icons"/> &nbsp;Javascript</p>
                            <div class="proress_div" id="js"><div class="proress javascript "><span class="incrementpercent" data-start="0" data-end="80"></span></div></div>
                            <p><img src="Images/phplogo.png" alt="PHP" class="proress_icons"/> PHP</p>
                            <div class="proress_div" id="php"><div class="proress php "><span class="incrementpercent" data-start="0" data-end="77"></span></div></div>
                            <p><img src="Images/sql-database.png" alt="SQL" class="proress_icons"/> &nbsp;SQL</p>
                            <div class="proress_div" id="sql"><div class="proress sql "><span class="incrementpercent" data-start="0" data-end="70"></span></div></div>
                            <p><img src="Images/javalogo.jpg" alt="Java" class="proress_icons"/> &nbsp;Java</p>
                            <div class="proress_div" id="java"><div class="proress java "><span class="incrementpercent" data-start="0" data-end="47"></span></div></div>
                            <p class="poppins"><span class="red">*</span> I don't exaggerate my abilities. There's really no point...</p>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-1">
                            <ul class="reasons">
                                <li><p>Your satisfaction is my priority. I won't rest until you're completely satisfied with my services.</p></li>
                                <li><p>I tailor my work-flow to suit your needs. Meaning your project gets the special attention it deserves.</p></li>
                                <li><p>I deliver promptly and pay attention to my client's business and special requirements</p></li>
                                <li><p>I don't toy with the quality of my services. I always ensure you are happy with my services</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="fourth-slide" id="blog">
              <div class="container">
                <p class="larger text-center init white capitalize">What have I been posting?</p>
                <p class="ok white text-center">Here's a few of the latest posts from my blog...</p>
                <div class="row little-margin ghost">
                  <div class="little-margin"></div>
                  <div class="col-md-3 col-sm-3 col-xs-6 phone-6 addmargin">
                    <div class="portfoliocard-container">
                        <div class="text-div">
                        <span class="uppercase">jun 01, 2017</span>
                        <p class="lead capitalize" style="vertical-align:middle">Top 10 Fonts for beautiful paragraphs on websites.</p>
                        <a class="capitalize" href="#">Read more <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-6 phone-6 addmargin">
                    <div class="portfoliocard-container">
                      <div class="text-div">
                        <span class="uppercase">mar 15, 2017</span>
                        <p class="lead capitalize" style="vertical-align:middle">Building your first HTML animation with CSS3.</p>
                        <a class="capitalize" href="#">Read more <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-6 phone-6 addmargin">
                    <div class="portfoliocard-container">
                      <div class="text-div">
                        <span class="uppercase">jan 17, 2017</span>
                        <p class="lead capitalize" style="vertical-align:middle">CMS or Hand coding, which is better?</p>
                        <a class="capitalize" href="#"> Read more <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-6 phone-6 addmargin">
                    <div class="portfoliocard-container">
                      <div class="text-div">
                        <span class="uppercase">nov 17, 2016</span>
                        <p class="lead capitalize" style="vertical-align:middle">Just turned 18. Most lit day of my life yet...</p>
                        <a class="capitalize" href="#">Read more <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                      </div>
                    </div>
                </div>
              </div>
                <div class="text-center full-width anchormargin"><a class="viewmore white capitalize lead" href="tel:090">Check out my blog</a></div>        </div>
            </div>-->
            <!--FIRST SLIDE ENDS HERE-->
        </div>
        <div class="gotop"><i class="fa fa-2x fa-angle-up"></i></div>
            <?php include 'Partitions/footer.php'; ?>
        <script>
            $('.transparent_navigation .home, .opaque_navigation .home, footer .home').addClass('selected');
        </script>
    </body>
</html>
