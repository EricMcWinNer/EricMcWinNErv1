<?php
session_save_path('../Functions');
session_start();
require('../Functions/mainfunction.php');
require('../Model/cookie.php');
if (isset($_SESSION['me'])) {
    redirect('index.php');
} elseif (isset($_COOKIE['mee'])) {
    redirect('index.php');
}
    ?>
 <!DOCTYPE html>
<html>
  <head>
    <title>Eric's Login</title>
    <?php include 'Partitions/head.php'; ?>
      <style type="text/css">
          p {
              font-family: 'Open Sans', sans-serif;
          }

          .error-alert {
              width: 100%;
              position: absolute;
              top: 0;
              padding: 25px;
              text-align: center;
              border-left: 6px solid lightpink;
              z-index: 1200;
              background-color: indianred;
              margin-bottom: 150px;
              color: white;
          }
      </style>
  </head>
  <body class="login_body">
    <?php
    if (isset($_GET['err'])) {
        $err = $_GET['err'];
        if ($err == 0) {
            echo '<div class="error-alert"><p>Invalid username or password</p></div>';
        } elseif ($err == 1) {
            echo '<div class="error-alert"><p>Something went wrong. Please check your internet connection</p></div>';
        } elseif ($err == 2) {
            echo '<div class="error-alert"><p>Nice try hacker!!!!</p></div>';
        } elseif ($err == 4) {
            if(isset($_GET['src'])){
                echo "<div class=\"error-alert\"><p>".(string)$_GET['src']." field can't be empty or less than 4 characters long</p></div>";
            }
        } elseif ($err == 3) {
            echo '<div class="error-alert"><p>Special characters are not allowed in Username field</p></div>';
        }
    }
    ?>
    <div class="capsule">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
          <div class="white-card">
            <img src="../Images/logo.jpg" class="loginimage">
            <p class="lead poppins little_margin logo__color">Eric McWinNEr's Admin Section</p>
            <p class="open_sans">Enter your login details below to continue</p>
            <form action="controller/login.php" method="post">
              <input type="text" name="username" placeholder="Username">
              <input type="password" name="password" placeholder="Password">
              <div class="input"><p class="open_sans"><span class="stay_signed_in"><input type="checkbox" name="stay" value="I will remain signed in" id="stay_signed_in"><label for="stay_signed_in"></label> &nbsp;Stay signed in</span></p></div>
              <input type="submit" value="Log Me In!">
              <a class="forgot">Forgot Password?</a>
            </form>
          </div>
        </div>
      </div
    </div>

  </body>
</html>
