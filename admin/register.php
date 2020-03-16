<?php
session_save_path('../Functions');
session_start();
require('../Functions/mainfunction.php');
if (isset($_SESSION['me'])) {
    redirect('index.php');
} elseif (isset($_COOKIE['mee'])) {
    redirect('index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Me</title>
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
            color: white;
        }
    </style>
</head>
<body class="register">
<?php
if (isset($_GET['err'])) {
    if ($_GET['err'] == 1) {
        echo '<div class="error-alert"><p>The passwords don\'t match!!!</p></div>';
    } else if ($_GET['err'] == 2) {
        echo '<div class="error-alert"><p>Fields can\'t be empty!!!</p></div>';
    } else if ($_GET['err'] == 3) {
        echo '<div class="error-alert"><p>Sorry uhm, Eric actually decided not to know that when coding this. You\'ve actually got to say something Eric chose to know ;)</p></div>';
    } else if ($_GET['err'] == 4) {
        if (isset($_GET['src'])) {
            echo "<div class=\"error-alert\"><p>" . (string)$_GET['src'] . " field cannot be a number</p></div>";
        }
    } else if ($_GET['err'] == 5) {
        if (isset($_GET['src'])) {
            echo "<div class=\"error-alert\"><p>Special characters are not allowed in the " . (string)$_GET['src'] . " field</p></div>";
        }
    } else if ($_GET['err'] == 6) {
        echo "<div class=\"error-alert\"><p>Invalid value for Level field</p></div>";
    }

}
?>
<div class="container register__container">
    <img src="../Images/logo.jpg" class="loginimage text-center">
    <p class="lead poppins little_margin logo__color text-center">Eric McWinNEr's Admin Section</p>
    <p class="open_sans text-center">New to Eric Admin's section, enter your details here</p>
    <div class="decoy_margin"></div>
    <div class="row">
        <div class="col-md-6">
            <img src="../Images/about/mev1.jpg" alt="" class="registerimage"/>

        </div>
        <div class="col-md-6">
            <div class="white-card register">

                <form action="controller/register.php" method="post">
                    <input type="text" class="half" name="firstname" placeholder="First Name">
                    <input type="text" class="half" name="lastname" placeholder="Last Name">
                    <input type="text" name="level" class="half" placeholder="Level">
                    <input type="text" name="username" class="half" placeholder="Username">
                    <input type="password" name="password" class="half" placeholder="Password">
                    <input type="password" name="confirmpassword" class="half" placeholder="Confirm Password">
                    <textarea name="special" placeholder="Something only Eric McWinNEr would know..."></textarea>
                    <input type="submit" value="Register Me!">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
