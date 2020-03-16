<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>

    <?php include 'Fragments/head.php'; ?>
    <title>About | Eric McWinNEr's World</title>
  </head>
  <body>
    <div class="welcome-banner">
        <?php include 'Fragments/navigation.php';?>
        <span class="errormessage"><span class="float-right pointer">&#10006;</span></span>
        <span class="successmessage"><span class="float-right pointer">&#10006;</span></span>
        <div class="backgroundabout background-container"></div>
        <div class="overlay text-center">
          <span class="helper"></span><div id="verticallyal"><h1 class="bannertext capitalize">Who is eric McWinNEr?</h1><div class="littlemargin"></div><p class="lead capitalize">Get to know who I am besides being a developer</p></div>

        </div>

    </div>
    <div class="first-slide">
      <div class="container">
        <p class="text-center larger init capitalize">A little stuff about me</p>
        <p class="text-center little-margin">I watch a lot of cartoons, anime and sitcoms. I love a hot cup of coffee, my favorite drink is Coke and my favorite snack is a good ol' burger. I'm a huge fan of Jhené Aiko, my favorite sport is table tennis. I play video games a lot, I play drums a little and you'd most probably find me humming or singing to myself. I love learning new things and I love good arguements; I feel we learn a lot through them. You disagree?</p>
      </div>
    </div>
    <div class="whiteslide">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="capitalize init">Some background story</h1>
            <p class="ok capitalize">How it all began...</p>
            <p>I've always had a strong interest in computers since I knew my name is Eric. I've been fascinated by those devices. Wanting to understand how they work and learn more led me to the world of development and I'm happy I got here. I wrote my first line of code in Java when I was 15 and I was barely 17 when I started my career path as a web developer. I love building things and fixing and paying attention to little details. I love hand coding projects and building from scratch; I like knowing the nitty gritty.</p>
          </div>
          <div class="col-md-4 col-md-push-1">
            <img src="Images/about/me.jpg" class="roundimage" alt="me" />
          </div>
        </div>
      </div>
    </div>
    <div class="gotop"><i class="fa fa-2x fa-angle-up"></i></div>
    <?php include 'Fragments/footer.php'; ?>
    <script>
      $(document).ready(function(){
        $('.transparent_navigation .about, .opaque_navigation .about, footer .about').addClass('selected');

      });
    </script>
  </body>

</html>
