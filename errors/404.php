<?php
  require('../Functions/config.php');
  $message = array('Sorry that isn\'t here',
                  'Welcome to the null void...',
                   'You\'ve found nothing...Sorry sir.',
                  'I couldn\'t find what you were looking for M\'kay?',);
  $random = rand(0, 3);
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $title['404']; ?></title>
      <meta charset="utf-8">
        <?php include 'Partitions/head.php';?>
  </head>
  <body>
    <div class="background_image">
        <div class="top_right">
            <p>You made it to the null void...;)</p>
        </div>
        <div class="vertical_align">
            <div class="main_content">
                <img src="Images/logo.jpg" alt="Eric's logo" class="logo">
                <h1><?php echo $message[$random]; ?></h1>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <p>What you were looking for isn't currently at this address. It's either it's been moved, it never existed, I made an honest mistake in my code, you made a mistake in your search, or you were just looking for this error page (in which case KUDOS! You Found it!). If the problem persists, just <a href="index.php#contact">write</a> to me.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="full-width">
            <a href="index.php"><i class="fa fa-home"></i> Go back to Eric McWinNEr</a>
        </div>
    </div>
  </body>
</html>
